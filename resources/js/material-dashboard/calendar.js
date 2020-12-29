function Calendar(options) {
    const {available_from, available_till, price, reservations_json} = options;
    const currency = 'zł';

    const $calendar = options.element;
    const $calendar_days = $calendar.find('.calendar__days');
    const $calendar_month_year = $calendar.find('.calendar__month_and_year');
    // const $form = $calendar.find('form');

    const $date_from = $calendar.find('[name=from]');
    const $date_to = $calendar.find('[name=till]');
    const $price_per_day = $calendar.find('#daily_price');
    const $days_amount = $calendar.find('#days_difference');
    const $rental_price = $calendar.find('#total_price');

    const calendar_state = {};
    const month_names = [
        'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec',
        'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień',
    ];

    let today_date_ms;
    let available_from_ms;
    let available_till_ms;
    let reservations;

    function init() {

        const now = new Date();
        const year = now.getFullYear();
        const month = now.getMonth() + 1;
        const date = now.getDate();

        if (reservations_json) {
            reservations = JSON.parse(reservations_json);
            reservations = Array.isArray(reservations) ? reservations : [reservations];
        }

        today_date_ms = +new Date(`${year}-${month}-${date} 00:00:00`);

        if (available_from && available_till) {
            available_from_ms = +new Date(available_from);
            available_till_ms = +new Date(available_till);
        }

        if (price) {
            $price_per_day.val(`${price / 100} ${currency}`);
        }

        updateCalendarState({year, month});
        addActionListeners();
    }


    function addActionListeners() {
        $calendar.find('.arrow').on('click', changeMonth);

        $calendar_days.on('click', 'div', dayClick);

        $date_from.on('change', datesChange);
        $date_to.on('change', datesChange);
        // $form.on('submit', submit);
    }

    function updateCalendarState(new_state) {

        const old_state = Object.assign({}, calendar_state);
        const funcsAfterUpdate = [];

        if (toString.call(new_state) === '[object Object]') {
            const keys = Object.keys(new_state);

            if (keys && keys.length > 0) {
                keys.forEach(key => {

                    if (['year', 'month'].includes(key)) {
                        if (old_state.year !== new_state.year || old_state.month !== new_state.month) {

                            if (!funcsAfterUpdate.includes(buildCalendar)) funcsAfterUpdate.push(buildCalendar);
                            if (!funcsAfterUpdate.includes(paintChosenDays)) funcsAfterUpdate.push(paintChosenDays);
                        }
                    }

                    if (['date_from', 'date_to'].includes(key)) {
                        if (
                            (old_state.date_from !== new_state.date_from) ||
                            (old_state.date_to !== new_state.date_to)
                        ) {

                            if (!funcsAfterUpdate.includes(paintChosenDays)) funcsAfterUpdate.push(paintChosenDays);
                            if (!funcsAfterUpdate.includes(updateTotalAmount)) funcsAfterUpdate.push(updateTotalAmount);
                        }
                    }

                    calendar_state[key] = new_state[key];

                });
            }
        }

        if (funcsAfterUpdate && funcsAfterUpdate.length > 0) {
            funcsAfterUpdate.forEach(func_item => func_item());
        }
    }

    function buildCalendar() {
        const {year, month} = calendar_state;
        let next_month = month === 12 ? 1 : month + 1;
        let next_year = next_month === 1 ? year + 1 : year;

        const current_month_start = new Date(`${year}-${month}-01`);
        const next_month_start = new Date(`${next_year}-${next_month}-01`);
        const current_month_days_amount = ((next_month_start - current_month_start) / 1000 / 60 / 60 / 24);

        let shift = current_month_start.getDay() === 0 ? 7 : current_month_start.getDay();
        shift = `shift-${shift}`;

        $calendar_days[0].classList.forEach(item => {
            if (/^shift-/.test(item)) $calendar_days.removeClass(item);
        });

        $calendar_days.addClass(shift);
        $calendar_month_year.html(`${month_names[month - 1]} ${year}`);
        $calendar_days.html('');
        for (let i = 0; i < current_month_days_amount; i++) {

            const day_classes = getDaysClasses(`${year}-${month}-${i + 1}`, i === 0);
            $calendar_days.append(`<div class="${day_classes}"> ${(i + 1)} </div>`);
        }
    }

    function getDaysClasses(date_str, first) {
        let day_classes = [];
        const day_date = new Date(date_str);

        if (toString.call(day_date) === '[object Date]') {

            if (day_date.getDay() === 1 || first === true) {
                day_classes.push('first');
            }

            if (+day_date < today_date_ms) {
                day_classes.push('disabled');
            }

            if (+day_date === today_date_ms) {
                day_classes.push('today');
            }

            if (!isDayAllowed(date_str))
                day_classes.push('disabled');
        }

        return day_classes.join(' ');
    }

    function isDayAllowed(date_str) {
        let date = +new Date(date_str);

        if ((date > today_date_ms) // date must be today or after today
            && (available_from_ms && available_till_ms) // scope must be defined
            && (date > available_from_ms && date < available_till_ms)  // date must lay withing scope
        ) {
            if (reservations) {
                for (let i = 0; i < reservations.length; i++) {
                    if (!reservations[i].from || !reservations[i].till)
                        continue;

                    if (date >= +new Date(reservations[i].from) && date <= +new Date(reservations[i].till))
                        return false;
                }
            }

            return true;
        }

        return false;
    }

    function datesChange(e) {
        const value = $(this).val();
        const allowed = isDayAllowed(`${value} 00:00:00`);

        if (!allowed) $(this).val('');
        else {
            const name = $(this).attr('name');

            if (name === 'date_to' && calendar_state.date_from) {
                if (+new Date(`${value} 00:00:00`) < +new Date(`${calendar_state.date_from} 00:00:00`)) {
                    $(this).val(calendar_state.date_to || '');
                    return false;
                }
            }


            if (name === 'date_from' && value) {
                const {year, month} = calendar_state;

                const value_date_arr = value.split('-');
                const value_year = value_date_arr[0];
                const value_month = value_date_arr[1];

                const state_month_ms = +new Date(`${year}-${month}-01 00:00:00`);
                const value_month_ms = +new Date(`${value_year}-${value_month}-01 00:00:00`);

                if (state_month_ms !== value_month_ms) {
                    updateCalendarState({month: +value_month, year: +value_year});
                }
            }

            updateCalendarState({[name]: value});
        }
    }


    function dayClick(e) {
        const {year, month, date_from, date_to} = calendar_state;
        const date = +$(this).text().trim() < 9 ? '0' + $(this).text().trim() : $(this).text().trim();
        const proper_month = month < 9 ? '0' + month : month;

        const current_date_str = `${year}-${proper_month}-${date}`;
        const current_date_ms = +new Date(`${current_date_str} 00:00:00`);

        if (!isDayAllowed(`${current_date_str} 00:00:00`)) return false;

        if (!date_from) {
            updateCalendarState({date_from: current_date_str});
            $date_from.val(current_date_str);

        } else if (date_from && !date_to) {

            const date_from_ms = +new Date(`${date_from} 00:00:00`);

            if (date_from_ms < current_date_ms) {
                updateCalendarState({date_to: current_date_str});
                $date_to.val(current_date_str);
            } else {

                updateCalendarState({date_from: current_date_str, date_to: date_from});
                $date_from.val(current_date_str);
                $date_to.val(date_from);
            }

        } else if (date_from && date_to) {
            const date_from_ms = +new Date(`${date_from} 00:00:00`);
            const date_to_ms = +new Date(`${date_to} 00:00:00`);

            if (current_date_ms < date_from_ms) {
                updateCalendarState({date_from: current_date_str});
                $date_from.val(current_date_str);
            }

            if (current_date_ms === date_from_ms) {
                updateCalendarState({date_to: current_date_str});
                $date_to.val(current_date_str);
            }

            if (current_date_ms === date_to_ms) {
                updateCalendarState({date_from: current_date_str});
                $date_from.val(current_date_str);
            }


            if (
                (current_date_ms > date_from_ms && current_date_ms < date_to_ms) ||
                (current_date_ms > date_to_ms)
            ) {
                updateCalendarState({date_to: current_date_str});
                $date_to.val(current_date_str);
            }
        }
    }


    function paintChosenDays() {
        const {date_from, date_to, month, year} = calendar_state;

        if (date_from || date_to) {

            const date_from_ms = date_from ? +new Date(`${date_from} 00:00:00`) : null;
            const date_to_ms = date_to ? +new Date(`${date_to} 00:00:00`) : null;

            $calendar_days.find('>div').each(function (index) {
                $(this).removeClass('chosen marked');

                const this_day_date = +new Date(`${year}-${month}-${index + 1} 00:00:00`);
                if (this_day_date === date_from_ms || this_day_date === date_to_ms) $(this).addClass('chosen');

                if (date_from_ms && date_to_ms) {
                    if (this_day_date > date_from_ms && this_day_date <= date_to_ms) $(this).addClass('marked');
                }
            });
        } else {
            $calendar_days.find('>div').removeClass('chosen marked');
        }
    }


    function updateTotalAmount() {
        if (!price) return;
        const {date_from, date_to} = calendar_state;

        if (date_from && date_to) {

            if (date_from === date_to) {
                $days_amount.val('1');
                $rental_price.val(`${price / 100} ${currency}`);
            } else {

                const date_from_ms = +new Date(`${date_from} 00:00:00`);
                const date_to_ms = +new Date(`${date_to} 00:00:00`);

                const days_amount_ms = date_to_ms - date_from_ms;
                const days_amount = (days_amount_ms / 1000 / 60 / 60 / 24) + 1;
                const total_price = (price * days_amount) / 100;
                $days_amount.val(days_amount);
                $rental_price.val(`${total_price}  ${currency}`);
            }

        } else {
            $days_amount.val('');
            $rental_price.val('');
        }
    }

    function changeMonth(e) {
        const action = $(this).attr('data-action');
        let {month, year} = calendar_state;

        switch (action) {
            case 'prev':
                month = month === 1 ? 12 : month - 1;
                year = month === 12 ? year - 1 : year;
                break;
            case 'next':
                month = month === 12 ? 1 : month + 1;
                year = month === 1 ? year + 1 : year;
                break;
        }

        if (['prev', 'next'].includes(action)) {
            updateCalendarState({year, month});
        }
    }

    init();
}

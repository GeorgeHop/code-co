function select2Initializer(selects) {
    $(selects).each(select => {
        let args = {};
        const model = $(select).attr('data-select2-model');
        if (model) {
            args.ajax = {
                url: '/admin/select',
                method: 'POST',
                dataType: 'json',
                delay: 300,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page || 1,
                        model,
                        _token: csrf_token,
                        exclude: $(select).attr('data-select2-exclude') || null,
                    };
                },
                processResults: function (response) {
                    let results = [];
                    const primaryKey = response.primaryKey;
                    const titleKey = response.titleKey;

                    response.collection.data.forEach(function (element) {
                        results.push({
                            'id': element[primaryKey],
                            'text': element[titleKey],
                        });
                    });

                    return {
                        results,
                        pagination: {
                            more: response.collection.current_page < response.collection.last_page,
                        },
                    };
                },
            };
        }

        $(select).select2({
            theme: 'bootstrap4',
            language: locale,
            ...args
        });
    });
}

select2Initializer($('select[data-select2-model]'));
select2Initializer($('.select2'));
select2Initializer($('select.server-side-select2'));

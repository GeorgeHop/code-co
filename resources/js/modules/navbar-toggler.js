$(document).on('click', '.navbar-toggler', function () {
    const $toggle = $(this);

    if ($html.hasClass('nav-open')) {
        $html.removeClass('nav-open');
        $('.close-layer').remove();
        setTimeout(() => $toggle.removeClass('toggled'),400);
    }
    else {
        setTimeout(() => $toggle.addClass('toggled'), 430);
        const e = $('<div class="close-layer"></div>');
        $body.find('.main-panel').length
            ? e.appendTo('.main-panel')
            : $body.hasClass('off-canvas-sidebar') && e.appendTo('.wrapper-full-page');
        setTimeout(() => e.addClass('visible'), 100);
        e.on('click', function () {
            $html.removeClass('nav-open');
            e.removeClass('visible');
            setTimeout(() => {
                e.remove();
                $toggle.removeClass('toggled')
            },400);
        });
        $html.addClass('nav-open');
    }
});

const $body = $('body');

const isMini = JSON.parse(localStorage.getItem('_isSidebarMini'));
if (isMini)
    $body.addClass("sidebar-mini");
else
    $body.removeClass("sidebar-mini");

$("#minimizeSidebar").on('click', function () {
    if ($body.hasClass('sidebar-mini')) {
        $("body").removeClass("sidebar-mini");
        localStorage.setItem('_isSidebarMini', JSON.stringify(false));
    }
    else {
        $("body").addClass("sidebar-mini");
        localStorage.setItem('_isSidebarMini', JSON.stringify(true));
    }
});

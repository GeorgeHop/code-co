if (navigator.platform.indexOf("Win") > -1) {
    $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
    $("html").addClass("perfect-scrollbar-on");
}
else
    $("html").addClass("perfect-scrollbar-off");

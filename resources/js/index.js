require('./bootstrap');

require('./modules/floating-labels');
require('./modules/select2');
require('./modules/form-locale-switcher');
require('./modules/laravel-file-manager');
require('./modules/tinymce');
// require('./modules/date-time-pickers');
require('./modules/sidebar-toggler');
require('./modules/navbar-toggler');
require('./modules/perfect-scrollbar');
require('./modules/swals');
require('./modules/jquery-validator');

$('#logout-button').on('click', e => {
    e.preventDefault();
    $('#logout-form').submit();
});

$('form[novalidate]').validate();

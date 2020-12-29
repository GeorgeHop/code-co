window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;
require('./material-dashboard/bootstrap-material-design.min');

window.locale = document.documentElement.lang;
window.csrf_token = $('meta[name=csrf-token]').attr('content');

require('datatables.net');
//require('datatables.net-bs4');

/* TinyMCE WYSIWYG */
import tinymce from 'tinymce/tinymce';
window.tinymce = tinymce;
import 'tinymce/icons/default';
import 'tinymce/themes/silver';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/code';

/* Plugin for the Perfect Scrollbar */
require('./material-dashboard/plugins/perfect-scrollbar.jquery.min');

/* Plugin for the momentJs */
window.moment = require('moment');

/*  Plugin for Sweet Alert */
window.Swal = require('sweetalert2');

/* Forms Validations Plugin */
require('jquery-validation');
require('jquery-validation/dist/localization/messages_' + locale + '.js');

require('select2');
require('select2/dist/js/i18n/' + locale + '.js');

/* Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ */
// require("/js/admin/plugins/bootstrap-datetimepicker.min.js");

/* Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs */
// require("/admin/js/plugins/bootstrap-tagsinput.js");

/* Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar */
// require("/admin/js/plugins/fullcalendar.min.js");

/* Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ */
// require("/admin/js/plugins/jquery-jvectormap.js");

/* Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ */
// require("/admin/js/plugins/nouislider.min.js" );

/* Chartist JS */
// require("/admin/js/plugins/chartist.min.js");

/* Notifications Plugin */
// require("/admin/js/plugins/bootstrap-notify.js");

window.$html = $('html');
window.$body = $('body');

/* Control Center for Material Dashboard: parallax effects, scripts for the example pages etc */
// require('./material-dashboard/material-dashboard.min');
$body.bootstrapMaterialDesign({
    autofill: false
});


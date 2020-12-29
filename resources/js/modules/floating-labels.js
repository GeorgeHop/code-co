const $body = $('body');
const $inputs = $('div.form-group.bmd-form-group input.form-control');

// set labels in position on page load
$inputs.each(function () {
    if ($(this).val())
        $(this).parent('div').addClass('is-filled');
});

// add label positioning event handlers
$body.on('focus', 'div.form-group.bmd-form-group input.form-control', function () {
    $(this).parent('div').addClass('is-focused');
});
$body.on('focusout', 'div.form-group.bmd-form-group input.form-control', function () {
    $(this).parent('div').removeClass('is-focused');

    if (!$(this).val())
        $(this).parent('div').removeClass('is-filled');
});

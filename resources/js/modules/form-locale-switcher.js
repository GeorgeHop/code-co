const container = document.getElementById('form-locale-switcher');

if (container) {
    const currentLocale = $('#current_locale').val();
    const fallbackLocales = $('#fallback_locale').val();
    const locales = JSON.parse($('#translation_locales').val());

    const formControls = $(container).find('div[data-switcher-name][data-switcher-locale]');

    $('[data-locale-switcher]').on('click', function () {
        const locale = $(this).data('locale-switcher');

        formControls.each((i, item) => {
            if ($(item).data('switcher-locale') !== locale)
                $(item).attr('hidden', 'hidden');
            else
                $(item).removeAttr('hidden');
        });
    });
}

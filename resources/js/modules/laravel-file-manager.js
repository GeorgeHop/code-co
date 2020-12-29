/*function lfm(id, type, options) {
    let button = document.getElementById(id);

    button.addEventListener('click', function () {
        let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        let target_input = document.getElementById(button.getAttribute('data-input'));
        let target_preview = document.getElementById(button.getAttribute('data-preview'));
        let target_formhandler = document.getElementById(button.getAttribute('data-form-handler'));
        let target_formhandler_name = button.getAttribute('id');

        window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
            var file_path = items.map(function (item) {
                return item.url;
            }).join(',');

            // set the value of the desired input to image url
            target_input.value = file_path;
            target_input.dispatchEvent(new Event('change'));

            // clear previous preview
            target_formhandler.innerHTML = '';
            target_preview.innerHtml = '';

            target_formhandler.innerHtml = '';
            let counter = 1;
            // set or change the preview image src
            items.forEach(function (item) {
                let img = document.createElement('img');
                let uploadUrl = new URL(item.url);
                let form_image_path = uploadUrl.pathname;

                img.setAttribute('style', 'height: 5rem');
                img.setAttribute('src', item.thumb_url);
                target_preview.appendChild(img);

                let selected_images = "" +
                    "<li class='selected-images-for-offer' style='background-image: url("+item.thumb_url+")' data-offer_image='"+item.thumb_url+"'>" +
                    "<input value='"+form_image_path+"' type='hidden' name='"+target_formhandler_name+"[]'>" +
                    "<a href='#' class='remove-image-from-offer text-white'>" +
                    "<i class='fas fa-times-circle'></i>" +
                    "</a>" +
                    "" +
                    "</li>";
                target_formhandler.append($.parseHTML(selected_images)[0]);
                remove_image_from_offer('.remove-image-from-offer');
                counter++;
            });

            // trigger change event
            target_preview.dispatchEvent(new Event('change'));
        };
    });
};
function lfms(id, type, options) {
    let button = document.getElementById(id);
    button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
            var file_path = items.map(function (item) {
                return item.url;
            }).join(',');

            // set the value of the desired input to image url
            target_input.value = file_path;
            target_input.dispatchEvent(new Event('change'));

            // clear previous preview
            target_preview.innerHtml = '';

            // set or change the preview image src
            items.forEach(function (item) {
                let img = document.createElement('img')
                img.setAttribute('src', item.url)
                img.classList.add('img-thumbnail')
                target_preview.appendChild(img);
            });

            // trigger change event
            target_preview.dispatchEvent(new Event('change'));
        };
    });
};
function render_offer_images(id,input,images_holder){
    let button = document.getElementById(id);
    let target_formhandler = document.getElementById(button.getAttribute('data-form-handler'));
    let target_formhandler_name = button.getAttribute('id');

    let offer_images_input = $(input);
    if(offer_images_input.val().length > 0){
        let offer_images_array = offer_images_input.val().split(',');
        let offer_images_holder = $(images_holder);
        let counter = 1;
        $.each(offer_images_array, function(i,v){
            let selected_images = "" +
                "<li class='selected-images-for-offer' style='background-image: url("+v+")' data-offer_image='"+v+"'>" +
                "<input value='"+v+"' type='hidden' name='"+target_formhandler_name+"[]'>" +
                "<a href='#' class='remove-image-from-offer text-white'>" +
                "<i class='fas fa-times-circle'></i>" +
                "</a>" +
                "</li>";
            offer_images_holder.append($.parseHTML(selected_images)[0]);
            remove_image_from_offer('.remove-image-from-offer');
            counter++;
        })
    }
}
function remove_image_from_offer(element){
    $(element).on('click', function(){
        $(this).parent().remove();
    })
}

$( "#images-handler" ).sortable({
    connectWith: '#images-handler',
    update: function(event, ui) {
        var order = $(this).sortable('toArray',{attribute: 'data-offer_image'});
        var positions = order.join(',');

        console.log({
            positions: positions
        });
    }
});*/

// lfm('images', 'file', {prefix: '/filemanager'} );
// lfms('thumbnail', 'file', {prefix: '/filemanager'} );
// render_offer_images('images','#images-input','#images-handler');

/**
 * Preview placeholder URL
 *
 * @type {string}
 */
const PlaceholderURL = 'https://via.placeholder.com/500/CCCCCC/FFFFFF?Text=Obrazek';

/**
 * Open file manager and return selected files.
 * Promise is never resolved if window is closed.
 *
 * @returns Promise<array> Array of selected files with properties:
 *      icon        string
 *      is_file     bool
 *      is_image    bool
 *      name        string
 *      thumb_url   string|null
 *      time        int
 *      url         string
 */
window.filemanager = function (url = '/filemanager', target = 'FileManager', features = 'width=900,height=600') {
    return new Promise(resolve => {
        window.open(url, target, features);
        window.SetUrl = resolve;
    });
}

/**
 * Remove domain from URL
 *
 * @returns string
 */
function trimDomain(url) {
    return url.replace(/^.*\/\/[^\/]+/, '');
}

/* Initiate single uploads */
document.querySelectorAll('[data-file-upload="single"]').forEach(container => {
    const preview = container.querySelector('[data-file-upload="preview"]');
    const input = container.querySelector('[data-file-upload="input"]');
    const button = container.querySelector('[data-file-upload="button"]');

    /* Change preview src if input value changes */
    const handler = () => preview.setAttribute('src', input.value || PlaceholderURL);
    // input.addEventListener('input', handler); // page gets too much "jumpy" when using this
    input.addEventListener('change', handler);

    button.addEventListener('click', () => {
        filemanager().then(files => {
            if (!Array.isArray(files) || !files[0])
                return;

            input.value = trimDomain(files[0].url);
            input.dispatchEvent(new Event('change'));
        });
    });
});

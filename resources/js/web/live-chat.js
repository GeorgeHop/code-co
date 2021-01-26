const $chatButton = $('#chatButton');
const $closeButton = $('#closeButton');
const $chatBox = $('.chat-box');
$chatButton.on('click', () => {
    $chatBox.fadeIn();
    $chatButton.fadeOut();
});
$closeButton.on('click', () => {
    $chatButton.fadeIn();
    $chatBox.fadeOut();
});

const container = document.getElementById('live-chat-messages');
const form = document.getElementById('live-chat-send-message');

if (container && form) {
    const userId = document.getElementById('user-id').value;
    const messageInput = form.querySelector('input[name="message"]');
    form.addEventListener('submit', e => {
        e.preventDefault();
        axios.post(form.getAttribute('action'), {
            message: messageInput.value,
            authenticator: userId,
        });
    });

    Echo[isNaN(userId) ? 'channel' : 'private'](`live-chat.${userId}`)
        .listen('LiveChatMessage', e => {
            console.log(e)
        });
}

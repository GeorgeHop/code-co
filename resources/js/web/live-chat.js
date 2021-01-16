import axios from "axios";
const container = document.getElementById('messages');
const form = document.getElementById('send-message');

if (container && form) {
    form.addEventListener('submit', e => {
        e.preventDefault();
        console.log(form.querySelector('input').value)
        axios.post(form.getAttribute('action'), {message: form.querySelector('input[name="message"]').value});
    });

    Echo.channel(`live-chat`)
        .listen('LiveChatMessage', e => {
            console.log(e)
        });
}

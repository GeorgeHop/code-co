$('#chatButton').click(function () {
    $('.chat-box').fadeIn();
    $('#chatButton').fadeOut();
});
$('#closeButton').click(function () {
    $('#chatButton').fadeIn();
    $('.chat-box').fadeOut();
});

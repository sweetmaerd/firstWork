window.onload = function() {
    $('#send_message').keypress(send_message);
};
function send_message(e){
    console.log('1');
    if(e.keyCode == 13){
        $get("messages/update/".id );
        $('#send_message').val('');
    }
}


var source;
window.onload = function() {
    start_listeners(2);

};
function start_listeners(message_id) {

    source = new EventSource("real/2");
    source.onopen = function(e) {
        console.log('connect');
    };
    source.onmessage = function(e) {
        if(e.data){
            //$('<div>').attr('class', 'pusto').fadeIn('show').prependTo('.messageses');
            $('#pusto').append(e.data);
        }
        
        console.log(e.data);
    };
}

$('#send-message').keypress(send_enter);

function send_enter(e){
    if(e.keyCode == 13){
        console.log('enter');
    }
}
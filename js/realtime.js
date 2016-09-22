var source;
window.onload = function() {
    start_listeners();
    //start_listeners1();
    $('#send_message').keypress(send_message);
};
function start_listeners() {
    var id = $("div.form-group").attr('data-id');
    source = new EventSource("real/2");
    source.onopen = function(e) {
        console.log('connect');
    };
    source.onmessage = function(e) {
        if(e.data){
            //$('<div>').attr('class', 'pusto').fadeIn('show').prependTo('.messageses');
            $('#pusto').append(e.data);
        }
    };
}

function start_listeners1(){
    id = $("input#token").attr('data-token');
    console.log(id);
}

function send_message(e) {
    var id = $("div.form-group").attr('data-id');
    var token = $("input#token").attr('data-token');
    var body = $('#send_message').val();;
    //console.log("messages/update/"+id);
    if (e.keyCode == 13) {
        $.post("/messages/"+id,{
            _token:token,
            message:body
            });
        $('#send_message').val('');
    }
}
function ansverServer(data){
    alert(data);
}


var source;
window.onload = function() {
    start_listeners(2);

};
function start_listeners(message_id) {

    source = new EventSource("real/2");
    source.onopen = function(e) {
        console.log('good');
    };
    source.onmessage = function(e) {
        //$('div').html(e.data).prependTo('.pusto');
        console.log(e.data);
        console.log(e.id);
    };
}
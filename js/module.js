$(function() {
    var fx = {
        "initModal": function () {
            if ($('.modal-window').length == 0) {
                $('<div>').attr('class', 'black-list').fadeIn('show').appendTo('body');
                return $('<div>').addClass('modal-window').appendTo('div.black-list');
            } else {
                return $('.black-list')
            }
        }
    };

    $('.img-circle').bind('click', function (e) {
        e.preventDefault();
        var data = $(this).attr('data-id');
        modal = fx.initModal();
        $('<a>').attr('href', '#')
            .addClass('modal-closebtn')
            .html('&times')
            .click(function (event) {
                event.preventDefault();
                $('.black-list').remove();
                $('.modal-window').remove();
            }).appendTo(modal);
        $('.black-list').click(function (event) {
                event.preventDefault();
                $('.black-list').remove();
                $('.modal-window').remove();
            });

        $.ajax({
            type: 'get',
            url: '/ajax',
            data: 'id=' + data,
            success: function (data) {
                modal.append(data);
            },
            error: function (msg) {
                modal.append(msg);
            }
        });
    });
});
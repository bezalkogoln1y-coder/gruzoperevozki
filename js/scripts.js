function checkboxVal() {
    $('#accept').click(function () {
        if ($(this).prop('checked')) {
            $('button[type="submit"]').attr('disabled', false);
        } else {
            $('button[type="submit"]').attr('disabled', true);
        }
    })

}

function sendMail() {
    $('.sent').trigger('reset');
    $(function () {
        'use strict';
        $('.sent').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/js/send.php',
                type: 'POST',
                contentType: false,
                processData: false,
                data: new FormData(this),
                success: function (msg) {
                    console.log(msg);
                    if (msg == 'ok') {
                        alert('Сообщение отправлено');
                        $('.sent').trigger('reset'); // очистка формы
                        $('button[type="submit"]').attr('disabled', true);
                    } else {
                        alert('Ошибка');
                    }
                }
            });
        });
    });
}

function anchorLink() {
    $(".nav-item a").on("click", function (a) {
        a.preventDefault();
        var b = $(this).attr("href"),
            c = $(b).offset().top;
        $("html, body").animate({
            scrollTop: c
        }, 1e3)
    });
}

$(function () {
    checkboxVal();
    sendMail();
    anchorLink();
});
;jQuery(function ($) {

//Remove the hash symbol # from the URL
    window.history.pushState ? window.history.pushState('', '/', window.location.pathname) : window.location.hash = '';
    if (window.location.pathname == '/index.html') window.location.pathname = '';

//Smooth scrolling of the page when you click on the menu
    $(".smooth-scroll").on("click", function (event) {

        event.preventDefault();

        var id = $(this).attr('href'),
            top = $(id).offset().top;

        $('body,html').animate({scrollTop: top}, 1500);

    });


    if(window.innerWidth <= "767") $(".navbar-nav").removeClass("navbar-fixed-top");

    $(window).resize(function () {
        (window.innerWidth <= "767") ? $(".navbar-nav").removeClass("navbar-fixed-top") : $(".navbar-nav").addClass("navbar-fixed-top");
    });


    popup = {
        init: function () {
            $('figure').click(function () {
                popup.open($(this));
            });

            $(document).on('click', '.popup img', function () {
                return false;
            }).on('click', '.popup', function () {
                popup.close();
            })
        },
        open: function ($figure) {
            $('.gallery').addClass('pop');
            $popup = $('<div class="popup" />').appendTo($('body'));
            $fig = $figure.clone().appendTo($('.popup'));
            $bg = $('<div class="bg" />').appendTo($('.popup'));
            $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
            $shadow = $('<div class="shadow" />').appendTo($fig);
            src = $('img', $fig).attr('src');
            $shadow.css({backgroundImage: 'url(' + src + ')'});
            $bg.css({backgroundImage: 'url(' + src + ')'});
            setTimeout(function () {
                $('.popup').addClass('pop');
            }, 10);
        },
        close: function () {
            $('.gallery, .popup').removeClass('pop');
            setTimeout(function () {
                $('.popup').remove()
            }, 100);
        }
    };

    popup.init()

});
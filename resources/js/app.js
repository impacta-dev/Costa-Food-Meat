/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });


// Hide preload screen when page is loaded
window.onload = function(){
    // setTimeout(() => {
    //     $('.preloader').addClass('preloader--hidden');
    //     $('.revealer').removeClass('revealer--loading');
    // }, 1000);

    $('.preloader__spinner').fadeOut(300, function() {
        $('.preloader').addClass('preloader--hidden');
        $('.revealer').removeClass('revealer--loading');

        $.event.trigger({
            type: 'pageLoaded'
        });
    });

};

// Main menu: animation on hover

var menu1IsOpen = false;
var menuIsMouseEnter = false;

$('.menu1-sidebar').on('mouseenter', function () {
    window.menuIsMouseEnter = true;
    $('.menu1-bar1').addClass('menu1-bar1--show');
    $('.menu1-bar2').addClass('menu1-bar2--show');
    return false;
});

$('.menu1-sidebar').on('mouseleave', function () {
    window.menuIsMouseEnter = false;
    if (!window.menu1IsOpen) {
        $('.menu1-bar1').removeClass('menu1-bar1--show');
        $('.menu1-bar2').removeClass('menu1-bar2--show');
    }
    return false;
});

// Main menu: animation on clic

$('.js-open-menu1').on('click', function () {
    $('.menu1-backdrop').fadeToggle();
    $('.menu1-content').toggleClass('menu1-content--show');
    $('.menu1-button').toggleClass('open');
    window.menu1IsOpen = !window.menu1IsOpen;
    return false;
});

$('.menu1-backdrop').on('click', function () {
    $('.menu1-backdrop').fadeOut();
    $('.menu1-content').removeClass('menu1-content--show');
    $('.menu1-bar1').removeClass('menu1-bar1--show');
    $('.menu1-bar2').removeClass('menu1-bar2--show');
    $('.menu1-button').removeClass('open');
    window.menu1IsOpen = false;
    return false;
});

// Social buttons

$(document).on('click', '.social-button', function (e) {
    var popupSize = {
        width: 780,
        height: 550
    };
    
    var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
        horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

    var popup = window.open($(this).prop('href'), 'social',
        'width=' + popupSize.width + ',height=' + popupSize.height +
        ',left=' + verticalPos + ',top=' + horisontalPos +
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        e.preventDefault();
    }
});

// Edition mode

$('.js-textedit').on('submit', function(e) {
    e.preventDefault();

    var content = $(this).children('.js-textedit__content').first().html();
    var lang = $(this).find('input[name="lang"]').val();
    var id = $(this).find('input[name="id"]').val();
    var result;

    $.ajax({
        url: '/api/' + lang + '/page/update',
        method: 'PUT',
        data: {
            id: id,
            content: content
        }
    })
    .fail(function(resp) {
        result = 'error';
    })
    .done(function(resp) {
        result = 'saved';
    })
    .always(function () {
        console.log(result);
        $('.edition-bar__' + result).addClass('show');
        setTimeout(() => {
            $('.edition-bar__' + result).removeClass('show');
        }, 1500);
    });

    return false;
});

$('.js-textedit__link').click(function() {
    var lang = $('.js-textedit').find('input[name="lang"]').val();
    var contentId = $(this).data('content');

    $.ajax({
        url: '/api/' + lang + '/text_edit_link',
        method: 'GET',
        data: {
            contentId: contentId
        }
    })
    .done(function(resp) {
        window.open(resp, '_blank');
    });

    return false;
});


$('.js-textedit__content').on("click", function (e) {
    // Prevent <a> links interaction
    $(this).focus();
    return false;
});

function showUp() {
    var st = jQuery(window).scrollTop();
    var $up = jQuery('.up');

    if( st >= 100 ) {
        $up.fadeIn(300);
    }
    else {
        $up.fadeOut(300);
    }
}
function up() {
    jQuery('html,body').animate({
        'scrollTop': 0
    },500);
}

jQuery(document).ready(function ($) {
    showUp();

    $(".owl-carousel.full-slider").owlCarousel({
        items: 1,
        itemElement: 'a',
        autoHeight: true
    });

    $('.gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                var title = item.el.attr('data-site-title');

                var caption = item.el.attr('title');
                if( caption !== '' ) {
                    caption += '<br>';
                }
                return caption;// + '<div class="share_facebook" data-src="' + item.src + '" data-title="' + title + '" data-description="' + caption + '">share</div>';
            }
        }
    });
});
jQuery(window).on('load', function () {
    showUp();
});
jQuery(window).scroll(function () {
    showUp();
});

jQuery(document).on('touch click', '.up', function () {
    up();
});
jQuery(document).on('touch click', '.more span', function () {
    jQuery('.search_more_link').addClass('hidden');
    jQuery('.search_more').removeClass('hidden');
});

jQuery(document).on('touch click', '.spiny_main_nav_mobile_btn', function () {
    jQuery('nav').addClass('open');
    jQuery('body').addClass('overflow_hidden');
});
jQuery(document).on('touch click', '.spiny_main_nav_mobile_close', function () {
    jQuery('nav').removeClass('open');
    jQuery('body').removeClass('overflow_hidden');
});

jQuery(document).on('click touch', function () {
    jQuery('.additional_nav_popup').addClass('hidden');
});

jQuery(document).on('touch click', '.additional_nav .login_link', function () {
    jQuery('.additional_nav_popup').toggleClass('hidden');
    return false;
});

jQuery(document).on('touch click', '.show_contact_btn a', function () {

    var id = jQuery(this).attr('data-id');
    var data = {
        action: 'job_contacts',
        nonce_code: job_contacts.nonce,
        job: id
    };
    jQuery.post( job_contacts.url, data, function(response) {
        //var json = JSON.parse(response);

        jQuery('.job_contacts').html(response);
        jQuery('.job_contacts').removeClass('hidden');
        jQuery('.show_contact_btn').addClass('hidden');
    });

    return false;
});

jQuery(document).on('click touch','.additional_text_info_btn', function () {
    var id = jQuery('.additional_text_info').removeClass('close');
    return false;
});

jQuery(document).on('click touch','.interested_button', function () {
    var $btn = jQuery(this);
    var post_id = $btn.attr('data-id');
    var type = $btn.attr('data-type');
    var data = {
        action: 'interested_button',
        nonce_code: interested_button.nonce,
        post: post_id,
        type: type
    };

    jQuery.post( interested_button.url, data, function(response) {
        
        var res = JSON.parse(response);

        $btn.remove();
        jQuery('#interested').html(res['interested']);
        jQuery('#interested_result').html(res['html']);

    });
    return false;

    return false;
});


jQuery(document).on('click touch','.search_link', function () {
    jQuery('.header_search_form').fadeIn(250);

    return false;
});
jQuery(document).on('click touch','.search_close', function () {
    jQuery('.header_search_form').fadeOut(250);

    return false;
});
jQuery(document).on('click touch','.popup_bg', function () {
    return false;
});
jQuery(document).on('click touch','.popup,.fade,.popup_close', function () {
    jQuery('.popup').fadeOut(300);
    jQuery('.fade').fadeOut(300);

    return false;
});

jQuery(window).on('load', function () {
    // var show_popup = getCookie('popup_show');
    // if( ! show_popup || parseInt(show_popup) !== 1 ) {
    //     jQuery('.popup').fadeIn(300);
    //     jQuery('.fade').fadeIn(300);
    //
    //     setCookie('popup_show',1,10000);
    // }
});


function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}




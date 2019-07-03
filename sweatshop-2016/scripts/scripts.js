var $d=jQuery.noConflict();var width;$d(document).ready(function(){width=$d(window).width();$d(document).foundation();$d(".slideshow.active").bxSlider({auto:true,nextText:'<i class="fa fa-angle-right"></i>',prevText:'<i class="fa fa-angle-left"></i>'});function a(){$d(".carousel").bxSlider({infiniteLoop:false,maxSlides:3,minSlides:3,hideControlOnEnd:true,nextText:'<i class="fa fa-angle-right"></i>',prevText:'<i class="fa fa-angle-left"></i>',slideMargin:20,slideWidth:300})}if(width>759){a()}});


$d(document).ready(function() {
    // Checks if the user closed the expanded banner.
    //var $collapseCookie = Cookies.get('collapseBanner');
    // Checks if the user closed the expanded banner.
    var $hideCookie = Cookies.get('hideBanner');

    if($hideCookie == 'true') {
        $d('.expandedBanner').hide();
        $d('.collapsedBanner').hide();

    } else {
        $d('.expandedBanner').hide();
        //$d('.collapsedBanner').hide();
    }

    $d('#closeExpandedBanner').click(function() {
        var $hideCookie = Cookies.get('hideBanner');

        $d('.expandedBanner').slideUp();
        if($hideCookie != 'true') {
            $d('.collapsedBanner').slideDown();
        }
        //Cookies.set('collapseBanner', true);
    });

    $d('#openExpandedBanner').click(function() {
        $d('.collapsedBanner').slideUp();
        $d("html, body").animate({ scrollTop: 0 }, "slow");
        $d('.expandedBanner').slideDown();
    });

    $d(document).bind('gform_confirmation_loaded', function(event, formId){
        $d('.bannerIntro').hide();
        $d('.indicates-required').hide();
        $d("html, body").animate({ scrollTop: 0 }, "slow");
        Cookies.set('hideBanner', true);
    });
});
jQuery('#gform_submit_button_9').appendTo( jQuery('#field_9_61') );


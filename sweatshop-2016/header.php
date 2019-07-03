<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width" /> <!-- content="initial-scale=1" -->
<!--<script src="<?php echo bloginfo('template_url'); ?>/scripts/typekit.js" async></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>-->
<script src="https://use.typekit.net/eph2olu.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<!--<link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="preload" type="text/css" media="all" as="style" href="https://fonts.googleapis.com/css?family=Amaranth" onload="this.rel='stylesheet'" />
<!--<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth"></noscript>-->

<link rel="preload" type="text/css" media="all" as="style" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" onload="this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></noscript>

<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo( 'template_directory' ); ?>/css/print.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/foundation.css" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<!--<script>
	!function(a){"use strict";var b=function(b,c,d){function e(a){return h.body?a():void setTimeout(function(){e(a)})}function f(){i.addEventListener&&i.removeEventListener("load",f),i.media=d||"all"}var g,h=a.document,i=h.createElement("link");if(c)g=c;else{var j=(h.body||h.getElementsByTagName("head")[0]).childNodes;g=j[j.length-1]}var k=h.styleSheets;i.rel="stylesheet",i.href=b,i.media="only x",e(function(){g.parentNode.insertBefore(i,c?g:g.nextSibling)});var l=function(a){for(var b=i.href,c=k.length;c--;)if(k[c].href===b)return a();setTimeout(function(){l(a)})};return i.addEventListener&&i.addEventListener("load",f),i.onloadcssdefined=l,l(f),i};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
	!function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(b){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
</script>-->
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'template_directory' ); ?>/images/icons/favicon.ico">
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head(); ?>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-MFKXFB');</script>
  <!-- End Google Tag Manager -->
	<script>
	  WebFont.load({
	    google: {
	      families: ['Amaranth']
	    }
	  });
	</script>
</head>
<?php $bclass = $post->post_name;
$logo = get_field('logo', 'options');
$mobile_logo = get_field('mobile_logo', 'options'); ?>
<body <?php body_class($bclass); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFKXFB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php if(is_page('professional-training') || $post->post_parent == 11 || is_singular('professional')) : ?><div class="topBanner">
		<div class="regionteal collapsedBanner">
			<div class="row textwhite text-center flex-container">
				<p><strong>Sign up for our Pro Training eNewsletter</strong>: Stay Connected. Get a gift. Be in the know on Professional events and news.</p>
				<a href="#" class="button purple" id="openExpandedBanner">Sign up</a>
			</div>
		</div><!-- /.regionpink -->
		<div class="expandedBanner regionpurple">
			<div class="row text-center textwhite">
				<button class="close" id="closeExpandedBanner"><i class="fa fa-times"></i></button>
				<div class="column small-12 medium-10 large-6 medium-push-1 large-push-3">
					<h2 class="textwhite">Newsletter Signup</h2>
					<p class="bannerIntro" style="text-align: center;">Fill out the form below to sign up for our <strong>Professional Training</strong> eNewsletter and keep up-to-date on all of the SweatShop news and promotions.</p>
				</div><!-- /.column small-12 medium-10 large-6 -->
				<div class="column small-12 medium-10 medium-push-1 end expandedForm">
					<div class="ssf-emma-form">
						<div class="indicates-required"><p><span class="asterisk">*</span> indicates required</p></div>
						<?php echo do_shortcode('[gravityform id=7 title=false description=false ajax=true]'); ?>
					</div>
				</div><!-- /.column small-12 medium-10 medium-push-1 -->
			</div><!-- /.row -->
		</div><!-- /.row expandedBanner -->
	</div><!-- /.topBanner -->
	<?php else : ?>
		<div class="topBanner">
			<div class="regionpink collapsedBanner">
				<div class="row textwhite text-center flex-container">
					<p><strong>Sign up for our eNewsletter</strong>: Stay Connected. Get a gift. Be in the know on events and news.</p>
					<a href="#" class="button purple" id="openExpandedBanner">Sign up</a>
				</div>
			</div><!-- /.regionpink -->
			<div class="expandedBanner regionpurple">
				<div class="row text-center textwhite">
					<button class="close" id="closeExpandedBanner"><i class="fa fa-times"></i></button>
					<div class="column small-12 medium-10 large-6 medium-push-1 large-push-3">
						<h2 class="textwhite">Newsletter Signup</h2>
						<p class="bannerIntro" style="text-align: center;">Fill out the form below to sign up for our eNewsletter and keep up-to-date on all of the SweatShop news and promotions.</p>
					</div><!-- /.column small-12 medium-10 large-6 -->
					<div class="column small-12 medium-10 medium-push-1 end expandedForm">
						<div class="ssf-emma-form">
							<div class="indicates-required"><p><span class="asterisk">*</span> indicates required</p></div>
							<?php echo do_shortcode('[gravityform id=4 title=false description=false ajax=true]'); ?>
						</div>
					</div><!-- /.column small-12 medium-10 medium-push-1 -->
				</div><!-- /.row -->
			</div><!-- /.row expandedBanner -->
		</div><!-- /.topBanner -->
	<?php endif; ?>

	<header>
		<div class="row">
			<div class="toggle-container clearfix">
			<div class="title-bar-title float-left">
				<a href="/" alt="<?php echo get_bloginfo('name'); ?>">
					<img src="<?php echo $logo['url']; ?>" class="logo show-for-medium" alt="<?php echo $logo['alt']; ?>" title="<?php echo $mobile_logo['title']; ?>">
					<img src="<?php echo $mobile_logo['url']; ?>" class="logo show-for-small-only" alt="<?php echo $mobile_logo['alt']; ?>" title="<?php echo $mobile_logo['title']; ?>">
				</a>
			</div>
			<div class="title-bar float-right" data-responsive-toggle="navigation">
				<button class="fa fa-bars" type="button" data-toggle></button>
			</div><!-- .title-bar -->

			</div><!-- .toggle-container -->
			<div class="top-bar" id="navigation">
				<?php $main = array(
					'theme_location'  => 'primary',
					'menu' => 'Main Navigation',
					'container'       => '',
					'menu_class'      => 'dropdown menu show-for-medium main',
					'items_wrap' => '<ul data-responsive-menu="drilldown medium-dropdown" data-drop-down-menu class="%2$s">%3$s</ul>'
				); $secondary = array(
					'theme_location'  => 'secondary',
					'menu' => 'Secondary Navigation',
					'container'       => '',
					'menu_class'      => 'dropdown menu show-for-medium secondary',
					'items_wrap' => '<ul class="%2$s" data-drop-down-menu>%3$s</ul>'
				); $mobile = array(
					'theme_location'  => 'mobile',
					'menu' => 'Mobile Navigation',
					'container'       => '',
					'menu_class'      => 'dropdown menu show-for-small-only mobile',
					'items_wrap' => '<ul data-responsive-menu="drilldown medium-dropdown" data-drop-down-menu class="%2$s">%3$s</ul>'
				);
				echo '<div class="secondary-buttons">
        <div class="healcodediv">
          <a target="_blank" href="https://clients.mindbodyonline.com/classic/mainclass?studioid=14162&tg=&vt=&lvl=&stype=&view=&trn=0&page=&catid=&prodid=&date=6%2f20%2f2017&classid=0&prodGroupId=&sSU=&optForwardingLink=&qParam=&justloggedin=&nLgIn=&pMode=0&loc=1">Login | Register</a>
        </div>
					<div class="schedule-button">
						<a href="/schedule/" title="View our online schedule and signup for classes!">Schedule</a>
						</div><!-- .schedule-button -->
				</div>';
				wp_nav_menu( $secondary );
				wp_nav_menu( $main );
				wp_nav_menu( $mobile );?>
			</div><!-- .top-bar -->
		</div><!-- .row -->
	</header>

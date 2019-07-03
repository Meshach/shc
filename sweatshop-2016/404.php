<?php get_header();
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
	echo '<div class="row">
		<div class="column medium-9 large-7 medium-centered" data-equalizer>
			<h1 class="textcenter textuppercase textwhite"><span class="textbold">404</span><br /><span class="textgreen">Page Not Found</span></h1>
			<div class="column medium-6 textcenter border" data-equalizer-watch>
				<p class="text20 textwhite"><a href="'.$previous.'" class="textwhite" title="Return to the previous page">Go back to the previous page</a></p>
			</div><!-- .column large-6 -->
			<div class="column medium-6 textcenter border" data-equalizer-watch>
				<p class="text20 textwhite"><a href="/" title="Visit the Exhibit Partners\' Homepage" class="textwhite">Head to our Homepage</a></p>
			</div><!-- .column large-6 -->
		</div><!-- .column medium-12 large-6 -->
	</div><!-- .row -->';

get_footer(); ?>
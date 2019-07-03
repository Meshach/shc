<?php get_header();
if(have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="slideshowcontainer container">
		<div class="slideshow">
			<div class="slide">
				<img src="<?php bloginfo('template_directory'); ?>/images/slides/slide-class-schedule.png" alt="Class Schedule Slide" title="Sweatshop Health Club Class Schedule" />
			</div><!-- .slide -->
		</div><!-- .slideshow active -->
		<div class="angle border"></div><!-- .angle -->
	</div><!-- .slideshowcontainer -->

		<div class="row">
			<?php echo '<div class="column">
				<h1 class="text-center">'.get_the_title().'</h1>';
				the_content();
			echo '</div><!-- .column -->'; ?>
		</div><!-- .row -->
		<div class="row" id="schedule">
			<div class="column">
				<script src="https://widgets.healcode.com/javascripts/healcode.js" type="text/javascript"></script>
				<healcode-widget data-type="schedules" data-widget-partner="mb" data-widget-id="d87591c653" data-widget-version="0.1"></healcode-widget>
			</div><!-- .column -->
		</div><!-- .row -->

<?php endwhile; // end of the loop.
endif; ?>
<?php get_footer(); ?>

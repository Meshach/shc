<?php get_header();
if(have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="slideshowcontainer container">
		<div class="slideshow">
			<div class="slide">
				<?php if(has_post_thumbnail()) {
					the_post_thumbnail('tn1900crop462');
				} else {
					echo '<img src="'.get_bloginfo('template_directory').'/images/slides/slide-class-schedule.png" alt="Class Schedule Slide" title="Sweatshop Health Club Class Schedule" />';
				} ?>
			</div><!-- .slide -->
		</div><!-- .slideshow active -->
		<div class="angle border"></div><!-- .angle -->
	</div><!-- .slideshowcontainer -->

		<div class="row">
			<?php echo '<div class="column">
				<h1 class="text-center">'.get_the_title().'</h1>';
				the_content(); ?>


			<?php echo '</div><!-- .column -->'; ?>
		</div><!-- .row -->
		<!-- Begin MailChimp Signup Form -->

		<div class="row" id="mc_embed_signup">
      <!-- -->
      <div class="column">
        <div class="ssf-emma-form">
          <div class="indicates-required"><p><span class="asterisk">*</span> indicates required</p></div>
          <?php echo do_shortcode('[gravityform id=4 title=false description=false ajax=true]'); ?>
        </div>
      </div>
      <!-- -->
			<!-- Begin MailChimp Signup Form -->
			<!--<div class="column">
				<form action="//sweatshopfitness.us11.list-manage.com/subscribe/post?u=339e78004eb7f4dd2e82dee77&amp;id=5661b363b8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">

						<div class="indicates-required"><p><span class="asterisk">*</span> indicates required</p></div>
						<div class="mc-field-group column medium-6">
							<label for="mce-FNAME">First Name </label>
							<input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
						</div>
						<div class="mc-field-group column medium-6">
							<label for="mce-LNAME">Last Name </label>
							<input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name">
						</div>
						<div class="mc-field-group column medium-6">
							<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
							</label>
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address*">
						</div>
						<div class="mc-field-group column medium-6">
							<label for="mce-group[9641]">Interest Type </label>
							<select name="group[9641]" class="REQ_CSS" id="mce-group[9641]">
								<option value="">Interest Type</option>
								<option value="1">General Interest</option>
								<option value="2">Pilates Group Training</option>
								<option value="4">General Fitness Group Training</option>
							</select>
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>

						<div style="position: absolute; left: -5000px;" aria-hidden="true">
							<input type="text" name="b_339e78004eb7f4dd2e82dee77_5661b363b8" tabindex="-1" value="">
						</div>
						<div class="clear column">
							<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
						</div>
					</div>
				</form>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			</div>-->
		</div><!--End mc_embed_signup-->


		<div class="row">
				<div class="angle left map"></div><!-- .angle -->
			<img src="<?php bloginfo('template_directory'); ?>/images/google-map.png" alt="Google Map" title="View Google Map" />
		</div><!-- .row -->

		<div class="row" id="ctas">
			<div class="column medium-6">
				<div class="cta regionpurple cta-content">
					<h2 class="text-center">Employment</h2>
					<p>View Opportunities at Sweatshop!</p>
					<a href="/the-sweatshop/careers/" title="" class="button green">Learn More</a>
				</div><!-- .cta -->
			</div><!-- .column medium-6 -->

			<div class="column medium-6">
				<div class="cta regionpurple">
					<h2 class="text-center">Still have questions?</h2>
					<a href="/contact/" title="" class="button green">Contact Us</a>
				</div><!-- .cta -->
			</div><!-- .column medium-6 -->
		</div><!-- .row -->

<?php endwhile; // end of the loop.
endif; ?>
<?php get_footer(); ?>

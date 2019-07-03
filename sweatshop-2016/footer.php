<?php $footer = array(
	'theme_location'  => 'footer',
	'menu' => 'Footer Navigation',
	'container'       => '',
	'menu_class'      => 'inline simple'
);
$footer_text = get_field('footer_text', 'options');
$contact_title = get_field('contact_title', 'options');
$top = get_field('top_left_contact', 'options');
$bottom = get_field('bottom_left_contact', 'options');
$hours_title = get_field('hours_title', 'options');
$hours = get_field('hours', 'options');

$contact_bg = get_field('contact_background_image', 'options');
$contact_size = 'tn1600crop';
$bg_crop = $contact_bg['sizes'][$contact_size];
$bg_width = $contact_bg['sizes'][ $contact_size . '-width' ];
$bg_height = $contact_bg['sizes'][ $contact_size . '-height' ];

echo '<div class="container" id="contact">

	<div class="angle-bottom border"></div><!-- .angle -->
	<img src="'.$bg_crop.'" alt="'.$contact_bg['alt'].'" title="'.$contact_bg['title'].'" width="'.$bg_width.'" height="'.$bg_height.'" class="show-for-medium" />
	<div class="row" data-equalizer data-equalizer-mq="medium-up">
		<h2>'.$contact_title.'</h2>
		<div class="column medium-4" data-equalizer-watch>
			<div class="contact-top">
				'.$top.'
			</div><!-- .contact-top -->
			<div class="contact-bottom">
				'.$bottom.'
			</div><!-- .contact-bottom -->
		</div><!-- .column medium-4 -->
		<div class="column medium-8" data-equalizer-watch>
			<h3>'.$hours_title.'</h3>
			<dl>';
				foreach($hours as $hour) {
					$days = $hour['day'];
					$time = $hour['time'];
					echo '<dt>'.$days.'</dt><dd>'.$time.'</dd>';
				}
			echo '</dl>
		</div><!-- .column medium-8 -->
	</div><!-- .row -->
</div><!-- .container -->';

echo '<footer>
	<div class="row">
		<div class="column medium-6">
			'.$footer_text.'
		</div><!-- .column -->
		<div class="column medium-6">';
			wp_nav_menu( $footer );
		echo '</div><!-- .column medium-6 -->
	</div><!-- .row -->
</footer>'; ?>
<script src="https://widgets.healcode.com/javascripts/healcode.js" type="text/javascript" defer="defer"></script>
<?php wp_footer(); ?>

</body>
</html>

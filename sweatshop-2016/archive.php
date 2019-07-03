<?php get_header();
echo '<div class="row pv40">
	<div class="column medium-8">';
		if(have_posts()) :
			while(have_posts()) : the_post();
				echo '<article>';
					if(has_post_thumbnail()) { the_post_thumbnail('tn190crop'); } else { echo '<img src="'.get_bloginfo('template_directory').'/images/placeholder.jpg" alt="Placeholder Image" title="Sweatshop Health Club" />'; }
					echo '<div class="articlecontent">
						<h2>'.get_the_title().'</h2>
						<p>'; jkd_excerpt(array('length' => 27, 'suffix' => '&hellip;', 'link_text' => 'Read More')); echo '</p>
					</div><!-- .articlecontent -->
				</article>';
			endwhile; // End the loop. Whew.
			if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif;
		endif;
	echo '</div><!-- .column medium-7 -->
	<div class="column medium-4">';
		get_sidebar();
	echo '</div><!-- .column medium-5 -->
</div><!-- .row -->';

get_footer(); ?>

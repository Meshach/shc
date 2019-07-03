<?php get_header();
		if(have_posts()) :
		$p_image = get_field('placeholder_image','options');
		$p_size = 'tn415crop';
		$p_img = $p_image['sizes'][$p_size];
		$p_width = $p_image['sizes'][ $p_size . '-width' ];
		$p_height = $p_image['sizes'][ $p_size . '-height' ];
		$n=0;
		echo '<div class="slideshowcontainer container">
			<div class="slideshow">
				<div class="slide">';
					echo '<img src="'.get_bloginfo('template_directory').'/images/slides/slide-news-blog.jpg" alt="People participating in Barre exercises" title="View the Latest from the Blog" />';

				echo '</div><!-- .slide -->
			</div><!-- .slideshow active -->
			<div class="angle border"></div><!-- .angle -->
		</div><!-- .slideshowcontainer -->';
			echo '<div id="news" class="container">
				<div class=" column">
					<h2 class="text-center">Latest from the Blog</h2>
				</div><!-- .newsheading -->
				<div class="row pb30 mt60 clearfix" data-equalizer-watch>';
			while(have_posts()) : the_post(); $n++;
				echo '<div class="column medium-6 large-4 pb30" data-equalizer>
					<div class="newsimage">
						<a href="'.get_permalink().'" alt="Read '.get_the_title().'">
							'.((get_the_post_thumbnail($post->ID) !== '')?get_the_post_thumbnail($post->id, 'tn415crop'):"<img src='".$p_img."' alt='".$p_image['alt']."' title='".$p_image['title']."' width='".$p_width."' height='".$p_height."'  />").'
							<h3 class="textwhite">'.get_the_title().'</h3>
						</a>
					</div><!-- .newsimage -->
					<div class="newscontent">
						<p>';
							ssf_excerpt(array('length' => 18, 'suffix' => '&hellip;', 'link_text' => 'Read More'));
						echo '</p>
					</div><!-- .newscontent -->
				</div><!-- .column medium-6 -->';
			endwhile; // End the loop. Whew.
			echo '</div>
			<div class="row clearfix">';
			if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif;
		echo '</div></div>';
		endif; wp_reset_postdata();

		$media_query = new WP_Query('post_type=post&category_name=press&posts_per_page=4');
		if($media_query->have_posts()) :
			echo '<div class="row" id="blurb">
				<div class="column medium-6">
					<div class="angle left"></div><!-- .angle -->
					<img src="'.get_bloginfo('template_directory').'/images/media-press.jpg" alt="Sweatshop Media & Press" title="Sweatshop Media & Press" width="456" height="315" />
				</div><!-- .column medium-6 -->

				<div class="column medium-6">
					<h2><span>Word on The Street</span> MEDIA &amp; PRESS</h2>';
					while($media_query->have_posts()) : $media_query->the_post();
					$external_link = get_field('external_link');

					if($external_link) {
						echo '<h3><a href="'.$external_link.'" target="_blank">'.get_the_title().'</a></h3>';
					} else {
						echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
					}
					endwhile;
				echo '</div><!-- .column medim-6 -->
			</div><!-- .row -->';
		 endif; wp_reset_postdata();

get_footer(); ?>

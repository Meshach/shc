<?php get_header();

if(have_posts()) : while (have_posts()) : the_post();
	echo '<div class="slideshowcontainer container">
		<div class="slideshow">
			<div class="slide">';
			if(has_post_thumbnail()) {
				the_post_thumbnail('tn1900crop462');
			} else {
				echo '<img src="'.get_bloginfo('template_directory').'/images/slides/slide-class-schedule.png" alt="Class Schedule Slide" title="Sweatshop Health Club" />';
			}
			echo '</div><!-- .slide -->
		</div><!-- .slideshow active -->
		<div class="angle border"></div><!-- .angle -->
	</div><!-- .slideshowcontainer -->
		<div class="row">
			<div class="column text-center mb30">
				<h1 class="text-center">'.get_the_title().'</h1>';
				the_content();
			echo '</div><!-- .column -->
		</div><!-- .row -->';
		if(have_rows('page_details')):
			while(have_rows('page_details')): the_row();

				if(get_row_layout() == 'accordion'):
					$a_rows = get_sub_field('accordion_rows');
					$a_title = get_sub_field('accordion_title');
					$a_content = get_sub_field('accordion_content');
					echo '<div class="row" id="class-accordion">';
						if($a_title && $a_content) {
							echo '<div class="column medium-6" id="class-accordion-title">
								<h2>'.$a_title.'</h2>
							</div><!-- .column.medium-6 -->
							<div class="column medium-6" id="class-accordion-content">
								'.$a_content.'
							</div><!-- .column medium-6 -->';
						}
						echo '<div class="column">
							<ul data-accordion data-allow-all-closed="true" class="accordion">';
								foreach($a_rows as $a) {
									$a_title = $a['accordion_title'];
									$a_subtitle = $a['accordion_subtitle'];
									$a_content = $a['accordion_content'];
									echo '<li data-accordion-item class="accordion-item">
										<a href="#" title="" class="accordion-title">'.$a_title.''.(($a_subtitle)?"<span class=\"subtitle\">".$a_subtitle."</span>":"").'</a>
										<div data-tab-content class="accordion-content">
											'.$a_content.'
										</div><!-- .accordion-content -->
									</li><!--.accordion-item-->';
								}
							echo '</ul><!--.row.accordion-->
						</div><!-- .column -->
					</div><!--.row #class-accordion-->';
				endif; // Accordion

				if(get_row_layout() == 'banner'):
					$b_image = get_sub_field('banner_image');
					$b_size = 'tn1600crop';
					$b_img = $b_image['sizes'][$b_size];
					$b_width = $b_image['sizes'][ $b_size . '-width' ];
					$b_height = $b_image['sizes'][ $b_size . '-height' ];

					$b_bg = get_sub_field('banner_background_color');
					$b_text = get_sub_field('banner_text_color');
					$b_btn = get_sub_field('banner_button_color');
					$b_title = get_sub_field('banner_title');
					$b_subtitle = get_sub_field('banner_subtitle');
					$b_content = get_sub_field('banner_content');
					$b_link = get_sub_field('banner_link');
					$b_link_text = get_sub_field('banner_link_text');

					echo '<div class="container banner">
						<div class="angle"></div><!-- .angle -->
						<img src="'.$b_img.'" alt="'.$b_image['alt'].'" title="'.$b_image['title'].'" width="'.$b_width.'" height="'.$b_height.'" class="overlay-bg show-for-medium"  />
						<div class="row">
							<div class="bannercontent column medium-6 region'.$b_bg.' text'.$b_btn.'">
								<h2>'.(($b_subtitle)?"<span>".$b_subtitle."</span>":"").''.$b_title.'</h2>
								'.$b_content.'
								'.(($b_link && $b_link_text)?"<a href='".$b_link."' class='button ".$b_btn."'>".$b_link_text."</a>":"").'
							</div><!-- .bannercontent -->
						</div><!-- .row -->
						<div class="angle border"></div><!-- .angle -->
					</div><!-- .container banner -->';

				endif; // Banner

				if(get_row_layout() == 'blurb'):
					$b_image = get_sub_field('blurb_image');
					$b_size = 'tn490';
					$b_img = $b_image['sizes'][$b_size];
					$b_width = $b_image['sizes'][ $b_size . '-width' ];
					$b_height = $b_image['sizes'][ $b_size . '-height' ];

					$b_title = get_sub_field('blurb_title');
					$b_subtitle = get_sub_field('blurb_subtitle');
					$b_content = get_sub_field('blurb_content');
					$b_link = get_sub_field('blurb_link');
					$b_link_text = get_sub_field('blurb_link_text');

					echo '<div class="row mt50">
						<div class="column medium-6">
							<div class="angle left"></div><!-- .angle -->
							<img src="'.$b_img.'" alt="'.$b_image['alt'].'" title="'.$b_image['title'].'" width="'.$b_width.'" height="'.$b_height.'" />
						</div><!-- .column medium-6 -->
						<div class="column medium-6">
							<h2>'.(($b_subtitle)?"<span>".$b_subtitle."</span>":"").' '.$b_title.'</h2>
							'.$b_content.'
							'.(($b_link && $b_link_text)?"<a href='".$b_link."' class='button ".$b_btn."'>".$b_link_text."</a>":"").'
						</div><!-- .column medim-6 -->
					</div><!-- .row -->';

				endif; // Blurb

				if(get_row_layout() == 'call_to_actions'):
					$ctas = get_sub_field('call_to_actions');
					$cta_count = count($ctas);
					$c=0;

					echo '<div class="row" id="ctas">';
						foreach($ctas as $cta) { $c++;
							$cta_title = $cta['cta_title'];
							$cta_bg = $cta['cta_background_color'];
							$cta_text = $cta['cta_text_color'];
							$cta_btn = $cta['cta_button_color'];
							$cta_content = $cta['cta_content'];
							$cta_link = $cta['cta_link'];
							$cta_link_text = $cta['cta_link_text'];

							echo '<div class="'.(($cta_count==1)?"medium-centered ":"").'column medium-6 text'.$cta_text.'">
								<div class="cta region'.$cta_bg.' '.(($cta_content==1)?" cta-content ":"").'">
									<h2 class="text-center">'.$cta_title.'</h2>
									'.(($cta_content)?$cta_content:"").'
									'.(($cta_link && $cta_link_text)?"<a href='".$cta_link."' class='button ".$cta_btn."'>".$cta_link_text."</a>":"").'
								</div><!-- .cta -->
							</div><!-- .column medium-6 -->';
						}
					echo '</div><!-- .row -->';

				endif;

				if(get_row_layout() == 'class_schedule'):
					$class = get_sub_field('class_schedule_id');

					echo '<div class="row" id="schedule">
						<div class="column">
							<div class="healcode-schedule">
								<h2 class="green">'.get_the_title().' Schedule</h2>
								<healcode-widget data-type="schedules" data-widget-partner="mb" data-widget-id="'.$class.'" data-widget-version="0.1"></healcode-widget>
							</div><!-- .healcode-schedule -->
						</div><!-- .column -->
					</div><!-- .class-schedule -->';

				endif;

				if(get_row_layout() == 'image'):
					$i_image = get_sub_field('content_image');
					$i_size = 'tn1012crop';
					$i_img = $i_image['sizes'][$i_size];
					$i_width = $i_image['sizes'][ $i_size . '-width' ];
					$i_height = $i_image['sizes'][ $i_size . '-height' ];

					echo '<div class="row" id="image">
						<div class="angle left"></div><!-- .angle -->
						<div class="column"><img src="'.$i_img.'" alt="'.$i_image['alt'].'" title="'.$i_image['title'].'" width="'.$i_width.'" height="'.$i_height.'" /></div>
					</div><!-- .row -->';

				endif; // Banner

				if(get_row_layout() == 'promotions'):
					$promo_type = get_sub_field('use_default_promotions');
					echo '<div class="container pb30" id="join">';
						if($promo_type==true):
							$p_title = get_field('promotions_title', 'options');
							$promos = get_field('promotions', 'options');
						else:
							$p_title = get_field('promotions_title');
							$promos = get_field('promotions');
						endif;

						echo '<h2 class="text-center">'.$p_title.'</h2>
						<div class="row" data-equalizer data-equalizer-mq="medium-only">';
							foreach($promos as $p) {
								$p_title = $p['promotion_title'];
								$p_content = $p['promotion_content'];
								$p_price = $p['promotion_price'];
								$p_icon = $p['promotion_icon'];
								$p_link = $p['promotion_link'];
								$p_link_text = $p['promotion_link_text'];
								$p_link_target = $p['promotion_link_target'];
								echo '<div class="column medium-6 large-3" data-equalizer-watch>
									<div class="join-banner">';
										if($p_icon):
											echo '<div class="join-icon asterisk"><a href="'.$p_link.'"><span>'.$p_price.'</span></a></div>';
										elseif($p_price):
											echo '<div class="join-icon"><a href="'.$p_link.'"><span>$'.$p_price.'</span></a></div>';
										endif;
										echo '<div class="join-content">
											<h3>'.$p_title.'</h3>
											'.(($p_content)?" '.$p_content.'":"").'
										</div><!-- .join-content -->';
										echo '<a href="'.$p_link.'" class="button green" '.(($p_link_target==true)?" target='_blank'":"").'>'.$p_link_text.'</a>';
									echo '</div><!-- .join-banner -->
								</div><!-- .column medium-6 large-3 -->';
							}
						echo '</div>';
					echo '</div>';
				endif; // promotions

			endwhile; // Page Details
		endif; // Page Details
endwhile; // end of the loop.
endif;// end if have posts.

/*$class_title = get_sub_field('class_carousel_title');
$class = get_sub_field('class_carousel'); */
$class_query = new WP_query('posts_per_page=-1&orderby=title&order=asc&post_type=fitness');
if($class_query->have_posts()) :
	$p_image = get_field('placeholder_image','options');
	$p_size = 'thumbnail';
	$p_img = $p_image['sizes'][$p_size];
	$p_width = $p_image['sizes'][ $p_size . '-width' ];
	$p_height = $p_image['sizes'][ $p_size . '-height' ];
	echo '<div class="row" id="classcarousel">
		<h3 class="text-center">More Fitness Classes</h3>
		<div class="carousel-small">';

			while($class_query->have_posts()) : $class_query->the_post();

				echo '<div class="carousel-item medium-2">
					<a href="'.get_permalink().'" alt="'.get_the_title().'">'.((has_post_thumbnail())?get_the_post_thumbnail($post->id, 'thumbnail'):"<img src='".$p_img."' alt='".$p_image['alt']."' title='".$p_image['title']."' width='".$p_width."' height='".$p_height."'  />").'</a>
					<h3><a href="'.get_permalink().'" alt="Read '.get_the_title().'">'.get_the_title().' <span class="fa fa-angle-right"></span></a></h3>
				</div><!-- .column medium-4 -->';
			endwhile;

		echo '</div>
	</div>';
endif; wp_reset_postdata();

 ?>
<?php get_footer(); ?>

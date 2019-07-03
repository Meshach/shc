<?php get_header();
if(have_posts()) : while (have_posts()) : the_post();
	$blocks = false;
	if(have_rows('page_details')):
		while(have_rows('page_details')): the_row();
			if(get_row_layout() == '2_column_block'):
				$blocks = true;
			endif;
		endwhile;
	endif;
	$page_header = get_field('page_header');
	if($page_header == 'slideshow') {
		$slides = get_field('slideshow');
		echo '<div class="slideshowcontainer container">
			<div class="slideshow">';
				foreach($slides as $s) {
					$s_image = $s['slide_image'];
					$s_size = 'tn1600crop752';
					$s_img = $s_image['sizes'][$s_size];
					$s_width = $s_image['sizes'][ $s_size . '-width' ];
					$s_height = $s_image['sizes'][ $s_size . '-height' ];

					$s_bg = $s['slide_background_color'];
					$s_btn = $s['slide_button_color'];
					$s_title = $s['slide_title'];
					$s_subtitle = $s['slide_subtitle'];
					$s_content = $s['slide_content'];
					$s_link = $s['slide_link'];
					$s_link_text = $s['slide_link_text'];

					echo '<div class="slide">
						<img src="'.$s_img.'" alt="'.$s_image['alt'].'" title="'.$s_image['title'].'" width="'.$s_width.'" height="'.$s_height.'" />
						<div class="row">
							<div class="slidecontent column medium-8 region'.$s_bg.'">
								<h1>'.(($s_subtitle)?" <span>".$s_subtitle."</span>":"").' '.$s_title.'</h1>
								'.$s_content.'
								'.(($s_link && $s_link_text)?"<a href='".$s_link."' class='button ".$s_btn."'>".$s_link_text."</a>":"").'

							</div><!-- .slidecontent -->
						</div><!-- .slidecontentcontainer -->
					</div><!-- .slide -->';
				}
			echo '</div><!-- .slideshow -->
			'.(($blocks==false)?"<div class='angle border'></div><!-- .angle -->":"").'
		</div><!-- .slideshowcontainer container -->';
	} // Slideshow
	else {
		echo '<div class="slideshowcontainer container">
			<div class="slideshow">
				<div class="slide">';
				if(has_post_thumbnail()) {
					the_post_thumbnail('tn1900crop462');
				} else {
					echo '<img src="'.get_bloginfo('template_directory').'/images/slides/slide-class-schedule.png" alt="Class Schedule Slide" title="Sweatshop Health Club Class Schedule" />';
				}
				echo '</div><!-- .slide -->
			</div><!-- .slideshow active -->
			<div class="angle border"></div><!-- .angle -->
		</div><!-- .slideshowcontainer -->';
		echo '<div class="row">
			<div class="column text-center mb30">
				<h1 class="text-center">'.get_the_title().'</h1>';
				the_content();
			echo '</div><!-- .column -->
		</div><!-- .row -->';
	} ?>

	<?php $video_thumb = get_field('video_thumbnail_image');
	$videos = get_field('videos');
	if($videos) { ?>
		<div class="row videocontainer" data-equalizer data-equalize-on="medium">
			<div class="column medium-8 float-right popup-video-image" data-equalizer-watch>
				<div class="angle"></div><!-- .angle -->
				<a data-open="career-starter" class="imageoverflow popup-video"><img src="<?php echo $video_thumb['url']; ?>" alt="<?php echo $video_thumb['alt']; ?>" title="<?php echo $video_thumb['title']; ?>" /></a>
			</div><!-- .column medium-8 -->
			<div class="column medium-4" data-equalizer-watch>
				<?php foreach($videos as $vid) {
					$vid_title = $vid['video_title'];
					$vid_slug = sanitize_title($vid_title);
					$vid_URL = $vid['video_url'];
					$vid_content = $vid['video_content'];
					echo '<div class="video-toggle">
						<a data-open="'.$vid_slug.'" class="button green popup-video">'.$vid_title.'</a>
						<div data-reveal data-animation-in="scale-in-up" class="video reveal" id="'.$vid_slug.'">
							<div class="iframewrapper">
								<iframe src="'.$vid_URL.'" frameborder="0" name="Career Starter" scrolling="no" width="1400" height="788"></iframe>
							</div><!-- .iframewrapper -->
							<div class="video-title column medium-4">
								<h2>'.$vid_title.'</h2>
							</div><!-- .video-title column medium-4 -->
							<div class="video-content column medium-8">
								'.$vid_content.'
							</div><!-- .video-content column medium-8 -->
							<button class="video-close" data-close aria-label="Close modal" type="button">
								<span aria-hidden="true"></span>
							</button>
						</div><!-- .video reveal -->
					</div><!-- .video-toggle -->';
				} ?>
			</div><!-- .column medium-4 -->
		</div><!-- .row -->
	<?php }
	if(have_rows('page_details')):
		while(have_rows('page_details')): the_row();

			if(get_row_layout() == '2_column_block'):
				$columns = get_sub_field('columns');
				$i=0;
				echo '<div class="container clearfix" id="columns">';
					foreach($columns as $c) { $i++;
						$c_image = $c['column_image'];
						$c_size = 'tn800crop';
						$c_img = $c_image['sizes'][$c_size];
						$c_width = $c_image['sizes'][ $c_size . '-width' ];
						$c_height = $c_image['sizes'][ $c_size . '-height' ];

						$c_text = $c['column_text_color'];
						$c_btn = $c['column_button_color'];
						$c_title = $c['column_title'];
						$c_content = $c['column_content'];
						$c_link = $c['column_link'];
						$c_link_text = $c['column_link_text'];

						echo '<div class="column large-6 overlay-column">
							<img src="'.$c_img.'" alt="'.$c_image['alt'].'" title="'.$c_image['title'].'" width="'.$c_width.'" height="'.$c_height.'" class="overlay-bg show-for-medium"  />

							<div class="overlay-content '.(($i==1)?"right":"left").' text'.$c_text.'">
								<h2 class="text'.$c_text.'">'.$c_title.'</h2>
								'.$c_content.'
								'.(($c_link && $c_link_text)?"<a href='".$c_link."' class='button ".$c_btn."'>".$c_link_text."</a>":"").'

							</div><!-- .overlay-content -->

						</div><!-- .column medium-6 -->';
					} unset($i);
					echo '<div class="angle border"></div><!-- .angle -->';
				echo '</div><!-- .container clearfix -->';
			endif; // 2_column_block

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
				$b_link_target = get_sub_field('blurb_link_target');

				echo '<div class="row mt50" id="blurb">
					<div class="column medium-6">
						<div class="angle left"></div><!-- .angle -->
						<img src="'.$b_img.'" alt="'.$b_image['alt'].'" title="'.$b_image['title'].'" width="'.$b_width.'" height="'.$b_height.'" />
					</div><!-- .column medium-6 -->
					<div class="column medium-6">
						<h2>'.(($b_subtitle)?"<span>".$b_subtitle."</span>":"").' '.$b_title.'</h2>
						'.$b_content;
						if($b_link && $b_link_text){
							echo '<a href="'.$b_link.'" class="button"'.(($b_link_target)?" target=\"_blank\"":"").'>'.$b_link_text.'</a>';
						}
					echo '</div><!-- .column medim-6 -->
				</div><!-- .row -->';

			endif; // Blurb
			
						if(get_row_layout() == 'colored_columns'):
				$col_title = get_sub_field('columns_title');
				$col_bg_color = get_sub_field('columns_background_color');
				$col_btn_color = get_sub_field('columns_button_color');
				$col_txt_color = get_sub_field('columns_text_color');
				$col_columns = get_sub_field('colored_columns');
				$col_count = count($col_columns);
				echo '<div class="container pb30" id="member-packages">';
					echo '<h2 class="text-center">'.$col_title.'</h2>
					<div class="row" data-equalizer data-equalizer-mq="medium-only">
						<div class="angle"></div><!-- .angle -->';
						foreach($col_columns as $col) {
							$col_title = $col['column_title'];
							$col_content = $col['column_content'];
							$col_link = $col['column_link'];
							$col_link_text = $col['column_link_text'];
							$col_link_target = $col['column_link_target'];
							if($col_count == 4) {
								echo '<div class="column medium-6 large-3" data-equalizer-watch>';
							} elseif($col_count == 3) {
								echo '<div class="column medium-4" data-equalizer-watch>';
							} elseif($col_count == 2) {
								echo '<div class="column medium-6" data-equalizer-watch>';
							} elseif($col_count == 1) {
								echo '<div class="column medium-6 medium-centered" data-equalizer-watch>';
							}
								echo '<div class="member-package">
									<div class="member-content">
										<h3>'.$col_title.'</h3>
										'.$col_content.'
									</div><!-- .member-content -->';
									if($col_link && $col_link_text) {
										echo '<a href="'.$col_link.'"'.(($col_link_target)?" target='_blank'":"").' class="button price">'.$col_link_text.'</a>';
									} elseif($col_link_text) {
										echo '<p class="price">'.$col_link_text.'</p>';
									}
								echo '</div><!-- .member-package -->
							</div><!-- .column medium-6 large-3 -->';
						}
					echo '</div>';
				echo '</div>';
			endif; // colored_columns

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

			if(get_row_layout() == 'class_carousel'):
				$class_title = get_sub_field('class_carousel_title');
				$class = get_sub_field('class_carousel');
				$class_query = new WP_query('posts_per_page=-1&orderby=menu_order&order=asc&post_type='.$class);
				if($class_query->have_posts()) :
					$p_image = get_field('placeholder_image','options');
					$p_size = 'thumbnail';
					$p_img = $p_image['sizes'][$p_size];
					$p_width = $p_image['sizes'][ $p_size . '-width' ];
					$p_height = $p_image['sizes'][ $p_size . '-height' ];
					echo '<div class="row" id="classcarousel">
						<h2 class="text-center">'.$class_title.'</h2>
						<div class="carousel">';

							while($class_query->have_posts()) : $class_query->the_post();

								echo '<div class="carousel-item medium-4">
									<a href="'.get_permalink().'" alt="'.get_the_title().'">'.((has_post_thumbnail())?get_the_post_thumbnail($post->id, 'thumbnail'):"<img src='".$p_img."' alt='".$p_image['alt']."' title='".$p_image['title']."' width='".$p_width."' height='".$p_height."'  />").'</a>
									<h3><a href="'.get_permalink().'" alt="Read '.get_the_title().'">'.get_the_title().' <span class="fa fa-angle-right"></span></a></h3>
								</div><!-- .column medium-4 -->';
							endwhile;

						echo '</div>
					</div>';
				endif; wp_reset_postdata();

			endif; // Banner

			if(get_row_layout() == 'page_carousel'):
				$page_title = get_sub_field('page_carousel_title');
				$pages = get_sub_field('page_carousel');
				if( $pages ):
					echo '<div class="row" id="classcarousel">
						<h2 class="text-center">'.$page_title.'</h2>
						<div class="carousel">';
						    foreach( $pages as $post):
								setup_postdata($post);
								$p_image = get_field('placeholder_image','options');
								$p_size = 'thumbnail';
								$p_img = $p_image['sizes'][$p_size];
								$p_width = $p_image['sizes'][ $p_size . '-width' ];
								$p_height = $p_image['sizes'][ $p_size . '-height' ];

								$t_image = get_field('thumbnail_image');
								$t_img = $t_image['sizes'][$p_size];
								$t_width = $t_image['sizes'][ $p_size . '-width' ];
								$t_height = $t_image['sizes'][ $p_size . '-height' ];
								echo '<div class="carousel-item medium-4">
									<a href="'.get_permalink().'" alt="'.get_the_title().'">';
										if($t_img) {
											echo '<img src="'.$t_img.'" alt="'.$t_image['alt'].'" title="'.$t_image['title'].'" width="'.$t_width.'" height="'.$t_height.'"  />';
										} elseif(has_post_thumbnail()) {
											the_post_thumbnail('thumbnail');
										} else {
											echo '<img src="'.$p_img.'" alt="'.$p_image['alt'].'" title="'.$p_image['title'].'" width="'.$p_width.'" height="'.$p_height.'"  />';
										}
									echo '</a>
									<h3><a href="'.get_permalink().'" alt="Read '.get_the_title().'">'.get_the_title().' <span class="fa fa-angle-right"></span></a></h3>
								</div><!-- .column medium-4 -->';
							endforeach;
						echo '</div>
					</div>';
				    wp_reset_postdata();
				endif;

			endif; // Banner

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

if(is_front_page()) {
	$news_query = new WP_query('posts_per_page=2');
	if($news_query->have_posts()) :
		$p_image = get_field('placeholder_image','options');
		$p_size = 'tn1600crop';
		$p_img = $p_image['sizes'][$p_size];
		$p_width = $p_image['sizes'][ $p_size . '-width' ];
		$p_height = $p_image['sizes'][ $p_size . '-height' ];
		echo '<div id="news" class="container">
			<div class="newsheading column">
				<h2 class="text-center">Latest from the Blog</h2>
			</div><!-- .newsheading -->
			<div class="row">';

				while($news_query->have_posts()) : $news_query->the_post();
					echo '<div class="column medium-6">
						<div class="newsimage">
							<a href="'.get_permalink().'" alt="Read '.get_the_title().'">
								'.((has_post_thumbnail())?get_the_post_thumbnail($post->id, 'tn490crop'):"<img src='".$p_img."' alt='".$p_image['alt']."' title='".$p_image['title']."' width='".$p_width."' height='".$p_height."'  />").'
								<h3 class="textwhite">'.get_the_title().'</h3>
							</a>
						</div><!-- .newsimage -->
						<div class="newscontent">
							<p>';
								ssf_excerpt(array('length' => 18, 'suffix' => '&hellip;', 'link_text' => 'Read More'));
							echo '</p>
						</div><!-- .newscontent -->
					</div><!-- .column medium-6 -->';
				endwhile;

			echo '</div>
		</div>';
	endif;
}
wp_reset_postdata(); ?>
<?php get_footer(); ?>

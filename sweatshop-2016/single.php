<?php get_header();
echo '<div class="slideshowcontainer container">
	<div class="slideshow">
		<div class="slide">';
			echo '<img src="'.get_bloginfo('template_directory').'/images/slides/slide-news-blog.jpg" alt="Class Schedule Slide" title="Sweatshop Health Club Class Schedule" />';

		echo '</div><!-- .slide -->
	</div><!-- .slideshow active -->
	<div class="angle border"></div><!-- .angle -->
</div><!-- .slideshowcontainer -->';

echo '<div class="row clearfix" id="blurb">';
	if(have_posts()) :
		while(have_posts()) : the_post();
			echo '<h1 class="text-center">'.get_the_title().'</h1>

			<div class="childcontainer float-left">
				<div class="angle left"></div><!-- .angle -->';
				if(has_post_thumbnail()) { the_post_thumbnail('tn490'); }
			echo '</div><!-- .anglecontainer -->

			<p class="right textpink textuppercase text12">'.get_the_date().'</p>';
			the_content();
			?>

			<div class="tags">
				<?php the_tags() ?>
			</div>

			<?php
			echo "Categories: ";


			$categories = get_the_category();
			$categories_length = count($categories);

			foreach ( $categories as $index => $category ) {

				if($categories_length !== $index + 1){
					echo '<a data-count="'.$categories_length.'"  href="' . get_category_link( $category ) . '">' . $category->name . '</a>, ';
				}else{
					echo '<a href="' . get_category_link( $category ) . '">' . $category->name . '</a>';
				}
			}
			?>
			<?php


		endwhile; // End the loop. Whew.
	endif;
echo '</div><!-- .row -->';
 get_footer(); ?>

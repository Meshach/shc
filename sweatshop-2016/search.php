<?php get_header();
echo '<div class="row pv60">
	<div class="column">';
		if ( have_posts() ) :
			echo '<h1>Search Results for '.get_search_query().'</h1>';
		else:
			echo '<h1>No Results Found</h1>';
		endif;
	echo '</div>
	<div class="column medium-8">';
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				echo '<article>
					<a href="'.get_permalink().'" title="Read '.get_the_title().'">';
						if(has_post_thumbnail()) { the_post_thumbnail('tn190crop'); } else { echo '<img src="'.get_bloginfo('template_directory').'/images/placeholder.jpg" alt="Sweatshop Health Club placeholder image" title="Sweatshop Health Club" />'; }
					echo '</a>
					<div class="articlecontent">
						<h2><a href="'.get_permalink().'" title="Read '.get_the_title().'" class="textblue">'.get_the_title().'</a></h2>
						<p>'; jkd_excerpt(array('length' => 27, 'suffix' => '&hellip;', 'link_text' => 'Read More')); echo '</p>
					</div><!-- .articlecontent -->
				</article>';
			endwhile;
			if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif;
		else :
			echo 'Please try another search term.';
		endif;
	echo '</div><!-- .column medium-8 -->';
	echo '<div class="column medium-4">';
		get_sidebar();
	echo '</div><!-- .column medium-4 -->
</div><!-- .row pv60 -->';
get_footer(); ?>

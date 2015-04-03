<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it
?>
<div role="main">
	<?php if ( have_posts() ) :
	// Do we have any posts/pages in the databse that match our query?
	?>
		<?php while ( have_posts() ) : the_post();
		// If we have a page to show, start a loop that will display it
		?>
			<article class="first_article_title fs-row">
				<h1 class="fs-cell fs-lg-all"><?php the_title(); // Display the title of the page ?></h1>
				<div class="fs-row">
					<div class="fs-cell fs-lg-all">
						<?php the_content();
						// This call the main content of the page, the stuff in the main text box while composing.
						// This will wrap everything in p tags
						?>

						<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
					</div>
				</div><!-- the-content -->
			</article>
		<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		<article>
			<h1>Nothing posted yet</h1>
		</article>
	<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
</div>
<?php get_footer(); get_sidebar();// This fxn gets the footer.php file and renders it ?>
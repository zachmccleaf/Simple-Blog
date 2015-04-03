<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it
?>
<div role="main" class="fs-row">
	<?php if ( have_posts() ) :
	// Do we have any posts in the databse that match our query?
	?>
		<?php while ( have_posts() ) : the_post();
		// If we have a post to show, start a loop that will display it
		?>
			<article>
				<h1 class="fs-cell fs-lg-all article_title"><?php the_title(); // Display the title of the post ?></h1>
				<div class="fs-cell fs-lg-4">
					<div class="date">
						<?php the_time('F jS, Y'); // Display the time published ?> 
					</div>
					<?php if( comments_open() ) : // If we have comments open on this post, display a link and count of them ?>
						<div class="tags"><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
						<div class="dot">&middot;</div>
						<span class="comments">
							<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) );
							// Display the comment count with the applicable pluralization
							?>
						</span>
					<?php endif; ?>
					<div><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
				</div>
				<div class="fs-cell fs-lg-8">
					<?php
                        // draw the thumbnail is there is one
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'featured-image' );
                        }
                    ?>
					<?php the_content();
					// This call the main content of the post, the stuff in the main text box while composing.
					// This will wrap everything in p tags
					?>

					<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
				</div>
			</article>
		<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
		<?php
			// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>
	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		<article>
			<h1>Nothing has been posted like that yet</h1>
		</article>
	<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
</div>
<?php get_footer(); get_sidebar();// This fxn gets the footer.php file and renders it ?>

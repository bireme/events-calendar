<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
		<?php event_breadcrumb($post->ID); ?>

	    <div class="program">
	        <?php
	            $obj = $post;
	            $end_datetime = strtotime(get_field( 'end_date_and_time', $post->ID ));
	            $initial_datetime = strtotime(get_field( 'initial_date_and_time', $post->ID ));
	        ?>
	        <div class="program-day">
	        	<div class="single-session-date">
	                <?php echo date_i18n("d/F/Y - l", $initial_datetime); ?>
	            </div>
		        <div class="session" id="s<?php echo $post->ID; ?>">
		        	<div class="session-time">
                    	<?php echo date("H:i A", $initial_datetime ) . ' - ' . date("H:i A", $end_datetime ); ?>
                	</div>
		            <div class="session-data">
		                <div class="view-detail "><?php _e( 'Details','bvs-events-calendar' ); ?> <i class="fa fa-eye"></i></div>
		                <div class="single-session-title"><?php the_title(); ?></div>
		                <div class="location"><?php the_field( 'location', $post->ID ); ?></div>
		                <div class="author-list">
		                    <?php $author_ids = get_post_meta( $post->ID, 'author' ); ?>
		                    <?php if ( $author_ids[0] ) : // Participants Loop ?>
		                        <?php foreach ($author_ids[0] as $id) : ?>
		                            <div class="s-author">
		                                <div class="author-data">
		                                    <div class="author-name"><a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a></div>
		                                    <div class="author-inst"><span class="job-title"><?php the_field( 'job_title', $id ); ?></span>  - <span class="affiliation"><?php the_field( 'affiliation', $id ); ?></span></div>
		                                </div>
		                            </div>
		                        <?php endforeach; ?>
		                    <?php endif; ?>
		                </div>
		                <div class="detail s-summary summary">
	                        <strong><?php _e( 'Summary','bvs-events-calendar' ); ?></strong>
	                        <?php
	                            if ( get_the_excerpt() ) {
	                                the_excerpt();
	                            } elseif ( get_the_content() ) {
	                                the_content();
	                            }
	                        ?>
	                    </div>

		                <?php get_template_part( 'template-parts/subsession' ); ?>

		                <?php $post = $obj; ?>

		                <?php get_template_part( 'template-parts/presentation' ); ?>

		            </div>
		        </div>
		    </div>
	    </div>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
/**
 * Template Name: Images
 */

$image_urls = array();
$thumbnail_image_urls = array();
$number_of_images = 50;
$number_of_columns = 3;

for ($index = 1; $index <= $number_of_images; $index++) {
    $name = "image_" . (string)$index;
    $image = get_field($name);
    
    if( !empty($image) ){
        $image_urls[$index] = $image['url'];
    }
}

for ($index = 1; $index <= $number_of_images; $index++) {
    $name = "thumbnail_image_" . (string)$index;
    $thumbnail_image = get_field($name);
    
    if( !empty($thumbnail_image) ){
        $thumbnail_image_urls[$index] = $thumbnail_image['url'];
    }
}

get_header(); ?>

    <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>
                        <div align="center">
                            <h1 class="entry-title">Images</h1>

						    <h3 ><?php the_title(); ?></h3>
                            <i>Click on image to enlarge</i>
                        </div>
					</header><!-- .entry-header -->

					<div class="entry-content">
                    
                    <table>
                        <tr>
                        <td width="716">
                            <table>
                                <?php for($index = 1; $index <= $number_of_images; $index+=$number_of_columns) : ?>
                                    <?php 
                                        $image_url_1 = $image_urls[$index]; 
                                        $image_url_2 = $image_urls[$index + 1];
                                        $image_url_3 = $image_urls[$index + 2];
                                        
                                        $thumbnail_image_url_1 = $thumbnail_image_urls[$index]; 
                                        $thumbnail_image_url_2 = $thumbnail_image_urls[$index + 1];
                                        $thumbnail_image_url_3 = $thumbnail_image_urls[$index + 2];
                                    ?>
                                    <?php if (!empty($image_url_1) or !empty( $image_url_2 ) or !empty($image_url_2 ) or
                                        !empty($thumbnail_image_url_1) or !empty( $thumbnail_image_url_2 ) or 
                                        !empty( $thumbnail_image_url_3 )): ?>
                                        <tr>
                                            <?php for($j = 0; $j < $number_of_columns; $j+=1) : ?>
                                                <?php
                                                    $local_index = $index + $j;
                                                    $image_url = $image_urls[$local_index];
                                                    $thumbnail_image_url = $thumbnail_image_urls[$local_index];
                                                ?>
                                                <?php if (!empty($image_url) and !empty($thumbnail_image_url)): ?>
                                                    <td width="76" align="center">
                                                        <div align="center">
                                                        <a href="<?php echo $image_url; ?>" target="_new">
                                                        <img src="<?php echo $thumbnail_image_url; ?>" width="200" height="300" border="1"/>
                                                        </a>
                                                        </div>
                                                    </td>
                                                <?php elseif (empty($image_url) and !empty($thumbnail_image_url) ): ?>
                                                    <td width="76" align="center">
                                                        <div align="center">
                                                        <a href="<?php echo $thumbnail_image_url; ?>" target="_new">
                                                        <img src="<?php echo $thumbnail_image_url; ?>" width="200" height="300" border="1"/>
                                                        </a>
                                                        </div>
                                                    </td>
                                                <?php elseif (!empty($image_url) and empty($thumbnail_image_url) ): ?>
                                                    <td width="76" align="center">
                                                        <div align="center">
                                                        <a href="<?php echo $image_url; ?>" target="_new">
                                                        <img src="<?php echo $image_url; ?>" width="200" height="300" border="1"/>
                                                        </a>
                                                        </div>
                                                    </td>
                                                <?php endif ?>
                                            <?php endfor; ?>
            	                        </tr>
            	                        <tr>
                                            <?php for($j = 0; $j < $number_of_columns; $j+=1) : ?>
                                                <?php
                                                    $local_index = $index + $j;
                                                    $image_url = $image_urls[$local_index];
                                                    $thumbnail_image_url = $thumbnail_image_urls[$local_index];
                                                    $caption = get_field( "caption_" . (string)$local_index );
                                                    $date = get_field( "date_" . (string)$local_index );
                                                ?>
                                                <?php if (!empty($image_url) or !empty($thumbnail_image_url)): ?>
                                                    <td width="76" valign="top">
                                                        <div align="center">Image <?php echo (string)($local_index); ?>: <?php echo $date; ?>;<br />
                                                        <?php echo $caption; ?></div>
                                                    </td>
                                                <?php endif ?>
                                            <?php endfor; ?>
                                        </tr>
                                    <?php endif ?>
                                <?php endfor; ?>
                        </table>
                    </td>
                    </tr>
                </table>   
                    
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</div><!-- .entry-content -->

				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


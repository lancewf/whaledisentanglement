<?php
/**
 * Template Name: Media_Page
 */
 
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

$number_of_images = 50;
$number_of_videos = 50;

$image_urls = array();
for ($index = 1; $index <= $number_of_images; $index++) {
    $name = "image_" . (string)$index;
    $image = get_field($name);
    
    if( !empty($image) ){
        $image_urls[$index] = $image['url'];
    }
}

$thumbnail_image_urls = array();
for ($index = 1; $index <= $number_of_images; $index++) {
    $name = "image_" . (string)$index . "_thumbnail";
    $thumbnail_image = get_field($name);
    
    if( !empty($thumbnail_image) ){
        $thumbnail_image_urls[$index] = $thumbnail_image['url'];
    }
}

$image_captions = array();
for ($index = 1; $index <= $number_of_images; $index++) {
    $name = "image_" . (string)$index . "_caption";
    $image_captions[$index] = get_field($name);
}

$image_credit_permits = array();
for ($index = 1; $index <= $number_of_images; $index++) {
    $name = "image_" . (string)$index . "_credit_permit";
    $image_credit_permits[$index] = get_field($name);
}

$video_captions = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index . "_caption";
    $video_captions[$index] = get_field($name);
}

$video_credit_permits = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index . "_credit_permit";
    $video_credit_permits[$index] = get_field($name);
}

$video_mp4_urls = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index  . "_mp4";
    $video_mp4_urls[$index] = get_field($name);
}

$video_mov_urls = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index  . "_mov";
    $video_mov_urls[$index] = get_field($name);
}

$video_webm_urls = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index  . "_webm";
    $video_webm_urls[$index] = get_field($name);
}

$video_m4v_urls = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index  . "_m4v";
    $video_m4v_urls[$index] = get_field($name);
}

$video_ogg_urls = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index  . "_ogg";
    $video_ogg_urls[$index] = get_field($name);
}

$video_flv_urls = array();
for ($index = 1; $index <= $number_of_videos; $index++) {
    $name = "video_" . (string)$index  . "_flv";
    $video_flv_urls[$index] = get_field($name);
}
$permit = get_field("permit");

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
                        <div align="center" >
                            <h1 class="entry-title">Media</h1>
                            <a href="#images">Images</a> and <a href="#video">video</a> of
                            <br />
                            <strong><?php the_title(); ?></strong>
                        </div>

					</header><!-- .entry-header -->
                    <br />
                    <br />
                    <div align="center">
                        The video and images included on this page have been acquired under NOAA's Marine Mammal Health and Stranding Response Program (MMHSRP - Permit #<?php echo $permit; ?>).  They are approved for usage as long as mention is made that the effort they depict/ represent falls under the authority of NOAA's MMHSRP, and images and video are captioned with "MMHSRP permit #<?php echo $permit; ?>". 
                    </div>
                    <div align="center"><strong>
                    Scroll down for video and/ or images
                    </strong></div>
					<div class="entry-content">
                    
                    <p></p>
                    <h2> Organizations and agencies directly involved in the operation </h2>
                    
                    <table><tr>
                        <td width="716">
                        <?php print the_field( "organizations_and_agencies" ) ?>
                
                        </td></tr>
                    </table>
                    <h2> Narrative </h2>
    				
                    <?php the_content(); ?>        
                        
                    <br />
                    <br />
                    <br />
                    <br />
                    <div align="center">
                    <table class="image-table" >
                        <tr >
    					    <th colspan="2" class="image-table">
                                    Images<a name="images" id="images">
                            </th>
						</tr>
                        <?php for($index = 0; $index < $number_of_images; $index+=1) : ?>
                            <?php
                                $image_url = $image_urls[$index];
                                $thumbnail_image_url = $thumbnail_image_urls[$index];
                                $image_caption = $image_captions[$index];
                                $image_credit_permit = $image_credit_permits[$index];
                            ?>
                            <?php if (!empty($image_url) and !empty($thumbnail_image_url)): ?>
                                <tr>
                                    <td class="image-table-right">
        						        <p > <?php echo $image_caption; ?></p>
								        <p > <?php echo $image_credit_permit; ?> </p>
                                    </td >
                                    <td class="image-table-left">
                                        <a href="<?php echo $image_url; ?>" target="_new"> 
                                            <img src="<?php echo $thumbnail_image_url; ?>" width="200" height="300" />
                                        </a>
                                    </td>
                                </tr>
                            <?php elseif (empty($image_url) and !empty($thumbnail_image_url) ): ?>
                                <tr>
                                    <td class="image-table-right">
            					        <p > <?php echo $image_caption; ?></p>
								        <p > <?php echo $image_credit_permit; ?> </p>
                                    </td >
                                    <td class="image-table-left">
                                        <a href="<?php echo $thumbnail_image_url; ?>" target="_new"> 
                                            <img src="<?php echo $thumbnail_image_url; ?>" width="200" height="300" />
                                        </a>
                                    </td>
                                </tr>
                            <?php elseif (!empty($image_url) and empty($thumbnail_image_url) ): ?>
                                <tr>
                                    <td class="image-table-right">
                				        <p > <?php echo $image_caption; ?></p>
								        <p > <?php echo $image_credit_permit; ?> </p>
                                    </td >
                                    <td class="image-table-left">
                                        <a href="<?php echo $image_url; ?>" target="_new"> 
                                            <img src="<?php echo $image_url; ?>" width="200" height="300" />
                                        </a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endfor; ?>
                    </table>
                    
                    
                    <table class="video-table" >
                        <tr >
        				    <th colspan="2" class="image-table" >
                                    Video<a name="video" id="video">
                            </th>
						</tr>
                        <?php for($index = 0; $index < $number_of_videos; $index+=1) : ?>
                            <?php
                                $video_mp4_url = $video_mp4_urls[$index];
                                $video_mov_url = $video_mov_urls[$index];
                                $video_webm_url = $video_webm_urls[$index];
                                $video_m4v_url = $video_m4v_urls[$index];
                                $video_ogg_url = $video_ogg_urls[$index];
                                $video_flv_url = $video_flv_urls[$index];
                                $video_caption = $video_captions[$index];
                                $video_credit_permit = $video_credit_permits[$index];
                                $video_id = "video-450-" . (string) $index;
                            ?>
                            <?php if (!empty($video_mp4_url) or !empty($video_mov_url) or !empty($video_webm_url) or !empty($video_ogg_url) or !empty($video_m4v_url) or !empty($video_flv_url)): ?>
                                <tr>
                                    <td class="video-table-left">
                						<p><?php echo $video_caption; ?></p>
        								<p ><?php echo $video_credit_permit; ?></p>
                                        <?php if (!empty($video_mp4_url)): ?>
                                            <a href="<?php echo $video_mp4_url; ?>">MP4 file for download</a>
                                        <?php elseif(!empty($video_mov_url)) : ?>
                                            <a href="<?php echo $video_mov_url; ?>">MOV file for download</a>
                                        <?php elseif(!empty($video_webm_url)) : ?>
                                            <a href="<?php echo $video_webm_url; ?>">WEBM file for download</a>
                                        <?php elseif(!empty($video_ogg_url)) : ?>
                                            <a href="<?php echo $video_ogg_url; ?>">OGG file for download</a>
                                        <?php elseif(!empty($video_m4v_url)) : ?>
                                            <a href="<?php echo $video_m4v_url; ?>">M4V file for download</a>
                                        <?php endif ?>
                                    </td>
                                    <td class="video-table-right">
                                        <div class="wp-video" align="center">
                                            <?php if (!empty($video_flv_url) and empty($video_m4v_url) and empty($video_ogg_url) and empty($video_webm_url) ): ?>
                                                <video class="video-js vjs-default-skin" id="<?php echo $video_id; ?>" width="320" height="230"
                                                    data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                                                    <source type="video/x-flv" src="<?php echo $video_flv_url; ?>">
                                                </video>
                                            <?php else: ?>
                                                <video class="wp-video-shortcode" id="<?php echo $video_id; ?>" style="position:relative;max-width:320px;" 
                                                    preload="metadata" controls="controls">
                                                    <?php if (!empty($video_m4v_url)): ?>
                                                        <source type="video/mp4" src="<?php echo $video_m4v_url; ?>" />
                                                    <?php endif ?>
                                                    <?php if (!empty($video_ogg_url)): ?>
                                                        <source type="video/ogg" src="<?php echo $video_ogg_url; ?>" />
                                                    <?php endif ?>
                                                    <?php if (!empty($video_webm_url)): ?>
                                                        <source type="video/webm" src="<?php echo $video_webm_url; ?>" />
                                                    <?php endif ?>
                                                    <?php if (!empty($video_mp4_url)): ?>
                                                        <source type="video/mp4" src="<?php echo $video_mp4_url; ?>" />
                                                        <a href="<?php echo $video_mp4_url; ?>"><?php echo $video_mp4_url; ?></a>
                                                    <?php endif ?>
                                                    <?php if (!empty($video_mov_url)): ?>
                                                        <source src="<?php echo $video_mov_url; ?>" />
                                                        <a href="<?php echo $video_mov_url; ?>"><?php echo $video_mov_url; ?></a>
                                                    <?php endif ?>
                                                </video>
                                            <?php endif ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endfor; ?>
                    </table>
                    </div>
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


<?php
/**
 * Template Name: Case
 */
$image_page = get_field( "image_page" );
$media_page = get_field( "media_page" );
$chart_image = get_field('chart_image');

if( !empty($chart_image) ){
    $chart_image_url = $chart_image['url'];
}

$chart_thumbnail = get_field('chart_thumbnail');

if( !empty($chart_thumbnail) ){
    $chart_image_thumbnail_url = $chart_thumbnail['url'];
}

$animal_image = get_field('animal_image');

if( !empty($animal_image) ){
    $animal_image_url = $animal_image['url'];
}

$animal_thumbnail = get_field('animal_thumbnail_image');

if( !empty($animal_thumbnail) ){
    $animal_image_thumbnail_url = $animal_thumbnail['url'];
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

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
                    
                    <h2> Synopsis </h2>
                    <table><tr>
                        <td width="716">
                        <table>
                            <tr>
                                <td width="76" valign="top"><div align="right"><strong>Date & Time:</strong></div></td>
		                        <td width="120" valign="top"><?php print get_field( "initial_report_time" ) ?></td>
		                        <td width="76" valign="top"><div align="right"><strong>Case #:</strong></div></td>
		                        <td width="76" valign="top"><?php print get_field( "case_number" ) ?></td>
	                        </tr>
	                        <tr>
		                        <td height="45" valign="top" ><div align="right"><strong>Field #</strong>: </div></td>
		                        <td valign="top"><div align="left"><?php print get_field( "animal_field_number" ) ?></div></td>
		                        <td valign="top"><div align="right"><p><strong>Species:<br />  Age:<br /> Sex:</strong></p> </div></td>
          	                    <td valign="top">
                                  <div align="left"> 
                                    <p>
                                    <?php print get_field( "species" ) ?> <br /> 
                                    <?php print get_field( "age" ) ?><br />
                                    <?php print get_field( "sex" ) ?>
                                    </p>
                                  </div></td>
                            </tr>
                            <tr>
                                <td height="27" valign="top"><div align="right"><strong>Location:</strong></div></td>
                                <td colspan="3" valign="top"><div align="left"><?php print get_field( "location_text" ) ?></div></td>
                            </tr>
                            <tr>
                            <td height="36" valign="top"><div align="right"><strong>Lat/ long : </strong></div></td>
                            <td valign="top"><div align="left"><?php print get_field( "lat_long" ) ?></div></td>
                            <td valign="top"><div align="right"><strong>Fix&nbsp; accuracy: </strong></div></td>
                            <td valign="top"><div align="left"><?php print get_field( "fix_accuracy" ) ?></div></td>
                          </tr>
                          <tr>
                            <td height="57" valign="top" class="style57"><div align="right"><strong>Event description: </strong></div></td>
                            <td colspan="3" valign="top" class="style57"><p><?php print get_field( "event_description" ) ?> </p></td>
                          </tr>
                          <tr>
                            <td height="42" valign="top" class="style57"><div align="right"><strong>Status:</strong></div></td>
                            <td valign="top" class="style57"><div align="left"><?php print get_field( "status" ) ?></div></td>
                            <td valign="top" class="style57"><div align="right"><strong>Prognosis:</strong></div></td>
                            <td valign="top" class="style57"><div align="left"><?php print get_field( "progonsis" ) ?></div></td>
                          </tr>
                          <tr>
                            <td height="41" valign="top" class="style57"><div align="right"><strong>Outcome:</strong></div></td>
                            <td colspan="3" valign="top" class="style57"><div align="left">
                              <p><?php print get_field( "outcome" ) ?></p>
                            </div></td>
                          </tr>
                          <tr>
                            <td height="15" valign="top" class="style57"><div align="right"><strong>Action:</strong></div></td>
                            <td colspan="3" valign="top" class="style57"><?php print get_field( "action" ) ?> </td>
                          </tr>
                    </table>
                </td>
                <td valign="top">
                <table>
                    <?php if (!empty($image_page) and !empty( $media_page ) ): ?>
                        <tr>
                            <td>
                                <table><tr>
                                    <td><div align="center">
                                        <a href="<?php echo $image_page; ?>"><strong>Images</strong></a>
                                        </div>
                                    </td>
                                    <td><div align="center">
                                        <a href="<?php echo $media_page; ?>"><strong>Media</strong></a>
                                        </div>
                                    </td>
                                </tr></table>
                            </td>
                        </tr>
                    <?php elseif (!empty($image_page) and empty( $media_page ) ): ?>
                        <tr>
                            <td>
                                <table><tr>
                                    <td><div align="center">
                                        <a href="<?php echo $image_page; ?>"><strong>Images</strong></a>
                                        </div>
                                    </td>
                                </tr></table>
                            </td>
                        </tr>
                    <?php elseif (empty($image_page) and !empty( $media_page ) ): ?>
                        <tr>
                            <td>
                                <table><tr>
                                    <td><div align="center">
                                        <a href="<?php echo $media_page; ?>"><strong>Media</strong></a>
                                        </div>
                                    </td>
                                </tr></table>
                            </td>
                        </tr>
                    <?php endif ?>
                    <tr><td>
                        <div align="center">
                            <?php if (!is_null($chart_image_url) and !is_null($chart_image_thumbnail_url) ): ?>
                                <a href="<?php echo $chart_image_url; ?>" target="_new">
                                <img src="<?php echo $chart_image_thumbnail_url; ?>" width="200" height="194" border="1"/></a><br />
                                <span>Select chart to enlarge </span>
                            <?php elseif (is_null($chart_image_url) and !is_null($chart_image_thumbnail_url) ): ?>
                               <img src="<?php echo $chart_image_thumbnail_url; ?>" width="200" height="194" border="1"/>
                            <?php elseif (!is_null($chart_image_url) and is_null($chart_image_thumbnail_url) ): ?>
                               <a href="<?php echo $chart_image_url; ?>" target="_new">
                               <img src="<?php echo $chart_image_url; ?>" width="200" height="194" border="1"/></a><br />
                               <span>Select chart to enlarge </span>
                            <?php endif ?>
                        </div>
                    </td></tr>
                    <tr><td>
                        <div align="center">
                            <?php if (!is_null($animal_image_url) and !is_null($animal_image_thumbnail_url) ): ?>
                               <p><a href="<?php echo $animal_image_url; ?>" target="_new">
                               <img src="<?php echo $animal_image_thumbnail_url; ?>" width="200" height="133" border="1"/><br></a>
                               <span class="style85">Select image to enlarge</span><br />
                               <span class="style85"><?php print get_field( "caption" ); ?></span></p>
                            <?php elseif (is_null($animal_image_url) and !is_null($animal_image_thumbnail_url) ): ?>
                               <p><img src="<?php echo $animal_image_thumbnail_url; ?>" width="200" height="133" border="1"/><br>
                               <span class="style85"><?php print get_field( "caption" ); ?></span></p>
                            <?php elseif (!is_null($animal_image_url) and is_null($animal_image_thumbnail_url) ): ?>
                               <p><a href="<?php echo $animal_image_url; ?>" target="_new">
                               <img src="<?php echo $animal_image_url; ?>" width="200" height="133" border="1"/><br></a>
                               <span class="style85">Select image to enlarge</span><br />
                               <span class="style85"><?php print get_field( "caption" ); ?></span></p>
                            <?php endif ?>
                        </div>
                    </td></tr>
                </table>
                </td></tr>
                </table>
                <h2> Narrative </h2>
				
                <?php the_content(); ?>        
                    
                <h2>Gear Investigation</h2>
                <table width="675" height="150" border="0" align="center">
                    <tr>
                      <td width="110" valign="top" scope="col"><div align="right">Gear type: </div></td>
                      <td width="264" valign="top" scope="col"><?php print get_field( "gear_type" ) ?></td>
                      <td width="124" valign="top" scope="col"><div align="right">Fishes:</div></td>
                      <td width="159" valign="top" scope="col"><?php print get_field( "fishes" ) ?></td>
                    </tr>
                    <tr>
                      <td valign="top"><div align="right" >Location of set: </div></td>
                      <td valign="top" class="style57"><?php print get_field( "location_of_set" ) ?></td>
                      <td valign="top"><div align="right" class="style87">Vessel homeport: </div></td>
                      <td valign="top"><?php print get_field( "vessel_homeport" ) ?></td>
                    </tr>
                    <tr>
                      <td valign="top"><div align="right">Gear lost/ missing: </div></td>
                      <td valign="top"><?php print get_field( "gear_lost_missing" ) ?></td>
                      <td valign="top"><div align="right">Last active: </div></td>
                      <td valign="top"><?php print get_field( "last_active" ) ?></td>
                    </tr>
                    <tr>
                      <td valign="top"><div align="right" >Maximum duration: </div></td>
                      <td valign="top"><?php print get_field( "maximum_duration" ) ?></td>
                      <td valign="top"><div align="right" >Distance (straight line):</div></td>
                      <td valign="top"><?php print get_field( "distance_straightline" ) ?></td>
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


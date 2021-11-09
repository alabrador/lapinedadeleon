<?php  
	get_header(); 

	while( have_posts() ){ the_post();
?>
<div class="gdlr-content">

	<?php 
		global $gdlr_sidebar, $theme_option, $gdlr_post_option, $hostel_option;

		if( empty($gdlr_post_option['sidebar']) || $gdlr_post_option['sidebar'] == 'default-sidebar' ){
			$gdlr_sidebar = array(
				'type'=>$theme_option['post-sidebar-template'],
				'left-sidebar'=>$theme_option['post-sidebar-left'], 
				'right-sidebar'=>$theme_option['post-sidebar-right']
			); 
		}else{
			$gdlr_sidebar = array(
				'type'=>$gdlr_post_option['sidebar'],
				'left-sidebar'=>$gdlr_post_option['left-sidebar'], 
				'right-sidebar'=>$gdlr_post_option['right-sidebar']
			); 				
		}$gdlr_sidebar = gdlr_get_sidebar_class($gdlr_sidebar);
	?>
	<div class="with-sidebar-wrapper">
		<div class="with-sidebar-container container gdlr-class-<?php echo $gdlr_sidebar['type']; ?>">
			<div class="with-sidebar-left <?php echo $gdlr_sidebar['outer']; ?> columns">
				<div class="with-sidebar-content <?php echo $gdlr_sidebar['center']; ?> columns">
					<div class="gdlr-item gdlr-item-start-content">
						<div id="room-<?php the_ID(); ?>" <?php post_class(); ?>>
							
						
							<div class="gdlr-room-main-content">
								<div class="gdlr-room-thumbnail gdlr-single-room-thumbnail">
								<?php 
									echo gdlr_get_room_thumbnail($gdlr_post_option, $hostel_option['room-thumbnail-size']); 
									echo gdlr_get_room_thumbnail_control($gdlr_post_option);							
								?>
								</div>
								<div class="gdlr-room-title-wrapper">
									<h3 class="gdlr-room-title"><?php echo get_the_title(); ?></h3>
									<?php echo gdlr_hostel_room_info($gdlr_post_option, array('price'), false); ?>
									<div class="clear"></div>
								</div>
								<?php 
									$info_style = empty($theme_option['hotel-single-info-style'])? 'classic-style': $theme_option['hotel-single-info-style'];
									echo gdlr_hostel_room_info($gdlr_post_option, array(), true, $info_style); 
								?>
								
								<div class="gdlr-room-content"><?php the_content(); ?></div>
							</div>
						</div><!-- #room -->
						<?php //  ?>
						
						<div class="clear"></div>	
					</div>
				</div>
				<?php get_sidebar('left'); ?>
				<div class="clear"></div>
			</div>
			<?php get_sidebar('right'); ?>
			<div class="clear"></div>
		</div>				
	</div>				

</div><!-- gdlr-content -->
<!--/*<?php echo gdlrs_get_reservation_bar(true); ?> booking-bar*/-->
<?php
	}
	
	get_footer(); 
?>
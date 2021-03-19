<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<section class="bg-grey hero-columns no-padding">
	<div class="wrapper single-thin-column">
		<div class="page-title-left big-padding-top big-padding-bottom">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
	<div class="page-title-image-right" style="background-image: url(<?php echo get_field('banner'); ?>); background-repeat: no-repeat; background-position: center top; background-size: cover;"></div>
</section>

<section class="no-padding bg-grey">
	<div class="wrapper">
		<div class="moving-blocks moving-blocks-big-text no-margin">
			<div class="moving-box-left moving-box-image">
				<?php 
				$boximage = get_field('boxes_image');
				if( !empty( $boximage ) ): ?>
				    <img src="<?php echo esc_url($boximage['url']); ?>" alt="<?php echo esc_attr($boximage['alt']); ?>" />
				<?php endif; ?>
			</div><div class="moving-box-right moving-box-text bg-white">
				<?php the_field('boxes_content'); ?>
			</div>
		</div>
	</div>
</section>

<section class="bg-grey no-padding">
	<div class="wrapper">
		<div class="inline-box">
			<h2><?php the_field('inline_header'); ?></h2> 
			<?php if( have_rows('inline_columns') ): ?>
				<div class="inline-columns">
					<?php while( have_rows('inline_columns') ): the_row(); 
						$title = get_sub_field('column_title');
						$note = get_sub_field('column_note');
						?><div class="inline-column">
							<h3><?php echo $title; ?></h3>
							<p><?php echo $note; ?></p>
						</div><?php endwhile; ?>
				</div>
			<?php endif; ?>
			<h2><?php the_field('inline_footer'); ?></h2>
		</div>
	</div>	
</section>

<section class="filtered-banner" style="background-image: url(<?php echo get_field('filtered_image'); ?>); background-repeat: no-repeat; background-position: center center; background-size: cover;">
	<div class="filtered-banner-boxes">
		<h3 class="filtered-title"><?php the_field('filtered_title'); ?></h3> // CHANGE TO THIS CLASS */

		<?php if( have_rows('boxes') ): ?>
			<div class="filtered-boxes">
				<?php while( have_rows('boxes') ): the_row(); 
					$box = get_sub_field('box_content');
					?><div class="filtered-box">
						<?php echo $box; ?>
					</div><?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="no-padding parallax-banner parallax-banner-475">
	<?php 
	$banner = get_field('banner_image');
	if( !empty( $banner ) ): ?>
	    <img src="<?php echo esc_url($banner['url']); ?>" alt="<?php echo esc_attr($banner['alt']); ?>" />
	<?php endif; ?>
</section>

<?php if( have_rows('drawers') ): ?>
	<section class="bg-grey">
		<div class="wrapper">
			<div class="drawer-titles">
				<?php while( have_rows('drawers') ): the_row(); $title = get_sub_field('drawer_title'); ?>
					<h2 class="drawer-title"><?php echo $title; ?></h2> // CHANGE THIS CLASS to "filtered-title"*/
				<?php endwhile; ?>
			</div>
			<div class="drawer">
				<?php while( have_rows('drawers') ): the_row(); $content = get_sub_field('drawer_content'); ?>
					<div class="drawer-box-text"><?php echo $content; ?></div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
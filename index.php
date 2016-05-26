<?php
/**
 * The main template file.
 *
 * @package Vue_from_Mars
 */

 ?><!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

 	<?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
	 <div id="page" class="site">
	 	<a class="skip-link screen-reader-text" href="#main"><?php esc_html( 'Skip to content' ); ?></a>

	 	<div id="content" class="site-content" style="display:none">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>

						 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		 					<header class="entry-header">
		 						<?php
		 							if ( is_single() ) {
		 								the_title( '<h1 class="entry-title">', '</h1>' );
		 							} else {
		 								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		 							}
		 						?>
		 					</header><!-- .entry-header -->

		 					<div class="entry-content">
		 						<?php the_content(); ?>
		 					</div><!-- .entry-content -->

		 				</article><!-- #post-## -->

					<?php	endwhile;

				endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- #content -->
	</div><!-- #page -->

   <div id="app"></div>
   <!-- <app></app> -->

<?php wp_footer(); ?>

</body>
</html>

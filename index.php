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
   <link href="https://fonts.googleapis.com/css?family=Economica:400,400italic,700italic,700|Playfair+Display:400,400italic,700,700italic" rel="stylesheet">

 	<?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
	 <div id="page" class="site">
	 	<a class="skip-link screen-reader-text" href="#main"><?php esc_html( 'Skip to content' ); ?></a>

	 	<div id="content" class="site-content" style="display:none">

      <?php
         if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) {
               echo '<h1>' . single_post_title( '', false ) . '</h1>';
            }

            while ( have_posts() ) : the_post();

               if ( is_singular() ) {
                  the_title( '<h1>', '</h1>' );
               } else {
                  the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
               }

               the_content();

            endwhile;

         endif;
      ?>

		</div><!-- #content -->

      <div id="app"></div><!-- #app -->
	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

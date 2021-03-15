<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-em
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			$precedant = 0;
			while ( have_posts() ) :
				the_post();
				$titre = get_the_title();
				$session = substr($titre, 4,1);
				$contenu = get_the_content();
				$resume = substr($contenu, 0, 200);
				$typeCours = get_field('type_de_cours');

			?>	
			<?php
				if ($session != $precedant){
					echo "<p>Session : " . $session . "</p>";
				}
				$precedant = $session;
			?>
			<p> <?php echo $typeCours. " - " . $session . " - " . $titre; ?> </p>
			<p> <?php echo $resume; ?> </p>
			<?php
			endwhile;

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

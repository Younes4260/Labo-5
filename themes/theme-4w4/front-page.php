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
			<section class="cours"></section>
			<?php
			/* Start the Loop */
			$precedant = 0;
			while ( have_posts() ) :
				the_post();
				$titre = get_the_title();
				// 582-1W1 Mise en page Web (75 heures)
				$sigle = substr($titre, 0, 7);
				$nbHeure =	substr($titre, -4,3);
				$titrePartiel = substr($titre,8,-6);
				$session = substr($titre, 4,1);
				// $contenu = get_the_content();
				//$resume = substr($contenu, 0, 200);
				$typeCours = get_field('type_de_cours');

			?>	
			<article>
				<p><?php echo $sigle . " - " . $typeCours ; ?></p>
				<a href="<?php echo get_permalink() ?>"><?php echo $titrePartie1; ?></a>
				<p>Session : <?php echo $session; ?></p>
			</article>
			<?php
			endwhile;

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

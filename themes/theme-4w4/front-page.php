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
	<section class="carrousel">
		<div>1</div>
		<div>2</div>
		<div>3</div>
	</section>
	<button id='un'>1</button>
	<button id='deux'>2</button>
	<button id='trois'>3</button>

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
			$precedant = "XXXXXX";
			while ( have_posts() ) :
				the_post();
				convertirTableau($tPropriété);
				

				if ($tPropriété['typeCours'] != $precedant): 
					if ("XXXXXX" != $precedant) : ?>
				</section>
				<?php endif ?>
				<h2><?php echo $tPropriété['typeCours'] ?></h2>
				<section> 
				<?php endif ?>
				<?php get_template_part( 'template-parts/content', 'cours-article' ); 
			    $precedant = $tPropriété['typeCours'];
			endwhile; ?>
			<article>
				<p><?php echo $tPropriété['sigle'] . " - " . $tPropriété['typeCours'] . " - " . $tPropriété['nbHeure']  ; ?></p>
				<a href="<?php echo get_permalink(); ?>"><?php echo $tPropriété['titrePartiel']; ?></a>
				<p>Session : <?php echo $tPropriété['session']; ?></p>
			</article>
			</section> <!-- fin section #cours -->
			<?php rewind_posts(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<h3>-<?php echo get_the_title(); ?></h3>
			<?php endwhile; ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriété)
{		
	/*
	$titre = get_the_title();
	// 582-1W1 Mise en page Web (75 heures)
	$sigle = substr($titre, 0, 7);
	$nbHeure =	substr($titre, -4,3);
	$titrePartiel = substr($titre,8,-6);
	$session = substr($titre, 4,1);
	// $contenu = get_the_content();
	//$resume = substr($contenu, 0, 200);
	$typeCours = get_field('type_de_cours');	
	*/	

	$tPropriété['titre'] = get_the_title();
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);	
	$tPropriété['nbHeure'] = substr($tPropriété['titre'], -4,3);	
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
	$tPropriété['session'] = substr($tPropriété['titre'], 4,1);
	$tPropriété['typeCours'] = get_field('type_de_cours');		
}
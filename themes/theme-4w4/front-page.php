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
	<main id ="primary" class="site-main">
	<?php $valeurrandom1 = rand(50,69);
			$valeurrandom2 = rand(50,69);
			$valeurrandom3 = rand(50,69);
			?>
		<section class="carrousel-2">
			<article class="slide__conteneur">
				<div class="slide">
				<img width="150" height="150" src="http://localhost/4w4/wp-content/uploads/2021/03/poop.jpg">
				<div class="slide__info"><a href="<?php echo get_permalink($valeurrandom1); ?>">
				<?php echo get_the_title($valeurrandom1);
				?></a>
				</div>
				</div>
				</article>
				<article class="slide__conteneur">
				<div class="slide">
				<img width="150" height="150" src="http://localhost/4w4/wp-content/uploads/2021/03/poop.jpg">
				<div class="slide__info"><a href="<?php echo get_permalink($valeurrandom2); ?>">
				<?php echo get_the_title($valeurrandom2);
				?></a>
				</div>
				</div>
				</article>
				<article class="slide__conteneur">
				<div class="slide">
				<img width="150" height="150" src="http://localhost/4w4/wp-content/uploads/2021/03/poop.jpg">
				<div class="slide__info"><a href="<?php echo get_permalink($valeurrandom3); ?>">
				<?php echo get_the_title($valeurrandom3);
				?></a>
				</div>
				</div>
				</article>
				</section>

	<div id = "lesboutons">
	<input type="radio" class="rad-carrousel" name="rad-carrousel">
	<input type="radio" class="rad-carrousel" name="rad-carrousel">
	<input type="radio" class="rad-carrousel" name="rad-carrousel">
	</div>

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
				<section class="<?php echo ($tPropriété['typeCours']=='Web'? 'class="caroussel-2"' :''); ?>">
				<?php endif ?>

				<?php if ($tPropriété['typeCours'] == "Web") :
					get_template_part( 'template-parts/content', 'cours-caroussel' ); 
				else : get_template_part( 'template-parts/content', 'cours-article' ); 
					get_template_part( 'template-parts/content', 'cours-article' ); 
				endif;	
			    $precedant = $tPropriété['typeCours'];
			endwhile; ?>
			<article>
				<p><?php echo $tPropriété['sigle'] . " - " . $tPropriété['typeCours'] . " - " . $tPropriété['nbHeure']  ; ?></p>
				<a href="<?php echo get_permalink(); ?>"><?php echo $tPropriété['titrePartiel']; ?></a>
				<p>Session : <?php echo $tPropriété['session']; ?></p>
			</article>
			</section> <!-- fin section #cours -->
			

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
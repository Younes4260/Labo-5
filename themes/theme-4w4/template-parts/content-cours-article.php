<?php
/**
 * Template part pour l'affichage des bloc de cours dans front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-em
 */
global $tPropriété;
?>

<article>
	<p><?php echo $tPropriété['sigle'] . " - " . $tPropriété['typeCours'] . " - " . $tPropriété['nbHeure']  ; ?></p>
	<a href="<?php echo get_permalink(); ?>"><?php echo $tPropriété['titrePartiel']; ?></a>
	<p>Session : <?php echo $tPropriété['session']; ?></p>
</article>


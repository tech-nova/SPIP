<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2006                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/presentation');

function exec_articles_tous_dist()
{
	global $aff_art, $sel_lang, $article, $enfant, $text_article;
	global $connect_id_auteur, $connect_statut, $spip_dir_lang, $spip_lang, $browser_layer;

	if (!is_array($aff_art)) $aff_art = array('prop','publie');

 	pipeline('exec_init',array('args'=>array('exec'=>'articles_tous'),'data'=>''));
	list($enfant, $first_couche, $last_couche) = arbo_articles_tous();
	debut_page(_T('titre_page_articles_tous'), "accueil", "tout-site");
	debut_gauche();

	if (($GLOBALS['meta']['multi_rubriques'] == 'oui' OR $GLOBALS['meta']['multi_articles'] == 'oui') AND $GLOBALS['meta']['gerer_trad'] == 'oui') 
		$langues = explode(',', $GLOBALS['meta']['langues_multilingue']);
	else	$langues = array();  

	$sel_lang[$spip_lang] = $spip_lang;

if ($connect_statut == "0minirezo") 
  $result = spip_query("SELECT id_article, titre, statut, id_rubrique, lang, id_trad, date_modif FROM spip_articles ORDER BY date DESC");
else 
  $result = spip_query("SELECT articles.id_article, articles.titre, articles.statut, articles.id_rubrique, articles.lang, articles.id_trad, articles.date_modif FROM spip_articles AS articles, spip_auteurs_articles AS lien WHERE (articles.statut = 'publie' OR articles.statut = 'prop' OR (articles.statut = 'prepa' AND articles.id_article = lien.id_article AND lien.id_auteur = $connect_id_auteur)) GROUP BY id_article ORDER BY articles.date DESC");

while($row = spip_fetch_array($result)) {
	$id_rubrique=$row['id_rubrique'];
	$id_article = $row['id_article'];
	$titre = typo($row['titre']);
	$statut = $row['statut'];
	$lang = $row['lang'];
	$id_trad = $row['id_trad'];
	$date_modif = $row['date_modif'];
	
	$aff_statut[$statut] = true; // signale qu'il existe de tels articles
	$text_article[$id_article]["titre"] = $titre;
	$text_article[$id_article]["statut"] = $statut;
	$text_article[$id_article]["lang"] = $lang;
	$text_article[$id_article]["id_trad"] = $id_trad;
	$text_article[$id_article]["date_modif"] = $date_modif;
	$GLOBALS['langues_utilisees'][$lang] = true;

	if (count($langues) > 1) {
		while (list(, $l) = each ($langues)) {
			if (in_array($l, $sel_lang)) $text_article[$id_article]["trad"]["$l"] =  "<span class='creer'>$l</span>";
		}
	}
		
	if ($id_trad == $id_article OR $id_trad == 0) {
		$text_article[$id_article]["trad"]["$lang"] = "<span class='lang_base'$spip_dir_lang>$lang</span>";
	}
		
	if (in_array($statut, $aff_art))
		$article[$id_rubrique][] = $id_article;
 }

if ($text_article)
	foreach ($text_article as $id_article => $v) {
		$id_trad = $v["id_trad"];
		$lang = $v['lang'];
				
			
		if ($id_trad > 0 AND $id_trad != $id_article AND in_array($lang, $sel_lang)) {
			if ($text_article[$id_trad]["date_modif"] < $v["date_modif"]) 
			  $c = 'foncee';
			else
			  $c = 'claire';
			$text_article[$id_trad]["trad"][$lang] =
 "<a class='$c' href='" . generer_url_ecrire("articles","id_article=$id_article") . "'>$lang</a>";
		}
	}

formulaire_affiche_tous($aff_art, $aff_statut, $sel_lang);

	echo pipeline('affiche_gauche',array('args'=>array('exec'=>'articles_tous'),'data'=>''));
	creer_colonne_droite();
	echo pipeline('affiche_droite',array('args'=>array('exec'=>'articles_tous'),'data'=>''));
debut_droite();

if ($enfant AND $browser_layer)
	couche_formulaire_tous($first_couche, $last_couche);

afficher_rubriques_filles(0);


fin_page();
}

// Voir inc_layer pour les 2 globales utilisees

function arbo_articles_tous()
{
	global $numero_block, $compteur_block;

	$enfant = array();
	$result = spip_query("SELECT id_rubrique, titre, id_parent FROM spip_rubriques ORDER BY 0+titre,titre");
	$first_couche = 0;
	while ($row = spip_fetch_array($result)) {
		$id_rubrique = $row['id_rubrique'];
		$id_parent = $row['id_parent'];
		$enfant[$id_parent][$id_rubrique] = typo($row['titre']);
		$nom_block = "rubrique$id_rubrique";
		if (!isset($numero_block[$nom_block])){
			$compteur_block++;
			$numero_block[$nom_block] = $compteur_block;

			if (!$first_couche) $first_couche = $compteur_block;
		}
	}
	$last_couche = $first_couche ? $compteur_block : 0;
	return array($enfant, $first_couche, $last_couche);
}


//  checkbox avec image

function http_label_img($statut, $etat, $var, $img, $texte) {
  return "<label for='$statut'>". 
    boutonne('checkbox',
	     $var . '[]',
	     $statut,
	     (($etat !== false) ? ' checked="checked"' : '') .
	     "id='$statut'") .
    "&nbsp;" .
    http_img_pack($img, $texte, "width='8' height='9' border='0'", $texte) .
    " " .
    $texte .
    "</label><br />";
}

function formulaire_affiche_tous($aff_art, $aff_statut,$sel_lang)
{
global $spip_lang_right;
echo generer_url_post_ecrire("articles_tous"), 
	"<input type='hidden' name='aff_art[]' value='x'>";

debut_boite_info();

 echo "<b>",_T('titre_cadre_afficher_article'),"&nbsp;:</b><br />";

if ($aff_statut['prepa'])
	echo http_label_img('prepa',
			    in_array('prepa', $aff_art),
			    'aff_art',
			    'puce-blanche-breve.gif',
			    _T('texte_statut_en_cours_redaction'));

if ($aff_statut['prop'])
	echo http_label_img('prop',
			    in_array('prop', $aff_art),
			    'aff_art',
			    'puce-orange-breve.gif',
			    _T('texte_statut_attente_validation'));
	
if ($aff_statut['publie'])
	echo http_label_img('publie',
			    in_array('publie', $aff_art),
			    'aff_art',
			    'puce-verte-breve.gif',
			    _T('texte_statut_publies'));

if ($aff_statut['refuse'])
	echo http_label_img('refuse',
			    in_array('refuse', $aff_art),
			    'aff_art',
			    'puce-rouge-breve.gif',
			    _T('texte_statut_refuses'));

if ($aff_statut['poubelle'])
	echo http_label_img('poubelle',
			    in_array('poubelle', $aff_art),
			    'aff_art',
			    'puce-poubelle-breve.gif',
			    _T('texte_statut_poubelle'));

echo "<div align='$spip_lang_right'><INPUT TYPE='submit' CLASS='fondo' VALUE='"._T('bouton_changer')."'></div>";


// GERER LE MULTILINGUISME
if (($GLOBALS['meta']['multi_rubriques'] == 'oui' OR $GLOBALS['meta']['multi_articles'] == 'oui') AND $GLOBALS['meta']['gerer_trad'] == 'oui') {

	// bloc legende
	$lf = $GLOBALS['meta']['langue_site'];
	echo "<hr /><div class='verdana2'>";
	echo _T('info_tout_site6');
	echo "<div><span class='lang_base'>$lf</span> ". _T('info_tout_site5') ." </div>";
	echo "<div><span class='creer'>$lf</span> ". _T('info_tout_site2') ." </div>";
	echo "<div><a class='claire'>$lf</a> ". _T('info_tout_site3'). " </div>";
	echo "<div><a class='foncee'>$lf</a> ". _T('info_tout_site4'). " </div>";
	echo "</div>\n";

	// bloc choix de langue
	$langues = explode(',', $GLOBALS['meta']['langues_multilingue']);
	if (count($langues) > 1) {
		sort($langues);
		echo "<br /><div class='verdana2'><b>"._T('titre_cadre_afficher_traductions')."</b><br />";
		echo "<select style='width:100%' NAME='sel_lang[]' size='".count($langues)."' multiple='multiple'>";
		while (list(, $l) = each ($langues)) {
		  echo "<option value='$l'",
		    (in_array($l,$sel_lang) ? " selected='selected'" : ""),
		    ">",
		    traduire_nom_langue($l),
		    "</option>\n"; 
		}
		echo "</select></div>\n";

		echo "<div align='$spip_lang_right'><INPUT TYPE='submit' NAME='Changer' CLASS='fondo' VALUE='"._T('bouton_changer')."'></div>";
	}

}

fin_boite_info();
echo "</form>";
}

function couche_formulaire_tous($first_couche, $last_couche)
{
	global $spip_lang_rtl;

	echo "<div>&nbsp;</div>";
	echo "<b class='verdana3'>";
	echo "<a href=\"javascript:";
	echo "manipuler_couches('ouvrir','$spip_lang_rtl',$first_couche,$last_couche, '" . _DIR_IMG_PACK . "')\">";
	echo _T('lien_tout_deplier');
	echo "</a>";
	echo "</b>";
	echo " | ";
	echo "<b class='verdana3'>";
	echo "<a href=\"javascript:";
	echo "manipuler_couches('fermer','$spip_lang_rtl',$first_couche,$last_couche, '" . _DIR_IMG_PACK . "')\">";
	echo _T('lien_tout_replier');
	echo "</a>";
	echo "</b>";
	echo "<div>&nbsp;</div>";
}

function afficher_rubriques_filles($id_parent) {
	global $enfant, $article;
	global $spip_lang_left, $spip_lang_right, $spip_lang;
	global $couleur_claire;
	static $decal = 0;

	$decal = $decal + 1;
	$droite = 500 - (10 * $decal);
	
	if ($enfant[$id_parent]) {
	  while (list($id_rubrique, $titre) = each($enfant[$id_parent]) ) {
			
			if ($id_parent == 0) {
				$icone = "secteur-24.gif";
				$bgcolor = " background-color: $couleur_claire;";
			}
			else {
				$icone = "rubrique-24.gif";
				$bgcolor = "";
			}
			
			echo "<div style='padding-top: 5px; padding-bottom: 5px; padding-$spip_lang_left: 28px; background: url(" . http_wrapper($icone) . ") $spip_lang_left center no-repeat;$bgcolor'>";
			
			$lesarticles = isset($article[$id_rubrique]) ? $article[$id_rubrique] : '';
			$lesenfants = isset($enfant[$id_rubrique]) ? $enfant[$id_rubrique] : '';
			if ($lesenfants OR $lesarticles) echo bouton_block_invisible("rubrique$id_rubrique");
			
			echo "<b class='verdana2'><a href='",
			  generer_url_ecrire("naviguer","id_rubrique=$id_rubrique"),
			  "'>",
			  $titre,
			  "</b></a></div>\n";

			if ($lesenfants OR $lesarticles) {
				echo debut_block_invisible("rubrique$id_rubrique");
				echo "<div class='plan-rubrique'>";
				if ($lesarticles) {
					echo "<div class='plan-articles'>";
					article_tous_rubrique($lesarticles, $id_rubrique);
					echo "</div>";
				}

				afficher_rubriques_filles($id_rubrique);	
				echo "</div>";
				echo fin_block();
			}
			
		if ($id_parent == 0) echo "<div>&nbsp;</div>";
	  }
	}
	$decal = $decal-1;
	
}

function article_tous_rubrique($tous, $id_rubrique) 
{
	global $text_article;

	$flag_trad = (($GLOBALS['meta']['multi_rubriques'] == 'oui' 
			OR $GLOBALS['meta']['multi_articles'] == 'oui') 
		AND $GLOBALS['meta']['gerer_trad'] == 'oui');

	while(list(,$zarticle) = each($tous) ) {
		$attarticle = &$text_article[$zarticle];
		$zelang = $attarticle["lang"];
		unset ($attarticle["trad"][$zelang]);
		if ($attarticle["id_trad"] == 0 OR $attarticle["id_trad"] == $zarticle) {
			$auteurs = trouve_auteurs_articles($zarticle);
			/* pas loin du but, mais mise en page horrible
$statuts= puce_statut_article($zarticle, $attarticle['statut'], $id_rubrique);
			*/
			if (count($attarticle["trad"]) > 0) {
				ksort($attarticle["trad"]);
				$traductions = join ($attarticle["trad"], "");
			echo "<span class='trad_float'>", $traductions, "</span>";
			}
			echo "<a   class='",
			  $attarticle["statut"],
			  "' href='", 
			  generer_url_ecrire("articles","id_article=$zarticle"),
			  "'",
			  ($auteurs ? (' title="' . htmlspecialchars($auteurs). '"') :''),
			  ">",
			  ($flag_trad ? "<span class='lang_base'>$zelang</span> " : ''),
			  "<span>",
			  $attarticle["titre"],
			  "</span></a>";
		}
	}
}

function trouve_auteurs_articles($id_article)
{
	$result = spip_query("SELECT nom FROM spip_auteurs AS auteurs, spip_auteurs_articles AS lien WHERE auteurs.id_auteur=lien.id_auteur AND lien.id_article=$id_article ORDER BY auteurs.nom");
	$res = array();
	while ($row = spip_fetch_array($result))  $res[] = $row["nom"];
	return join(", ", $res);
}
?>

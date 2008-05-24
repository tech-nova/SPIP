<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2008                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/presentation');
charger_generer_url();
include_spip('inc/forum');


// http://doc.spip.org/@forum_parent
function forum_parent($id_forum) {
	$row=sql_fetsel("*", "spip_forum", "id_forum=$id_forum AND statut != 'redac'");
	if (!$row) return '';
	$id_forum=$row['id_forum'];
	$forum_id_parent=$row['id_parent'];
	$forum_id_rubrique=$row['id_rubrique'];
	$forum_id_article=$row['id_article'];
	$forum_id_breve=$row['id_breve'];
	$forum_id_syndic=$row['id_syndic'];
	$forum_stat=$row['statut'];

	if ($forum_id_article > 0) {
	  $row=sql_fetsel("id_article, titre, statut", "spip_articles", "id_article=$forum_id_article");
	  $id_article = $row['id_article'];
	  $titre = $row['titre'];
	  $statut = $row['statut'];
	  if ($forum_stat == "prive" OR $forum_stat == "privoff") {
	    return array('pref' => _T('item_reponse_article'),
			 'url' => generer_url_ecrire("articles","id_article=$id_article"),
			 'type' => 'id_article',
			 'valeur' => $id_article,
			 'titre' => $titre);
	  } else {
	    $ancre = "forum$id_forum" ;
	    return array('pref' =>  _T('lien_reponse_article'),
			 'url' => generer_url_article($id_article,'',$ancre),
			 'type' => 'id_article',
			 'valeur' => $id_article,
			 'titre' => $titre,
			 'avant' => "<a href='" . generer_url_ecrire("articles_forum","id_article=$id_article") . "'><span style='color: red'>"._T('lien_forum_public'). "</span></a><br />");
	  }
	}
	else if ($forum_id_rubrique > 0) {
	  $row = sql_fetsel("*", "spip_rubriques", "id_rubrique=$forum_id_rubrique");
	  $id_rubrique = $row['id_rubrique'];
	  $titre = $row['titre'];
	  return array('pref' => _T('lien_reponse_rubrique'),
		       'url' => generer_url_rubrique($id_rubrique),
		       'type' => 'id_rubrique',
		       'valeur' => $id_rubrique,
		       'titre' => $titre);
	}
	else if ($forum_id_syndic > 0) {
	  $row = sql_fetsel("*", "spip_syndic", "id_syndic=$forum_id_syndic");
	  $id_syndic = $row['id_syndic'];
	  $titre = $row['nom_site'];
	  $statut = $row['statut'];
	  return array('pref' => _T('lien_reponse_site_reference'),
		       'url' => generer_url_ecrire("sites","id_syndic=$id_syndic"),
		       'type' => 'id_syndic',
		       'valeur' => $id_syndic,
		       'titre' => $titre);
	}
	else if ($forum_id_breve > 0) {
	  $row = sql_fetsel("*", "spip_breves", "id_breve=$forum_id_breve");
	  $id_breve = $row['id_breve'];
	  $date_heure = $row['date_heure'];
	  $titre = $row['titre'];
	  if ($forum_stat == "prive") {
	    return array('pref' => _T('lien_reponse_breve'),
			 'url' => generer_url_ecrire("breves_voir","id_breve=$id_breve"),
			 'type' => 'id_breve',
			 'valeur' => $id_breve,
			 'titre' => $titre);
	  } else {
	    return array('pref' => _T('lien_reponse_breve_2'),
			 'url' => generer_url_breve($id_breve),
			 'type' => 'id_breve',
			 'valeur' => $id_breve,
			 'titre' => $titre);
	  }
	}
	else if ($forum_stat == "privadm") {
	  $retour = forum_parent($forum_id_parent);
	  if ($retour) return $retour;
	  else return array('pref' => _T('info_message'),
			    'url' => generer_url_ecrire('forum_admin'),
			    'titre' => _T('info_forum_administrateur'));
	}
	else {
	  $retour = forum_parent($forum_id_parent);
	  if ($retour) return $retour;
	  else return array('pref' => _T('info_message'),
			    'url' => generer_url_ecrire('forum'),
			    'titre' => _T('info_forum_interne'));
	}
}

// http://doc.spip.org/@controle_un_forum
function controle_un_forum($row) {

	$id_forum = $row['id_forum'];
	$forum_id_parent = $row['id_parent'];
	$forum_id_rubrique = $row['id_rubrique'];
	$forum_id_article = $row['id_article'];
	$forum_id_breve = $row['id_breve'];
	$forum_date_heure = $row['date_heure'];
	$forum_titre = echapper_tags($row['titre']);
	$forum_texte = $row['texte'];
	$forum_auteur = echapper_tags(extraire_multi($row['auteur']));
	$forum_email_auteur = echapper_tags($row['email_auteur']);
	$forum_nom_site = echapper_tags($row['nom_site']);
	$forum_url_site = echapper_tags($row['url_site']);
	$forum_stat = $row['statut'];
	$forum_ip = $row['ip'];
	$forum_id_auteur = $row["id_auteur"];

	$r = forum_parent($id_forum);
	$avant = $r['avant'];
	$url = $r['url'];
	$titre = $r['titre'];
	$type = $r['type'];
	$valeur = $r['valeur'];
	$pref = $r['pref'];
	
	$cadre = "";
	
	$controle = "\n<br /><br /><a id='id$id_forum'></a>";
	
	$controle .= debut_cadre_thread_forum("", true, "", typo($forum_titre));

	switch($forum_stat) {
		case 'off':
		case 'privoff':
			$controle .= "<div style='border: 2px #ff0000 dashed;'>";
			break;
		case 'prop':
			$controle .= "<div style='border: 2px yellow solid; background-color: white;'>";
			break;
		case 'spam':
			$controle .= "<div style='border: 2px black dotted;'>";
			break;
		default:
			$controle .= "<div>";
			break;
	}

	$controle .= "<table width='100%' cellpadding='0' cellspacing='0' border='0'>\n<tr><td style='width: 100%' valign='top'><table width='100%' cellpadding='5' cellspacing='0'>\n<tr><td class='serif'><span class='arial2'>" .
	  date_interface($forum_date_heure) .
	  "</span>";
	if ($forum_email_auteur) {
		if (email_valide($forum_email_auteur))
			$forum_email_auteur = "<a href='mailto:"
			.htmlspecialchars($forum_email_auteur)
			."?subject=".rawurlencode($forum_titre)."'>".$forum_email_auteur
			."</a>";
		$forum_auteur .= " &mdash; $forum_email_auteur";
	}
	$controle .= safehtml("<span class='arial2'> / <b>$forum_auteur</b></span>");

	$controle .= boutons_controle_forum($id_forum, $forum_stat, $forum_id_auteur, "$type=$valeur", $forum_ip);

	$suite = "\n<br />$avant<b>$pref
	<a href='$url'>$titre</a></b>"  
	. "<div style='overflow:hidden'>".justifier(propre($forum_texte))."</div>";

	if (strlen($forum_url_site) > 10 AND strlen($forum_nom_site) > 3)
		$suite .= "\n<div style='text-align: left' class='serif'><b><a href='$forum_url_site'>$forum_nom_site</a></b></div>";

	$controle .= safehtml(lignes_longues($suite));

	if ($GLOBALS['meta']["mots_cles_forums"] == "oui") {
	  $result_mots = sql_select("*", "spip_mots AS mots, spip_mots_forum AS lien", "lien.id_forum = '$id_forum' AND lien.id_mot = mots.id_mot");


		while ($row_mots = sql_fetch($result_mots)) {
			$titre_mot = propre($row_mots['titre']);
			$type_mot = propre('<b>' . $row_mots['type'] .' :</b>');
			$controle .= "\n$type_mot $titre_mot";
		}
	}

	$controle .= "</td></tr></table>";
	$controle .= "</td></tr></table>\n";

	$controle .= "</div>".fin_cadre_thread_forum(true);
	return $controle;
}

//
// Debut de la page de controle
//

// http://doc.spip.org/@exec_controle_forum_dist
function exec_controle_forum_dist()
{
  exec_controle_forum_args(intval(_request('id_rubrique')),
			   _request('type'),
			   intval(_request('debut')),
			   intval(_request('pas')),
			   _request('recherche'));
}

// http://doc.spip.org/@exec_controle_forum_args
function exec_controle_forum_args($id_rubrique,	$type,	$debut,	$pas, $recherche)
{
	if (!autoriser('publierdans','rubrique',$id_rubrique)) {
		include_spip('inc/minipres');
		echo minipres();
	} else {

	if (!$pas) $pas = 20;	// nb de forums affiches par page
	if (!preg_match('/^\w+$/', $type)) $type = 'public';
	$formulaire_recherche = formulaire_recherche("controle_forum","<input type='hidden' name='type' value='$type' />");

	list($from,$where)=critere_statut_controle_forum($type, $id_rubrique, $recherche);

	// Si un id_controle_forum est demande, on adapte le debut
	if ($debut_id_forum = intval(_request('debut_id_forum'))
	AND (NULL !== ($d = sql_getfetsel('date_heure', 'spip_forum', "id_forum=$debut_id_forum")))) {
	  $debut = sql_countsel($from, $where . (" AND F.date_heure > '$d'"));
	}

	$enplus = 200;	// intervalle affiche autour du debut
	$limitdeb = ($debut > $enplus) ? $debut-$enplus : 0;
	$limitnb = $debut + $enplus - $limitdeb;
	$args =  (!$id_rubrique ? "" : "id_rubrique=$id_rubrique&") . 'type=';
	if ($recherche)
		$args = 'recherche='.rawurlencode($recherche).'&'.$args;

	$query = sql_select("F.id_forum, F.id_parent, F.id_rubrique, F.id_article, F.id_breve, F.date_heure, F.titre, F.texte, F.auteur, F.email_auteur, F.nom_site, F.url_site, F.statut, F.ip, F.id_auteur", $from,  $where,'', "F.date_heure DESC", "$limitdeb, $limitnb");
  
	$ancre = 'controle_forum';
	$n = sql_count($query);
	$mess = affiche_navigation_forum('controle_forum', $args . $type, $debut, $pas, $ancre, $n, $enplus)
	. affiche_tranche_forum($debut, $limitdeb, $pas, $query);

	if (_AJAX) {
		ajax_retour($mess);
	} else {

		pipeline('exec_init',array('args'=>array('exec'=>'controle_forum', 'type'=>$type),'data'=>''));


		$commencer_page = charger_fonction('commencer_page', 'inc');
		echo $commencer_page(_T('titre_page_forum_suivi'), "forum", "forum-controle");

		echo "<br /><br /><br />";
		echo gros_titre(_T('titre_forum_suivi'),'',false);

		echo debut_onglet();
		echo onglet(_T('onglet_messages_publics'), generer_url_ecrire('controle_forum', $args . "public"), "public", $type=='public', "forum-public-24.gif");
		echo onglet(_T('onglet_messages_internes'), generer_url_ecrire('controle_forum', $args . "interne"), "interne", $type=='interne', "forum-interne-24.gif");

		list($from,$where) = critere_statut_controle_forum('vide', $id_rubrique);
		$n = sql_countsel($from, $where,'','', 1);
		if ($n) echo onglet(_T('onglet_messages_vide'), generer_url_ecrire('controle_forum', $args . "vide"), "vide", $type=='vide');

		list($from,$where) = critere_statut_controle_forum('prop', $id_rubrique);
		$f = sql_countsel($from, $where, "", "", 1);
		if ($f)
			echo onglet(_T('texte_statut_attente_validation'), generer_url_ecrire('controle_forum', $args . "prop"), "prop", $type=='prop');

		echo fin_onglet();

		echo debut_gauche('', true);
		echo debut_boite_info(true);
		echo "<span class='verdana1 spip_small'>", _T('info_gauche_suivi_forum_2'), aide("suiviforum"), "</span>";

		// Afficher le lien RSS

		echo "<div style='text-align: "
			. $GLOBALS['spip_lang_right']
			. ";'>"
			. bouton_spip_rss('forums', array('page' => $type))
			. "</div>";

		echo fin_boite_info(true);
			
		echo pipeline('affiche_gauche',array('args'=>array('exec'=>'controle_forum', 'type'=>$type),'data'=>''));
		echo creer_colonne_droite('', true);
		echo pipeline('affiche_droite',array('args'=>array('exec'=>'controle_forum', 'type'=>$type),'data'=>''));
			
			
		echo debut_droite('', true);
		echo pipeline('affiche_milieu',array('args'=>array('exec'=>'controle_forum', 'type'=>$type),'data'=>''));

		echo $formulaire_recherche . "<br class='nettoyeur' />";

		echo "<div id='$ancre' class='serif2'>$mess</div>";
		echo fin_gauche(), fin_page();
	}
	}
}

// http://doc.spip.org/@affiche_tranche_forum
function affiche_tranche_forum($debut, $i, $pas, $query)
{

  $res = '';
  while ($row = sql_fetch($query)) {
	if (($i>=$debut) AND ($i<($debut + $pas)))
		$res .= controle_un_forum($row);
	$i ++;
  }
  return $res;
}
?>

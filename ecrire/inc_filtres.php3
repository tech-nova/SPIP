<?php

//
// Ce fichier ne sera execute qu'une fois
if (defined("_ECRIRE_INC_FILTRES")) return;
define("_ECRIRE_INC_FILTRES", "1");


// Echappement des entites HTML avec correction des entites "brutes"
// (generees par les butineurs lorsqu'on rentre des caracteres n'appartenant
// pas au charset de la page [iso-8859-1 par defaut])
function corriger_entites_html($texte) {
	return ereg_replace('&amp;(#[0-9]+;)', '&\1', $texte);
}
// idem mais corriger aussi les &amp;eacute; en &eacute; (pour backend)
function corriger_toutes_entites_html($texte) {
	return eregi_replace('&amp;(#?[a-z0-9]+;)', '&\1', $texte);
}

function entites_html($texte) {
	return corriger_entites_html(htmlspecialchars($texte));
}

// Transformer les &eacute; dans le charset local
function filtrer_entites($texte) {
	include_ecrire('inc_charsets.php3');
	// filtrer
	$texte = html2unicode($texte);
	// remettre le tout dans le charset cible
	return unicode2charset($texte);
}

// Tout mettre en entites pour l'export backend (sauf iso-8859-1)
function entites_unicode($texte) {
	include_ecrire('inc_charsets.php3');
	return charset2unicode($texte);
}

// Nettoyer les backend
function texte_backend($texte) {
	// supprimer tags et sauts de ligne
	//$texte = str_replace("\n"," ",textebrut($texte));

	// " -> &quot; et tout ce genre de choses
	$texte = entites_html($texte);
	$texte = str_replace("&amp;", "&", $texte);
	$texte = str_replace("&nbsp;", " ", $texte);

	// verifier le charset
	$texte = entites_unicode($texte);

	// nettoyer l'apostrophe curly qui semble poser probleme a certains rss-readers
	$texte = str_replace("&#8217;","'",$texte);

	return $texte;
}

// Enleve le numero des titres numerotes ("1. Titre" -> "Titre")
function supprimer_numero($texte) {
	$texte = ereg_replace("^[[:space:]]*[0-9]+[.)".chr(176)."][[:space:]]+", "", $texte);
	return $texte;
}

// Suppression basique et brutale de tous les <...>
function supprimer_tags($texte, $rempl = "") {
	// super gavant : la regexp ci-dessous plante sous php3, genre boucle infinie !
	// $texte = ereg_replace("<([^>\"']*|\"[^\"]*\"|'[^']*')*>", $rempl, $texte);
	$texte = ereg_replace("<[^>]*>", $rempl, $texte);
	return $texte;
}

// Convertit les <...> en la version lisible en HTML
function echapper_tags($texte, $rempl = "") {
	$texte = ereg_replace("<([^>]*)>", "&lt;\\1&gt;", $texte);
	return $texte;
}

// Convertit un texte HTML en texte brut
function textebrut($texte) {
	$texte = ereg_replace("[\n\r]+", " ", $texte);
	$texte = eregi_replace("<(p|br)([[:space:]][^>]*)?".">", "\n\n", $texte);
	$texte = ereg_replace("^\n+", "", $texte);
	$texte = ereg_replace("\n+$", "", $texte);
	$texte = ereg_replace("\n +", "\n", $texte);
	$texte = supprimer_tags($texte);
	$texte = ereg_replace("(&nbsp;| )+", " ", $texte);
	// nettoyer l'apostrophe curly qui pose probleme a certains rss-readers, lecteurs de mail...
	$texte = str_replace("&#8217;","'",$texte);
	return $texte;
}

// Remplace les liens SPIP en liens ouvrant dans une nouvelle fenetre (target=blank)
function liens_ouvrants ($texte) {
	return ereg_replace("<a ([^>]*https?://[^>]*class=\"spip_(out|url)\")>",
		"<a \\1 target=\"_blank\">", $texte);
}

// Corrige les caracteres degoutants utilises par les Windozeries
function corriger_caracteres($texte) {
	static $trans;
	if (!$trans) {
		// 145,146,180 = simple quote ; 147,148 = double quote ; 150,151 = tiret long
		$trans['iso-8859-1'] = array(
			chr(146) => "'",
			chr(180) => "'",
			chr(147) => '&#8220;',
			chr(148) => '&#8221;',
			chr(150) => '-',
			chr(151) => '-',
			chr(133) => '...'
		);
		$trans['utf-8'] = array(
			chr(194).chr(146) => "'",
			chr(194).chr(180) => "'",
			chr(194).chr(147) => '&#8220;',
			chr(194).chr(148) => '&#8221;',
			chr(194).chr(150) => '-',
			chr(194).chr(151) => '-',
			chr(194).chr(133) => '...'
		);
	}
	$charset = lire_meta('charset');
	if (!$trans[$charset]) return $texte;
	if ($GLOBALS['flag_strtr2']) return strtr($texte, $trans[$charset]);
	reset($trans[$charset]);
	while (list($from, $to) = each($trans[$charset])) 
		$texte = str_replace($from, $to, $texte);
	return $texte;
}

// Transformer les sauts de paragraphe en simples passages a la ligne
function PtoBR($texte){
	$texte = eregi_replace("</p>", "\n", $texte);
	$texte = eregi_replace("<p([[:space:]][^>]*)?".">", "<br />", $texte);
	$texte = ereg_replace("^[[:space:]]*<br />", "", $texte);
	return $texte;
}

// Majuscules y compris accents, en HTML
function majuscules($texte) {
	if (lire_meta('charset') != 'iso-8859-1')
		return "<span style='text-transform: uppercase'>$texte</span>";

	$suite = htmlentities($texte);
	$suite = ereg_replace('&amp;', '&', $suite);
	$suite = ereg_replace('&lt;', '<', $suite);
	$suite = ereg_replace('&gt;', '>', $suite);
	$texte = '';
	if (ereg('^(.*)&([A-Za-z])([a-zA-Z]*);(.*)$', $suite, $regs)) {
		$texte .= majuscules($regs[1]); // quelle horrible recursion
		$suite = $regs[4];
		$carspe = $regs[2];
		$accent = $regs[3];
		if (ereg('^(acute|grave|circ|uml|cedil|slash|caron|ring|tilde|elig)$', $accent))
			$carspe = strtoupper($carspe);
		if ($accent == 'elig') $accent = 'Elig';
		$texte .= '&'.$carspe.$accent.';';
	}
	$texte .= strtoupper($suite);
	return $texte;
}

// "127.4 ko" ou "3.1 Mo"
function taille_en_octets ($taille) {
	if ($taille < 1024) {$taille = _T('taille_octets', array('taille' => $taille));}
	else if ($taille < 1024*1024) {
		$taille = _T('taille_ko', array('taille' => ((floor($taille / 102.4))/10)));
	} else {
		$taille = _T('taille_mo', array('taille' => ((floor(($taille / 1024) / 102.4))/10)));
	}
	return $taille;
}


// Transforme n'importe quel champ en une chaine utilisable
// en PHP ou Javascript en toute securite
// < ? php $x = '[(#TEXTE|texte_script)]'; ? >
function texte_script($texte) {
	$texte = str_replace('\\', '\\\\', $texte);
	$texte = str_replace('\'', '\\\'', $texte);
	return $texte;
}


// Rend une chaine utilisable sans dommage comme attribut HTML
function attribut_html($texte) {
	$texte = ereg_replace('"', '&quot;', supprimer_tags($texte));
	return $texte;
}

// Vider les url nulles comme 'http://' ou 'mailto:'
function vider_url($url) {
	if (eregi("^(http:?/?/?|mailto:?)$", trim($url)))
		return false;
	else
		return $url;
}

// Extraire une date de n'importe quel champ (a completer...)
function extraire_date($texte) {
	// format = 2001-08
	if (ereg("([1-2][0-9]{3})[^0-9]*(0?[1-9]|1[0-2])",$texte,$regs))
		return $regs[1]."-".$regs[2]."01";
}

// Maquiller une adresse e-mail
function antispam($texte) {
	include_ecrire ("inc_acces.php3");
	$masque = creer_pass_aleatoire(3);
	return ereg_replace("@", " $masque ", $texte);
}

// |sinon{rien} : affiche "rien" si la chaine est vide, affiche la chaine si non vide
function sinon ($texte, $sinon='') {
	if ($texte)
		return $texte;
	else
		return $sinon;
}


//
// Date, heure, saisons
//

function normaliser_date($date) {
	if ($date) {
		$date = vider_date($date);
		if (ereg("^[0-9]{8,10}$", $date))
			$date = date("Y-m-d H:i:s", $date);
		if (ereg("^([12][0-9]{3})([-/]00)?( [-0-9:]+)?$", $date, $regs))
			$date = $regs[1]."-01-01".$regs[3];
		else if (ereg("^([12][0-9]{3}[-/][01]?[0-9])([-/]00)?( [-0-9:]+)?$", $date, $regs))
			$date = ereg_replace("/","-",$regs[1])."-01".$regs[3];
		else if ($GLOBALS['flag_strtotime']) {
			$date = date("Y-m-d H:i:s", strtotime($date));
		}
		else $date = ereg_replace('[^-0-9/: ]', '', $date);
	}
	return $date;
}

function vider_date($letexte) {
	if (ereg("^0000-00-00", $letexte)) return;
	if (ereg("^1970-01-01", $date)) return;	// eviter le bug GMT-1
	return $letexte;
}

function recup_heure($numdate){
	if (!$numdate) return '';

	if (ereg('([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})', $numdate, $regs)) {
		$heures = $regs[1];
		$minutes = $regs[2];
		$secondes = $regs[3];
	}
	return array($heures, $minutes, $secondes);
}

function heures($numdate) {
	$date_array = recup_heure($numdate);
	if ($date_array)
		list($heures, $minutes, $secondes) = $date_array;
	return $heures;
}

function minutes($numdate) {
	$date_array = recup_heure($numdate);
	if ($date_array)
		list($heures, $minutes, $secondes) = $date_array;
	return $minutes;
}

function secondes($numdate) {
	$date_array = recup_heure($numdate);
	if ($date_array)
		list($heures,$minutes,$secondes) = $date_array;
	return $secondes;
}

function heures_minutes($numdate) {
	return _T('date_fmt_heures_minutes', array('h'=> heures($numdate), 'm'=> minutes($numdate)));
}

function recup_date($numdate){
	if (!$numdate) return '';
	if (ereg('([0-9]{1,2})/([0-9]{1,2})/([0-9]{1,2})', $numdate, $regs)) {
		$jour = $regs[1];
		$mois = $regs[2];
		$annee = $regs[3];
		if ($annee < 90){
			$annee = 2000 + $annee;
		} else {
			$annee = 1900 + $annee ;
		}
	}
	elseif (ereg('([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})',$numdate, $regs)) {
		$annee = $regs[1];
		$mois = $regs[2];
		$jour = $regs[3];
	}
	elseif (ereg('([0-9]{4})-([0-9]{2})', $numdate, $regs)){
		$annee = $regs[1];
		$mois = $regs[2];
	}
	if ($annee > 4000) $annee -= 9000;
	if (substr($jour, 0, 1) == '0') $jour = substr($jour, 1);

	return array($annee, $mois, $jour);
}


function affdate_base($numdate, $vue) { 
	global $spip_lang;
	$date_array = recup_date($numdate);
	if ($date_array)
		list($annee, $mois, $jour) = $date_array;
	else
		return '';

	// 1er, 21st, etc.
	$journum = $jour;

	if ($jour == 0)
		$jour = '';
	else if ($jourth = _T('date_jnum'.$jour))
			$jour = $jourth;

	$mois = intval($mois);
	if ($mois > 0 AND $mois < 13) {
		$nommois = _T('date_mois_'.$mois);
		if ($jour)
			$jourmois = _T('date_de_mois_'.$mois, array('j'=>$jour, 'nommois'=>$nommois));
	}

	if ($annee < 0) {
		$annee = -$annee." "._T('date_avant_jc');
		$avjc = true;
	}
	else $avjc = false;

	switch ($vue) {
	case 'saison':
		if ($mois > 0){
			$saison = 1;
			if (($mois == 3 AND $jour >= 21) OR $mois > 3) $saison = 2;
			if (($mois == 6 AND $jour >= 21) OR $mois > 6) $saison = 3;
			if (($mois == 9 AND $jour >= 21) OR $mois > 9) $saison = 4;
			if (($mois == 12 AND $jour >= 21) OR $mois > 12) $saison = 1;
		}
		return _T('date_saison_'.$saison);

	case 'court':
		if ($avjc) return $annee;
		$a = date('Y');
		if ($annee < ($a - 100) OR $annee > ($a + 100)) return $annee;
		if ($annee != $a) return _T('date_fmt_mois_annee', array ('mois'=>$mois, 'nommois'=>ucfirst($nommois), 'annee'=>$annee));
		return _T('date_fmt_jour_mois', array ('jourmois'=>$jourmois, 'jour'=>$jour, 'mois'=>$mois, 'nommois'=>$nommois, 'annee'=>$annee));

	case 'jourcourt':
		if ($avjc) return $annee;
		$a = date('Y');
		if ($annee < ($a - 100) OR $annee > ($a + 100)) return $annee;
		if ($annee != $a) return _T('date_fmt_jour_mois_annee', array ('jourmois'=>$jourmois, 'jour'=>$jour, 'mois'=>$mois, 'nommois'=>$nommois, 'annee'=>$annee));
		return _T('date_fmt_jour_mois', array ('jourmois'=>$jourmois, 'jour'=>$jour, 'mois'=>$mois, 'nommois'=>$nommois, 'annee'=>$annee));

	case 'entier':
		if ($avjc) return $annee;
		if ($jour)
			return _T('date_fmt_jour_mois_annee', array ('jourmois'=>$jourmois, 'jour'=>$jour, 'mois'=>$mois, 'nommois'=>$nommois, 'annee'=>$annee));
		else
			return _T('date_fmt_mois_annee', array ('mois'=>$mois, 'nommois'=>$nommois, 'annee'=>$annee));

	case 'nom_mois':
		return $nommois;

	case 'mois':
		return sprintf("%02s",$mois);

	case 'jour':
		return $jour;

	case 'journum':
		return $journum;

	case 'nom_jour':
		if (!$mois OR !$jour) return '';
		$nom = mktime(1,1,1,$mois,$jour,$annee);
		$nom = 1+date('w',$nom);
		return _T('date_jour_'.$nom);

	case 'mois_annee':
		if ($avjc) return $annee;
		return trim(_T('date_fmt_mois_annee', array('mois'=>$mois, 'nommois'=>$nommois, 'annee'=>$annee)));

	case 'annee':
		return $annee;
	}

	return "<blink>"._T('info_format_non_defini')."</blink>";
}

function nom_jour($numdate) {
	return affdate_base($numdate, 'nom_jour');
}

function jour($numdate) {
	return affdate_base($numdate, 'jour');
}

function journum($numdate) {
	return affdate_base($numdate, 'journum');
}

function mois($numdate) {
	return affdate_base($numdate, 'mois');
}

function nom_mois($numdate) {
	return affdate_base($numdate, 'nom_mois');
}

function annee($numdate) {
	return affdate_base($numdate, 'annee');
}

function saison($numdate) {
	return affdate_base($numdate, 'saison');
}

function affdate($numdate) {
	return affdate_base($numdate, 'entier');
}

function affdate_court($numdate) {
	return affdate_base($numdate, 'court');
}

function affdate_jourcourt($numdate) {
	return affdate_base($numdate, 'jourcourt');
}

function affdate_mois_annee($numdate) {
	return affdate_base($numdate, 'mois_annee');
}

function affdate_heure($numdate) {
	return _T('date_fmt_jour_heure', array('jour' => affdate($numdate), 'heure' => heures_minutes($numdate)));
}


//
// Alignements en HTML
//

function aligner($letexte,$justif) {
	$letexte = eregi_replace("<p([^>]*)", "<p\\1 align='$justif'", trim($letexte));
	if ($letexte AND !ereg("^[[:space:]]*<p", $letexte)) {
		$letexte = "<p class='spip' align='$justif'>" . $letexte . "</p>";
	}
	return $letexte;
}

function justifier($letexte) {
	return aligner($letexte,'justify');
}

function aligner_droite($letexte) {
	return aligner($letexte,'right');
}

function aligner_gauche($letexte) {
	return aligner($letexte,'left');
}

function centrer($letexte) {
	return aligner($letexte,'center');
}

//
// Export iCal
//

function filtrer_ical($texte) {
	include_ecrire('inc_charsets.php3');
	$texte = html2unicode($texte);
	$texte = unicode2charset(charset2unicode($texte, lire_meta('charset'), 1), 'utf-8');
	$texte = ereg_replace("\n", " ", $texte);
	$texte = ereg_replace(",", "\,", $texte);

	return $texte;
}

function date_ical($date_heure, $minutes = 0) {
	return date("Ymd\THis", mktime(heures($date_heure),minutes($date_heure)+$minutes,0,mois($date_heure),jour($date_heure),annee($date_heure)));
}

function date_iso($date_heure) {
	list($annee, $mois, $jour) = recup_date($date_heure);
	list($heures, $minutes, $secondes) = recup_heure($date_heure);
	$time = mktime($heures, $minutes, $secondes, $mois, $jour, $annee);
	return gmdate("Y-m-d\TH:i:s\Z", $time);
}

// A supprimer apres referendum, remplace' par #EXPOSER et [(#EXPOSER|on,off)]
function exposer ($id, $identique='on', $different='') {
	global $id_article, $id_breve, $id_rubrique, $id_mot, $id_auteur;

	// pour l'ordre des variables respecter celui des boutons de inc-admin.php3
	$objet = $id_article
	OR $objet = $id_breve
	OR $objet = $id_rubrique
	OR $objet = $id_mot
	OR $objet = $id_auteur;

	if ($id == $objet)
		return $identique;
	else
		return $different;
}

//
// Reduire la taille d'un logo
//

function reduire_image($img, $taille = 120) {

	if (strlen($img) > 0) {
		// recuperer le nom du fichier
		if (eregi("src=\'([^']+)\'", $img, $regs)) $logo = $regs[1];
		if (eregi("align=\'([^']+)\'", $img, $regs)) $align = $regs[1];
		if (eregi("name=\'([^']+)\'", $img, $regs)) $name = $regs[1];
		if (eregi("hspace=\'([^']+)\'", $img, $regs)) $espace = $regs[1];

		if (file_exists($logo)) {
			$logo = substr($logo, 4, strlen($logo));
			// recuperer nom de l'image et sa terminaison
			$nom = substr($logo, 0, strpos($logo, "."));
			$format = substr($logo, strlen($logo)-3, strlen($logo));
		
			// test de recalcul en fonction des dates des fichiers
			// pour verifier si mise a jour plus recente du logo
			if (file_exists("IMG/$taille-$nom.$format")) {
				if (filemtime("IMG/$taille-$nom.$format") > filemtime("IMG/$logo")) {
					return "<img src='IMG/$taille-$nom.$format' name='$name' border='0' align='$align' alt='' hspace='$espace' vspace='$espace' class='spip_logos' />";
					$recalculer = false;
				}
				else {
					$recalculer = true;
				}
			} else {
				$recalculer = true;
			}
		
			$gd_formats = lire_meta("gd_formats");
			if ($recalculer AND ereg($format, $gd_formats)) {
				// Recuperer l'image d'origine
				if ($format == "jpg") {
					$srcImage = ImageCreateFromJPEG("IMG/$logo");
				}
				else if ($format == "gif"){
					$srcImage = ImageCreateFromGIF("IMG/$logo");
				}
				else if ($format == "png"){
					$srcImage = ImageCreateFromPNG("IMG/$logo");
				}
				if (!$srcImage) return;

				// Calculer le ratio
				$srcWidth = ImageSX($srcImage);
				$srcHeight = ImageSY($srcImage);
			
				if ($srcWidth > $taille OR $srcHeight > $taille) {
					$ratioWidth = $srcWidth/$taille;
					$ratioHeight = $srcHeight/$taille;
				
					if ($ratioWidth < $ratioHeight) {
						$destWidth = floor($srcWidth/$ratioHeight);
						$destHeight = $taille;
					}
					else {
						$destWidth = $taille;
						$destHeight = floor($srcHeight/$ratioWidth);
					}
				} else {
					$destWidth = $srcWidth;
					$destHeight = $srcHeight;
				}
				
				// Initialisation de l'image destination
				if ($GLOBALS['flag_ImageCreateTrueColor'] AND $destFormat != "gif")
					$destImage = ImageCreateTrueColor($destWidth, $destHeight);
				if (!$destImage)
					$destImage = ImageCreate($destWidth, $destHeight);
				// Recopie de l'image d'origine avec adaptation de la taille
				$ok = false;
				if ($GLOBALS['flag_ImageCopyResampled'])
					$ok = ImageCopyResampled($destImage, $srcImage, 0, 0, 0, 0, $destWidth, $destHeight, $srcWidth, $srcHeight);
				if (!$ok)
					$ok = ImageCopyResized($destImage, $srcImage, 0, 0, 0, 0, $destWidth, $destHeight, $srcWidth, $srcHeight);
			
				// Sauvegarde de l'image destination
				$destination = "IMG/$taille-$nom.$format";
				if ($format == "jpg") {
					ImageJPEG($destImage, $destination, 70);
				}
				else if ($format == "gif") {
					ImageGIF($destImage, $destination);
				}
				else if ($format == "png") {
					ImagePNG($destImage, $destination);
				}
				ImageDestroy($srcImage);
				ImageDestroy($destImage);

				return "<img src='$destination' name='$name' border='0' align='$align' alt='' hspace='$espace' vspace='$espace' class='spip_logos' />";
			} else {
				$taille_origine = @getimagesize("IMG/$logo");
				if ($taille_origine) {
					// Calculer le ratio
					$srcWidth = $taille_origine[0];
					$srcHeight = $taille_origine[1];
				
					if ($srcWidth > $taille OR $srcHeight > $taille) {
						$ratioWidth = $srcWidth/$taille;
						$ratioHeight = $srcHeight/$taille;
					
						if ($ratioWidth < $ratioHeight) {
							$destWidth = floor($srcWidth/$ratioHeight);
							$destHeight = $taille;
						}
						else {
							$destWidth = $taille;
							$destHeight = floor($srcHeight/$ratioWidth);
						}
					} else {
						$destWidth = $srcWidth;
						$destHeight = $srcHeight;
					}
					return "<img src='IMG/$logo' name='$name' width='$destWidth' height='$destHeight' border='0' align='$align' alt='' hspace='$espace' vspace='$espace' class='spip_logos' />";
				}
			}
		}
	}
}


//
// Recuperation de donnees dans le champ extra
// Ce filtre n'a de sens qu'avec la balise #EXTRA
//
function extra($letexte, $champ) {
	$champs = unserialize($letexte);
	return $champs[$champ];
}

// postautobr : transforme les sauts de ligne en _
function post_autobr($texte, $delim="\n_ ") {
	$texte = str_replace("\r\n", "\r", $texte);
	$texte = str_replace("\r", "\n", $texte);
	list($texte, $les_echap) = echappe_html($texte, "POSTAUTOBR", true);

	$debut = '';
	$suite = $texte;
	while ($t = strpos('-'.$suite, "\n", 1)) {
		$debut .= substr($suite, 0, $t-1);
		$suite = substr($suite, $t);
		$car = substr($suite, 0, 1);
		if (($car<>'-') AND ($car<>'_') AND ($car<>"\n") AND ($car<>"|"))
			$debut .= $delim;
		else
			$debut .= "\n";
		if (ereg("^\n+", $suite, $regs)) {
			$debut.=$regs[0];
			$suite = substr($suite, strlen($regs[0]));
		}
	}
	$texte = $debut.$suite;

	$texte = echappe_retour($texte, $les_echap, "POSTAUTOBR");
	return $texte;
}

//
// Gestion des blocs multilingues
//

// renvoie la traduction d'un bloc multi dans la langue demandee
function multi_trad ($lang, $trads) {
	// si la traduction existe, genial
	if (isset($trads[$lang]))
		$retour = $trads[$lang];

	// cas des langues xx_yy
	else if (ereg('^([a-z]+)_', $lang, $regs) AND isset($trads[$regs[1]]))
			$retour = $trads[$regs[1]];

	// sinon, renvoyer la premiere du tableau
	// remarque : on pourrait aussi appeler un service de traduction externe
	// ou permettre de choisir une langue "plus proche",
	// par exemple le francais pour l'espagnol, l'anglais pour l'allemand, etc.
	else {
		list (,$trad) = each($trads);
		$retour = $trad;
	}


	// dans l'espace prive, mettre un popup multi
	if ($GLOBALS['flag_ecrire']) {
		$retour = ajoute_popup_multi($trads, $retour);
	}

	return $retour;
}

// analyse un bloc multi
function extraire_trad ($langue_demandee, $bloc) {
	$lang = '';

	while (preg_match("/^(.*?)\[([a-z_]+)\]/si", $bloc, $regs)) {
		$texte = trim($regs[1]);
		if ($texte OR $lang)
			$trads[$lang] = $texte;
		$bloc = substr($bloc, strlen($regs[0]));
		$lang = $regs[2];
	}
	$trads[$lang] = $bloc;

	// faire la traduction avec ces donnees
	return multi_trad($langue_demandee, $trads);
}

// repere les blocs multi dans un texte et extrait le bon
function extraire_multi ($letexte) {
	global $flag_pcre;

	if (!strpos('-'.$letexte, '<multi>')) return $letexte; // perf
	if ($flag_pcre AND preg_match_all("@<multi>(.*?)</multi>@s", $letexte, $regs, PREG_SET_ORDER)) {
		foreach($regs as $reg) {
			$letexte = str_replace($reg[0], extraire_trad($GLOBALS['spip_lang'], $reg[1]), $letexte);
		}
	}
	return $letexte;
}

// popup des blocs multi dans l'espace prive (a ameliorer)
function ajoute_popup_multi($trads, $texte) {
	global $popups_multi, $compteur_multi;
	while (list($lang,$bloc) = each($trads)) 
		$popup .= "[$lang] ".supprimer_tags(couper($bloc,20))."\n";

	if ($popup) {
		$texte .= " <img src=\"img_pack/langues-modif-12.gif\" alt=\"(multi)\" title=\"$popup\" height=\"12\" width=\"12\" border=\"0\" />";
	}

	return $texte;
}

?>

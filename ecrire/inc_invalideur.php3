<?php

// Ce fichier ne sera execute qu'une fois
if (defined("_ECRIRE_INVALIDEUR")) return;
define("_ECRIRE_INVALIDEUR", "1");

include_ecrire('inc_serialbase.php3');

function supprime_invalideurs() {
	global $tables_principales;

	foreach($tables_principales as $a) {
		$p = $a['key']["PRIMARY KEY"];
		if (!strpos($p, ","))
			spip_query("DELETE FROM spip_" . $p . _SUFFIXE_DES_CACHES);
	}
	supprime_invalideurs_inclus();
}

function supprime_invalideurs_inclus ($cond='') {
	spip_query("DELETE FROM spip_inclure"  . _SUFFIXE_DES_CACHES .
	($cond ? " WHERE $cond" :''));
}

// en attendant de reecrire les 3 scripts dans ecrire ???
function maj_invalideurs ($hache, $infosurpage) {
#	insere_invalideur($infosurpage['id_article'],'id_article', $hache);
#	insere_invalideur($infosurpage['id_breve'],   'id_breve', $hache);
#	insere_invalideur($infosurpage['id_rubrique'],'id_rubrique', $hache);
	insere_invalideur($infosurpage['id_forum'],'id_forum', $hache);
}

function insere_invalideur($a, $type, $hache) {
	if (is_array($a)) {
		$values = array();
		foreach($a as $k => $v) {
			$m = "('$hache', '$k')";
			$values[] = $m;
			$l .= " $k";
		}
		spip_query("INSERT IGNORE INTO spip_" . $type . _SUFFIXE_DES_CACHES .
		" (hache, " . $type . ") VALUES " . join(", ", $values));
		# spip_log("Dependances $type: " . join(", ", $values));
	}
}

// Regarde dans une table de nom de caches ceux verifiant une condition donnee
// Les retire de cette table et de la table generale des caches
// Si la condition est vide, c'est une simple purge generale


//
// Destruction des fichiers caches invalides
//
// NE PAS appeler ces fonctions depuis l'espace prive ! Elles ont besoin d'avoir
// un acces direct au repertoire CACHE/

// Securite : est sur que c'est un cache
function retire_cache($cache) {
	if ($GLOBALS['flag_ecrire']) return;
	# spip_log("kill $cache ?");
	if (preg_match("|^CACHE/([0-9a-f]/)?([0-9a-f]/)?[-_%0-9a-z.]*$|i", $cache))
		@unlink($cache);
}

// Supprimer une liste de caches
function retire_caches($caches) {
	if ($GLOBALS['flag_ecrire']) return;
	if ($n = sizeof($caches)) {
		spip_log ("Retire $n caches");
		foreach ($caches as $cache)
			retire_cache($cache);
	}
}

// Commentaire ?
function suivre_invalideur($cond, $table) {
	if ($GLOBALS['flag_ecrire']) return;
	$result = spip_query("SELECT DISTINCT hache FROM $table WHERE $cond");
	$tous = array();
	while ($row = spip_fetch_array($result)) {
		$tous[] = $row['hache'];
	}
	spip_log("suivre $cond");
	applique_invalideur($tous);
}

// Commentaire ?
function applique_invalideur($depart) {
	global $tables_principales;

	if ($GLOBALS['flag_ecrire']) return;
	if ($depart) {
		$tous = join("', '", $depart);
		$tous = "'$tous'";
		$niveau = $tous;
		spip_log("applique $tous");
		while ($niveau) {
			// le NOT est theoriquement superflu, mais
			// protege des tables endommagees
			$result = spip_query("SELECT DISTINCT hache FROM spip_inclure" . 
			_SUFFIXE_DES_CACHES . ' WHERE ' .
			calcul_mysql_in('inclure', $niveau, '') . ' AND ' .
			calcul_mysql_in('hache', $tous, 'NOT')
			);
			$niveau = array();
			while ($row = spip_fetch_array($result)) {
				$niveau[] = "'" . $row['hache'] . "'"; 
				$depart[] = $row['hache'];
				$tous .= ", '" . $row['hache'] . "'";
			}
			$niveau = join(', ', $niveau);
		}
		spip_query("DELETE FROM spip_inclure"  . _SUFFIXE_DES_CACHES .
		' WHERE ' . calcul_mysql_in('hache', $tous, 'NOT'));

		foreach($tables_principales as $a) {
			$p = $a['key']["PRIMARY KEY"];
			if (!strpos($p, ","))
				spip_query("DELETE FROM spip_" . $p .
				_SUFFIXE_DES_CACHES . ' WHERE ' .
				calcul_mysql_in('hache', $tous, 'NOT')
				);
		}
		retire_caches($depart);
	}
}

?>

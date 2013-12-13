<?php
// This is a SPIP language file  --  Ceci est un fichier langue de SPIP
// extrait automatiquement de http://trad.spip.net/tradlang_module/ecrire_?lang_cible=bg
// ** ne pas modifier le fichier **

if (!defined('_ECRIRE_INC_VERSION')) return;

$GLOBALS[$GLOBALS['idx_lang']] = array(

	// A
	'activer_plugin' => 'Активирайте плъгина',
	'aide_non_disponible' => 'Тази част от рубриката "Помощник" все още не е публикувана на български език.',
	'auteur' => 'Автор:',
	'avis_acces_interdit' => 'Забранен достъп.',
	'avis_article_modifie' => 'Предупреждение! @nom_auteur_modif@ е работил по тази статия преди @date_diff@ минути',
	'avis_aucun_resultat' => 'Няма намерени резултати.',
	'avis_chemin_invalide_1' => 'Името на файла, което сте избрали',
	'avis_chemin_invalide_2' => 'е грешно. Моля, върнете се на предишната страница, за за проверите подадената информация. ',
	'avis_connexion_echec_1' => 'Връзката към SQL сървъра се разпадна.', # MODIF
	'avis_connexion_echec_2' => 'Моля, върнете се на предишната страница, за да проверите подадената информация.',
	'avis_connexion_echec_3' => '<b>ВНИМАНИЕ!</b> За достъп до голяма част от сървърите е необходимо да се изпрати <b>заявка</b> за активиране достъпа до базите данни SQL, преди използването им. Ако не успеете да се свържете, проверете дали сте изпратили заявката.', # MODIF
	'avis_connexion_ldap_echec_1' => 'Връзката с LDAP сървъра пропадна.',
	'avis_connexion_ldap_echec_2' => 'Моля, върнете се на предишната страница, за за проверите подадената информация.',
	'avis_connexion_ldap_echec_3' => 'Без използване на LDAP-поддръжка за вписване на потребители.',
	'avis_deplacement_rubrique' => 'Предупреждение! Рубриката съдържа @contient_breves@ новина@scb@: ако желаете да я преместите, отметнете в полето за потвърждение. ',
	'avis_destinataire_obligatoire' => 'Трябва да укажете получател, преди да изпратите съобщението.',
	'avis_erreur_connexion_mysql' => 'Грешка при свързване с SQL',
	'avis_erreur_version_archive' => '<b>Внимание! Файлът @archive@ отговаря на
    различна версия на СПИП от тази, която имате
    инсталирана.</b> Това води до големи проблеми:
    има риск от разрушаване на базата данни, от
    нарушаване функциите на сайта и т.н. Не изпращайте
    тази заявка за вписване.<p>За повече
    информация се обръщайте към <a href="@spipnet@">
                                документацията на СПИП</a>.', # MODIF
	'avis_espace_interdit' => '<b>Забранена област</b><p>СПИП е вече инсталиран.',
	'avis_lecture_noms_bases_1' => 'Инсталаторът не може да прочете имената на инсталираните бази данни.',
	'avis_lecture_noms_bases_2' => 'Или не съществува база данни, или свойството, позволяващо преглед на базите данни е забранено
  поради съображения за сигурност (какъвто е случаят с много доставчици).',
	'avis_lecture_noms_bases_3' => 'Ако втората възможност се окаже вярна, тогава е възможно да се използва базата данни, указана след Вашето влизане в системата.',
	'avis_non_acces_message' => 'Забранен достъп до съобщението.',
	'avis_non_acces_page' => 'Забранен достъп до тази страница.',
	'avis_operation_echec' => 'Операцията пропадна.',
	'avis_probleme_archive' => 'Грешка при четене на файла @archive@',
	'avis_suppression_base' => 'ПРЕДУПРЕЖДЕНИЕ: изтриването на данните е необратимо',
	'avis_version_mysql' => 'С Вашата SQL версия: (@version_mysql@) е невъзможно да се осъществи автоматична поправка в таблиците с бази данни.',

	// B
	'bouton_acces_ldap' => 'Добавяне достъп до LDAP >>',
	'bouton_ajouter' => 'Добавяне',
	'bouton_ajouter_participant' => 'ДОБАВЯНЕ НА УЧАСТНИК:',
	'bouton_annonce' => 'СЪОБЩЕНИЕ',
	'bouton_checkbox_envoi_message' => 'възможност за изпращане на съобщение',
	'bouton_checkbox_indiquer_site' => 'Моля, впишете името на Интернет сайт',
	'bouton_checkbox_signature_unique_email' => 'позволен е само един запис на електронен адрес',
	'bouton_checkbox_signature_unique_site' => 'позволен е само един запис на Интернет сайт',
	'bouton_demande_publication' => 'Заявка за публикуване на статията',
	'bouton_desactive_tout' => 'Деактивирайте всички',
	'bouton_effacer_index' => 'Изтриване на индекси',
	'bouton_effacer_tout' => 'Изтриване на ВСИЧКО',
	'bouton_envoi_message_02' => 'ИЗПРАЩАНЕ НА СЪОБЩЕНИЕ',
	'bouton_envoyer_message' => 'Последно съобщение: изпращане',
	'bouton_modifier' => 'Промяна',
	'bouton_pense_bete' => 'ЛИЧНА БЕЛЕЖКА',
	'bouton_radio_activer_messagerie' => 'Позволяване на система за вътрешни съобщения',
	'bouton_radio_activer_messagerie_interne' => 'Позволяване на система за вътрешни съобщения',
	'bouton_radio_activer_petition' => 'Активиране на молбата',
	'bouton_radio_afficher' => 'Показване',
	'bouton_radio_apparaitre_liste_redacteurs_connectes' => 'Добяване към списъка на текущо свързаните редактори',
	'bouton_radio_desactiver_messagerie' => 'Без система за съобщения',
	'bouton_radio_envoi_annonces_adresse' => 'Изпращане на съобщения до следния адрес:',
	'bouton_radio_envoi_liste_nouveautes' => 'Изпращане на списък с новини',
	'bouton_radio_non_apparaitre_liste_redacteurs_connectes' => 'Изключване от списъка на текущо свързаните редактори',
	'bouton_radio_non_envoi_annonces_editoriales' => 'Отказ от изпращане на редакторски съобщения',
	'bouton_radio_pas_petition' => 'Без молба',
	'bouton_radio_petition_activee' => 'Молбата е активирана',
	'bouton_radio_supprimer_petition' => 'Изтриване на молбата',
	'bouton_redirection' => 'ПРЕНАСОЧВАНЕ',
	'bouton_relancer_installation' => 'Подновяване на инсталацията',
	'bouton_suivant' => 'По-нататък',
	'bouton_tenter_recuperation' => 'Опит за възстановяване',
	'bouton_test_proxy' => 'Тестване на прокси',
	'bouton_vider_cache' => 'Изпразване на кеш-паметта',
	'bouton_voir_message' => 'Преглед на съобщението преди одобряване за публикуване',

	// C
	'cache_mode_compresse' => 'Кеш-файловете са запазени в компресиран вид.',
	'cache_mode_non_compresse' => 'Кеш-файловете са записани в некомпресиран вид.',
	'cache_modifiable_webmestre' => 'Параметърът може да бъде променен от уеб-администратора. ',
	'calendrier_synchro' => 'Ако инсталирате приложение за дневник, съвместимо с <b>iCal</b>, ще можете да го синхронизирате с информацията от сайта.',

	// D
	'date_mot_heures' => 'ч.',

	// E
	'email' => 'електронен адрес',
	'email_2' => 'електронен адрес:',
	'entree_adresse_annuaire' => 'Адрес на директорията',
	'entree_adresse_email' => 'Електронен адрес (е-mail)',
	'entree_base_donnee_1' => 'Адрес на базата данни',
	'entree_base_donnee_2' => '(Често адресът съвпада с адрес от Вашия сайт, понякога съответства на името «localhost», а понякога се оставя празен.)',
	'entree_biographie' => 'Кратка биография с няколко думи.',
	'entree_chemin_acces' => '<b>Въвеждане</b> на път:',
	'entree_cle_pgp' => 'PGP ключ',
	'entree_contenu_rubrique' => '(Кратко съдържание на рубриката.)',
	'entree_identifiants_connexion' => 'Идентефикатори за свързване',
	'entree_informations_connexion_ldap' => 'Моля, попълнете бланката с информацията за LDAP връзка. Тази информация ще получите от системния или мрежовия администратор.',
	'entree_infos_perso' => 'Кой си ти?',
	'entree_interieur_rubrique' => 'В рубриката:',
	'entree_liens_sites' => '<b>Хипертекстова препратка</b> (препратка, сайт за посещаване и т.н.)',
	'entree_login' => 'Вход',
	'entree_login_connexion_1' => 'Потребителско име за свързване',
	'entree_login_connexion_2' => '(Понякога съвпада с Вашето потребителско име към FTP достъпа, понякога се оставя празно)',
	'entree_login_ldap' => 'Начален вход за LDAP',
	'entree_mot_passe' => 'Парола',
	'entree_mot_passe_1' => 'Парола за свързване',
	'entree_mot_passe_2' => '(Понякога съвпада с паролата Ви за FTP-достъп, понякога се оставя празно)',
	'entree_nom_fichier' => 'Моля, попълнете име на файла @texte_compresse@:',
	'entree_nom_pseudo' => 'Име или прякор',
	'entree_nom_pseudo_1' => '(Име или прякор)',
	'entree_nom_site' => 'Име на сайта',
	'entree_nouveau_passe' => 'Нова парола',
	'entree_passe_ldap' => 'Парола',
	'entree_port_annuaire' => 'Номер на порта на директорията',
	'entree_signature' => 'Подпис',
	'entree_titre_obligatoire' => '<b>Заглавие</b> [Задължително]<br />',
	'entree_url' => 'URL на сайта',
	'erreur_plugin_fichier_absent' => 'Липсва файл',
	'erreur_plugin_fichier_def_absent' => 'Файлът - дефиниция липсва',
	'erreur_plugin_nom_fonction_interdit' => 'Забранено име на функцията',
	'erreur_plugin_nom_manquant' => 'Липсва име на плъгина',
	'erreur_plugin_prefix_manquant' => 'Не е определено име, указващо мястото на плъгина',
	'erreur_plugin_tag_plugin_absent' => '&lt;плъгин&gt; липсва във файла - дефиниция',
	'erreur_plugin_version_manquant' => 'Липсва версията на плъгина',

	// I
	'ical_info1' => 'Тази страница представя няколко начина да останете във връзка с дейността на сайта.',
	'ical_info2' => 'За повече информация, отидете на <a href="@spipnet@">Документация за СПИП</a>.', # MODIF
	'ical_info_calendrier' => 'Имате на разположение два календара. Първият е карта на сайта, указваща всички публикувани статии. Вторият съдържа обявления за редакторите, както и най-новите лични съобщения до Вас. Този календар се показва само на Вас, благодарение на личнен ключ, който можете да променяте по всяко време чрез смяна на паролата.',
	'ical_methode_http' => 'Сваляне',
	'ical_methode_webcal' => 'Синхронизация (webcal://)',
	'ical_texte_js' => 'Един ред на скрипт Java позволява на всяка страница от сайта лесно да се показват най-новите публикувани статии.',
	'ical_texte_prive' => 'Календарът е строго личен. Той уведомява за вътрешните редакторски дейности на сайта (напр. задачи, лични срещи, изпратени статии и новини и др.)',
	'ical_texte_public' => 'Календарът Ви дава възможност да следите публичните дейности на сайта (напр. публикувани статии и новини).',
	'ical_texte_rss' => 'Можете да обедините последните новини от сайта на всеки файлов четец от типа XML/RSS (Rich Site Summary). Това е същият формат, който позволява на СПИП да чете последните новини, публикувани от други сайтове като за целта използва съвместим формат за обмен.',
	'ical_titre_js' => 'Скрипт Java',
	'ical_titre_mailing' => 'Пощенски списък',
	'ical_titre_rss' => 'Файлове за обединение',
	'icone_activer_cookie' => 'Поставяне на cookie',
	'icone_admin_plugin' => 'Управление на плъгините',
	'icone_afficher_auteurs' => 'Показване на авторите',
	'icone_afficher_visiteurs' => 'Показване на посетителите',
	'icone_arret_discussion' => 'Прекъсване участието в тази дискусия',
	'icone_calendrier' => 'Календар',
	'icone_creer_auteur' => 'Създаване на автор и свързване със статията',
	'icone_creer_mot_cle' => 'Създаване на ключова дума и свързване със статията',
	'icone_creer_rubrique_2' => 'Създаване на рубрика',
	'icone_envoyer_message' => 'Изпращане на съобщението',
	'icone_modifier_article' => 'Промяна на статията',
	'icone_modifier_message' => 'Промяна на съобщението',
	'icone_modifier_rubrique' => 'Промяна на рубриката',
	'icone_retour' => 'Обратно',
	'icone_retour_article' => 'Обратно към статията',
	'icone_supprimer_cookie' => 'Изтриване на cookie',
	'icone_supprimer_rubrique' => 'Изтриване на рубриката',
	'icone_supprimer_signature' => 'Изтриване на записа',
	'icone_valider_signature' => 'Одобряване на записа',
	'image_administrer_rubrique' => 'Управление на рубриката',
	'info_1_article' => '1 статия',
	'info_1_site' => '1 сайт',
	'info_activer_cookie' => 'Възможност за активиране на <b>cookie администриране</b>, което позволява
 улеснено превключване между публичния сайт и личната зона.',
	'info_admin_gere_rubriques' => 'Този администратор управлява следните рубрики:',
	'info_admin_gere_toutes_rubriques' => 'Този администратор управлява <b>всички рубрики</b>.', # MODIF
	'info_administrateur' => 'Администратор',
	'info_administrateur_1' => 'Администратор',
	'info_administrateur_2' => 'на сайта (<i>внимавайте</i>)',
	'info_administrateur_site_01' => 'Ако сте администратор на сайта, моля',
	'info_administrateur_site_02' => 'посещаване на препратката',
	'info_administrateurs' => 'Администратори',
	'info_administrer_rubrique' => 'Вие можете да управлявате рубриката',
	'info_adresse' => 'към адрес:',
	'info_adresse_url' => 'Публичен URL на сайта ',
	'info_afficher_visites' => 'Показване на посещения за:',
	'info_aide_en_ligne' => 'Помощник',
	'info_ajout_image' => 'Когато се добавят изображения под формата на приложени документи към 
  статия, СПИП автоматично създава умалени образи (винетки)
  на поместените изображения. Това позволява, например да се създаде
  автоматично галерия от изображения.',
	'info_ajout_participant' => 'Добавен е следният участник:',
	'info_ajouter_rubrique' => 'Добавяне на друга рубрика за управление:',
	'info_annonce_nouveautes' => 'Най-новите съобщения',
	'info_anterieur' => 'предварителен',
	'info_article' => 'статия',
	'info_article_2' => 'статии',
	'info_article_a_paraitre' => 'Статии за одобрение със стара дата ',
	'info_articles_02' => 'статии',
	'info_articles_2' => 'Статии',
	'info_articles_auteur' => 'Статиите на автора',
	'info_articles_trouves' => 'Намерени статии',
	'info_articles_trouves_dans_texte' => 'Намерени статии (в текста)',
	'info_attente_validation' => 'Вашите статии, очакващи одобрение за публикуване',
	'info_aujourdhui' => 'днес:',
	'info_auteur_message' => 'ИЗПРАЩАЧ:',
	'info_auteurs' => 'Автори',
	'info_auteurs_par_tri' => 'Автори@partri@',
	'info_auteurs_trouves' => 'Намерени автори',
	'info_authentification_externe' => 'Външно удостоверяване на автентичността',
	'info_avertissement' => 'Предупреждение',
	'info_base_installee' => 'Структурата на Вашата база данни е инсталирана.',
	'info_chapeau' => 'Преглед',
	'info_chapeau_2' => 'Въведение:',
	'info_chemin_acces_1' => 'Опции: <b>Път за достъп до директорията</b>',
	'info_chemin_acces_2' => 'От сега нататък Вие трябва да определяте пътя за достъп до данните в директорията. Тази информация дава възможност за преглед на потребителските профили, съхранени там.',
	'info_chemin_acces_annuaire' => 'Опции: <b>Път за достъп</b>',
	'info_choix_base' => 'Трета стъпка:',
	'info_classement_1' => '<sup>st</sup> от общо @liste@',
	'info_classement_2' => '<sup>th</sup> от общо @liste@',
	'info_code_acces' => 'Не забравяйте личния си код за достъп!',
	'info_config_suivi' => 'Ако адресът отговаря а даден пощенски списък, можете да окажете отдолу адресът, където участниците на сайта биха могли да се регистрират. Този адрес може да бъде URL (наример страницата, където се прави регистрация през Интернет страница), или електронен адрес, заедно с определена тема на писмото (например: <tt>@adresse_suivi@?subject=subscribe</tt>):',
	'info_config_suivi_explication' => 'Можете да се абонирате за пощенския списък на сайта. За целта ще получите автоматично електронно съобщение с обявленията, свързани с новините и статиите, изпратени за публикуване.',
	'info_confirmer_passe' => 'Потвърдете новата парола:',
	'info_connexion_base' => 'Втора стъпка: <b>Опит за свързване с базата данни</b>',
	'info_connexion_ldap_ok' => '<b>Успешна LDAP връзка</b><p> Преминете към следващата стъпка.', # MODIF
	'info_connexion_mysql' => 'Първа стъпка: <b>Вашата SQL връзка</b>',
	'info_connexion_ok' => 'Успешно свързване.',
	'info_contact' => 'Контакт',
	'info_contenu_articles' => 'Съдържание на статиите',
	'info_creation_paragraphe' => '(За нов ред оставете празни редове.)', # MODIF
	'info_creation_rubrique' => 'Трябва да създадете поне една рубрика,<br />преди да започнете да пишете статии.<br />',
	'info_creation_tables' => 'Четвърта стъпка: <b>Създаване на таблици с бази данни</b>',
	'info_creer_base' => '<b>Създаване</b> на нова база данни:',
	'info_dans_rubrique' => 'В рубриката:',
	'info_date_publication_anterieure' => 'Дата на предишно публикуване:',
	'info_date_referencement' => 'ДАТА НА СВЪРЗВАНЕ НА САЙТА:',
	'info_derniere_etape' => 'Последна стъпка: <b>Приключено!',
	'info_derniers_articles_publies' => 'Вашите най-нови публикувани статии',
	'info_desactiver_messagerie_personnelle' => 'От тази страница можете да включите/ изключите системата за изпращане на лични съобщения.',
	'info_descriptif' => 'Описание:',
	'info_discussion_cours' => 'Дискусии в ход',
	'info_ecrire_article' => 'Преди да започнете за пишете статии, трябва да създадете поне една рубрика.',
	'info_email_envoi' => 'Електронен адрес на изпращача (по желание)',
	'info_email_envoi_txt' => 'Впишете електронния адрес на изпращача, който използвате (по подразбиране, адресът на получателя ще се използва за адрес на изпращача):',
	'info_email_webmestre' => 'Електронен адрес на уеб-администратора (незадължителен)', # MODIF
	'info_entrer_code_alphabet' => 'Въвеждане на кода на азбуката, която ще бъде използвана:',
	'info_envoi_email_automatique' => 'Автоматично изпращане на съобщение',
	'info_envoyer_maintenant' => 'Изпращане',
	'info_etape_suivante' => 'Преминете към следващата стъпка',
	'info_etape_suivante_1' => 'Можете да преминете към следващата стъпка.',
	'info_etape_suivante_2' => 'Можете да преминете към следващата стъпка.',
	'info_exportation_base' => 'експортиране на базата данни в @archive@',
	'info_facilite_suivi_activite' => 'За улесняване по-нататъшните действия на редакторите,
  СПИП изпраща по електронна поща съобщение с молбите за публикуване и одобрените статии до
  някой пощенски списък
  на редактори, например.
',
	'info_fichiers_authent' => 'Файл за удостоверяване автентичността: .htpasswd',
	'info_forums_abo_invites' => 'Сайтът Ви съдържа форуми посредством предварителен абонамент; посетителите могат да се регистират за тях през публичния сайт.',
	'info_gauche_admin_effacer' => '<b>Само администратори имат достъп до тази страница.</b><p> Тя осигурява достъп до различни технически задачи за поддръжка. Някои от тях позволяват специфичен процес на идентификация и изискват FTP достъп до сайта.', # MODIF
	'info_gauche_admin_tech' => '<b>Само администратори имат достъп до тази страница.</b><p> Тя осигурява достъп до различни
 технически задачи за поддръжка. Някои от тях позволяват специфичен процес на
идентификация и изискват FTP достъп до сайта.', # MODIF
	'info_gauche_admin_vider' => '<b>Само администратори имат достъп до тази страница.</b><p> Тя осигурява достъп доразлични
технически задачи за поддръжка. Някои от тях позволяват специфичен процес на
идентификация и изискват FTP достъп до сайта.', # MODIF
	'info_gauche_auteurs' => 'Тук ще намерите всички автори на сайта.
 Статусът на всеки от тях е обозначен с цвета на неговата икона (редактор - жълта; администратор - зелена).',
	'info_gauche_auteurs_exterieurs' => 'Външни автори, без достъп до сайта, са обозначени със синя икона; изтритите автори - с кошче за боклук.', # MODIF
	'info_gauche_messagerie' => 'Изпращането на съобщения позволява да се обменя информация между редакторите, да се съхраняват бележки (за лично ползване) или да се публикуват обяви в началната страница на личната зона (ако сте администратор).',
	'info_gauche_numero_auteur' => 'НОМЕР НА АВТОРА:',
	'info_gauche_statistiques_referers' => 'Тази страница показва списък с <i>препратки към сайтове</i>: т.е. сайтовете, съдържащи връзка към Вашия сайт, само за вчера и днес: този списък се акуализира на всеки 24 часа.',
	'info_gauche_visiteurs_enregistres' => 'Тук ще намерите посетителите, регистрирани
 в публичната зона на сайта (форумите са с предварително записване).',
	'info_generation_miniatures_images' => 'Генерирана на умалени образи на изображенията',
	'info_gerer_trad' => 'Управление на връзките с преводи?',
	'info_hebergeur_desactiver_envoi_email' => 'Някои доставчици не позволяват изпращането на автоматични съобщения
  от техните сървъри. В този случай, следните свойства
  на СПИП не работят:',
	'info_hier' => 'вчера:',
	'info_historique_activer' => 'Активиране проследяването на преработките',
	'info_historique_affiche' => 'Показване на версията',
	'info_historique_comparaison' => 'сравнение',
	'info_historique_desactiver' => 'Дезактивиране проследяването на преработките',
	'info_historique_texte' => 'Проследяването на корекциите позволява да се прави справка на всички промени, направени на статията и да показва различията между последващите версии.',
	'info_identification_publique' => 'Публична самоличност...',
	'info_image_process' => 'Изберете най-удобният начин да създавате миниатюри, чрез натискане въру съответната картинка.',
	'info_image_process2' => '<b>N.B.</b> <i>Ако не можете да видите никакво изображение, следователно сървърът Ви не е конфигуриран да използва такива инструменти. Ако искате да ползвате това свойство, трябва да се свържете с доставчика си и да поискате да ви инсталират разширения от типа "GD" или "Imagick"</i>', # MODIF
	'info_images_auto' => 'Автоматично изчислени изображения',
	'info_informations_personnelles' => 'Стъпка пет: <b>Лични данни</b>',
	'info_inscription_automatique' => 'Автоматична регистрация на нови редактори',
	'info_jeu_caractere' => 'Кодировка на сайта',
	'info_jours' => 'дни',
	'info_laisser_champs_vides' => 'оставите празни полетата)',
	'info_langues' => 'Езици на сайта',
	'info_ldap_ok' => 'Инсталирана е аутентификация за LDAP.',
	'info_lien_hypertexte' => 'Хипертекстова препратка:',
	'info_liste_redacteurs_connectes' => 'Списък на свързаните редактори',
	'info_login_existant' => 'Потребителското име вече съществува.',
	'info_login_trop_court' => 'Потребителското име е твърде кратко.',
	'info_maximum' => 'максимум:',
	'info_meme_rubrique' => 'В същата рубрика',
	'info_message' => 'Съобщение от',
	'info_message_efface' => 'СЪОБЩЕНИЕТО Е ИЗТРИТО',
	'info_message_en_redaction' => 'Съобщения в процес на обработка',
	'info_message_technique' => 'Техническо съобщение:',
	'info_messagerie_interne' => 'Система за вътрешни съобщения',
	'info_mise_a_niveau_base' => 'Актуализиране на базата данни SQL',
	'info_mise_a_niveau_base_2' => '{{Предупреждение!}} Инсталираната версия на СПИП
 е по-стара от тази, показана на този сайт
  Има риск за изгубване на данни, както и Вашият сайт да
  спре да работи.<br />{{Преинсталирай
  файловете на СПИП.}}',
	'info_modifier_rubrique' => 'Промяна на настройките на рубриката:',
	'info_modifier_titre' => 'Промяна: @titre@',
	'info_mon_site_spip' => 'Моят сайт под СПИП',
	'info_mot_sans_groupe' => '(Ключови думи извън групите...)',
	'info_moteur_recherche' => 'Интегрирана търсачка',
	'info_moyenne' => 'средно:',
	'info_multi_articles' => 'Да се активира ли езиково меню за статиите?',
	'info_multi_cet_article' => 'Език на статията:',
	'info_multi_langues_choisies' => 'Изберете по-долу езиците, които желаете да са активни за редакторите на сайта.
  Езиците, които вече са използвани в сайта (в началото на списъка) не могат да бъдат деактивирани.',
	'info_multi_rubriques' => 'Да се активира ли езиковото меню за рубриките?',
	'info_multi_secteurs' => ' ... само за рубрики, намиращи се в схемата?',
	'info_nom' => 'Име',
	'info_nom_destinataire' => 'Име на получателя',
	'info_nom_site' => 'Име на сайта Ви',
	'info_nombre_articles' => '@nb_articles@ статии,',
	'info_nombre_partcipants' => 'УЧАСТНИЦИ В ДИСКУСИЯТА:',
	'info_nombre_rubriques' => '@nb_rubriques@ рубрики,',
	'info_nombre_sites' => '@nb_sites@ сайтове,',
	'info_non_deplacer' => 'Не правете нищо...',
	'info_non_envoi_annonce_dernieres_nouveautes' => 'СПИП може да изпраща регулярно информация за новостите на сайта.
  (напр. съобщения за наскоро публикуваните статии и новини).',
	'info_non_envoi_liste_nouveautes' => 'Бе изпращане на списък с най-новите съобщения',
	'info_non_modifiable' => 'промяната е невъзможна',
	'info_non_suppression_mot_cle' => 'Отказ от изтриване на ключовата дума.',
	'info_notes' => 'Бележки под линия',
	'info_nouveaux_message' => 'Нови съобщения',
	'info_nouvel_article' => 'Нова статия',
	'info_nouvelle_traduction' => 'Нов превод:',
	'info_numero_article' => 'НОМЕР НА СТАТИЯТА:',
	'info_obligatoire_02' => '[Задължително]', # MODIF
	'info_option_accepter_visiteurs' => 'Позволяване регистрацията на посетители от публичния сайт',
	'info_option_faire_suivre' => 'Препраща съобщения от форума към автора на статията',
	'info_option_ne_pas_accepter_visiteurs' => 'Отказ за регистрация на посетител',
	'info_options_avancees' => 'ПОДРОБНИ ОПЦИИ',
	'info_ortho_activer' => 'Активиране на програмата за проверка на правописа.',
	'info_ortho_desactiver' => 'Деактивиране на програмата за проверка на правописа.',
	'info_ou' => 'или ...',
	'info_page_interdite' => 'Забранена страница',
	'info_par_nombre_article' => '(по номер на статията)',
	'info_passe_trop_court' => 'Паролата не е достатъчно дълга.',
	'info_passes_identiques' => 'Двете пароли не съвадат.',
	'info_pense_bete_ancien' => 'Вашите стари бележки', # MODIF
	'info_plus_cinq_car' => 'повече от 5 знака',
	'info_plus_cinq_car_2' => '(повече от 5 знака)',
	'info_plus_trois_car' => '(повече от 3 знака)',
	'info_popularite' => 'популярност: @popularite@; посещения: @visites@',
	'info_popularite_4' => 'популярност: @popularite@; поесещения: @visites@',
	'info_post_scriptum' => 'Постскриптум',
	'info_post_scriptum_2' => 'Постскриптум:',
	'info_pour' => 'за',
	'info_preview_admin' => 'Достъп до предварителния преглед имат само администраторите',
	'info_preview_comite' => 'Всички автори имат достъп до предварителния преглед',
	'info_preview_desactive' => 'Изключване на функцията "предварителен достъп"',
	'info_preview_texte' => 'Възможно е да се прави предварителен преглед на сайта все едно, че всички статии и новини (които имат статус "изпратени") са вече публикувани. Да бъде ли даден достъп към тази функция на администраторите само, да бъде ли възможна за всички автори на сайта или да бъде изключена напълно?',
	'info_principaux_correspondants' => 'Вашите основни кореспонденти',
	'info_procedez_par_etape' => 'моля, продължете напред стъпка по стъпка',
	'info_procedure_maj_version' => 'процедурата по обновяване трябва да се стартира,
 за да може базата данни да се адаптира към новата версия на СПИП.',
	'info_ps' => 'П.С. ',
	'info_publier' => 'публикуване',
	'info_publies' => 'Вашите публикувани статии',
	'info_question_accepter_visiteurs' => 'Ако шаблоните на сайта Ви позволяват посетителите да се регистират без да влизат в личната зона, активирайте следната опция:',
	'info_question_inscription_nouveaux_redacteurs' => 'Позволявате ли регистрацията на нови редактори от
  публикувания сайт. Ако сте съгласни, посетителите трябва да се
  регистрират през автоматичната форма, за да имат достъп до личната зона и
  да предложат свои собствени статии. <blockquote><i>По време на регистрацията
  потребителите получават автоматично
  съобщение с код за достъп до личната зона. Някои
  доставчици спират съобщения, изпратени
  до техни сървъри: в този случай автоматичната регистрация
  не би могла да се осъществи.', # MODIF
	'info_question_utilisation_moteur_recherche' => 'Желаете ли да използвате търсещата машина под СПИП?
 (при отказване действието й увеличавате скоростта на действие на системата.)',
	'info_qui_edite' => '@nom_auteur_modif@ a travaillé sur ce contenu il y a @date_diff@ minutes', # MODIF
	'info_racine_site' => 'Схема на сайта',
	'info_recharger_page' => 'Моля, презаредете страницата след малко.',
	'info_recherche_auteur_a_affiner' => 'Твърде много намерени резултати за @cherche_auteur@; моля, прецизирайте търсенето си.',
	'info_recherche_auteur_ok' => 'Бяха намерени няколко редактора за @cherche_auteur@:',
	'info_recherche_auteur_zero' => 'Няма намерени резултати за @cherche_auteur@.',
	'info_recommencer' => 'Моля, опитайте отново.',
	'info_redacteur_1' => 'Редактор',
	'info_redacteur_2' => 'достъп до личната зона(<i>препоръчително</i>)',
	'info_redacteurs' => 'Редактори',
	'info_redaction_en_cours' => 'В ХОД Е ПИСАНЕ',
	'info_redirection' => 'Пренасочване',
	'info_refuses' => 'Вашите отхвърлени статии',
	'info_reglage_ldap' => 'Опции: <b>Приспособяване на вписването чрез LDAP</b>',
	'info_renvoi_article' => '<b>Пренасочване.</b> Статията се отнася към страница:',
	'info_reserve_admin' => 'Този адрес може да се променя само от администратори.',
	'info_restreindre_rubrique' => 'Забрана за управление на рубриката:',
	'info_resultat_recherche' => 'Намерени резултати:',
	'info_rubriques' => 'Рубрики',
	'info_rubriques_02' => 'рубрики',
	'info_rubriques_trouvees' => 'Намерени рубрики',
	'info_rubriques_trouvees_dans_texte' => 'Намерени рубрики (в текста)',
	'info_sans_titre' => 'Без заглавие',
	'info_selection_chemin_acces' => '<b>Изберете</b> по-долу път за достъп в директорията:',
	'info_signatures' => 'подписи',
	'info_site' => 'Сайт',
	'info_site_2' => 'сайт:',
	'info_site_min' => 'сайт',
	'info_site_reference_2' => 'Свързан сайт',
	'info_site_web' => 'ИНТЕРНЕТ САЙТ:', # MODIF
	'info_sites' => 'сайтове',
	'info_sites_lies_mot' => 'Свързани сайтове, асоциирани с ключовата дума',
	'info_sites_proxy' => 'Използване на прокси',
	'info_sites_trouves' => 'Намерени сайтове',
	'info_sites_trouves_dans_texte' => 'Намерени сайтове (в текста)',
	'info_sous_titre' => 'Подзаглавие:',
	'info_statut_administrateur' => 'Администратор',
	'info_statut_auteur' => 'Статус на автора:', # MODIF
	'info_statut_auteur_a_confirmer' => 'Регистрация, предстояща за потвърждение',
	'info_statut_auteur_autre' => 'Друг статус:',
	'info_statut_efface' => 'Изтрит',
	'info_statut_redacteur' => 'Редактор',
	'info_statut_utilisateurs_1' => 'Статус "по подразбиране" на вписаните потребители',
	'info_statut_utilisateurs_2' => 'Изберете статус за хората, вписани в LDAP-директорията при свързването им за първи път. По-късно ще можете да променяте тази характеристика за всеки автор по отделно.',
	'info_suivi_activite' => 'Дейности на редакторите',
	'info_surtitre' => 'Челно заглавие:',
	'info_syndication_integrale_1' => 'Сайтът Ви предлага файлове за обединение (вж <a href="@url@">@titre@</a>).',
	'info_syndication_integrale_2' => 'Желаете ли да изпратите цели статии или само резюме от няколко стотин знака?',
	'info_taille_maximale_vignette' => 'Максимален размер на винетките, който е генериран от системата:',
	'info_terminer_installation' => 'Сега можете да приключите с процеса по стандартна инсталация.',
	'info_texte' => 'Текст',
	'info_texte_explicatif' => 'Обяснителен текст',
	'info_texte_long' => '(текстът е прекалено дълъг: той ще се появи в няколко части, които ще бъдат събрани след одобрението.)',
	'info_texte_message' => 'Текст на съобщението:', # MODIF
	'info_texte_message_02' => 'Текст на съобщение',
	'info_titre' => 'Заглавие:',
	'info_total' => 'общо:',
	'info_tous_articles_en_redaction' => 'Всички статии в процес на обработка',
	'info_tous_articles_presents' => 'Всички статии в рубриката',
	'info_tous_les' => 'всички:',
	'info_tous_redacteurs' => 'Съобщения към всички редактори',
	'info_tout_site' => 'Целият сайт',
	'info_tout_site2' => 'Статията не е преведена на дадения език.',
	'info_tout_site3' => 'Статията е преведена на дадения език, но след това са направени промени в основната статия. Преводът изисква актуализация.',
	'info_tout_site4' => 'Статията е преведена на дадения език, а преводът - актуализиран.',
	'info_tout_site5' => 'Оригинална статия.',
	'info_tout_site6' => '<b>Предупреждение:</b> показани са само оригинални статии.
Преводите са свързани с оригинала в цвят, посочващ техния статус:',
	'info_travail_colaboratif' => 'Съвместна работа по статии',
	'info_un_article' => 'една статия,',
	'info_un_site' => 'сайт,',
	'info_une_rubrique' => 'рубрика,',
	'info_une_rubrique_02' => '1 рубрика',
	'info_url' => 'URL:',
	'info_url_site' => 'URL на сайта:',
	'info_urlref' => 'Препратка в хипертекст:',
	'info_utilisation_spip' => 'СПИП вече е готов за използване.',
	'info_visites_par_mois' => 'Месечен дисплей:',
	'info_visiteur_1' => 'Посетител',
	'info_visiteur_2' => 'публичен сайт',
	'info_visiteurs' => 'Посетители',
	'info_visiteurs_02' => 'Посетители на публичния сайт',
	'install_echec_annonce' => 'Инсталацията Ви вероятно няма да проработи или сайтът, който правите ще даде лош резултат...',
	'install_extension_mbstring' => 'СПИП не работи с:',
	'install_extension_php_obligatoire' => 'СПИП изисква разширение от типа php:',
	'install_select_langue' => 'Изберете език и след това натиснете бутон по-нататък, за да стартирате процедурата по инсталацията.',
	'intem_redacteur' => 'редактор',
	'item_accepter_inscriptions' => 'Позволяване на регистрации',
	'item_activer_messages_avertissement' => 'Активиране на предупредителни съобщения',
	'item_administrateur_2' => 'администратор',
	'item_afficher_calendrier' => 'Показване в календара',
	'item_autoriser_documents_joints' => 'Одобряване на документи, прикрепени към статии',
	'item_autoriser_documents_joints_rubriques' => 'Одобряване на документи в рубриките',
	'item_autoriser_syndication_integrale' => 'Включване на цели статии във файловете за обединяване',
	'item_choix_administrateurs' => 'администратори',
	'item_choix_generation_miniature' => 'Автоматично генериране на умалени образи.',
	'item_choix_non_generation_miniature' => 'Без генериране на умалени образи.',
	'item_choix_redacteurs' => 'редактори',
	'item_choix_visiteurs' => 'посетители на публичния сайт',
	'item_creer_fichiers_authent' => 'Създаване на файлове от типа .htpasswd',
	'item_limiter_recherche' => 'Ограничаване търсенето на информация, съдържаща се само във Вашия сайт',
	'item_login' => 'Потребителско име',
	'item_mots_cles_association_articles' => 'статиите',
	'item_mots_cles_association_rubriques' => 'рубриките',
	'item_mots_cles_association_sites' => 'свързаните или обединени сайтове.',
	'item_non' => 'Не',
	'item_non_accepter_inscriptions' => 'Забрана на регистрации',
	'item_non_activer_messages_avertissement' => 'Без предупредителни съобщения',
	'item_non_afficher_calendrier' => 'Без показване в календара',
	'item_non_autoriser_documents_joints' => 'Забрана за одобряване на документи в статии',
	'item_non_autoriser_documents_joints_rubriques' => 'Забрана за одобряване на документи в рубриките',
	'item_non_autoriser_syndication_integrale' => 'Изпращане на резюме',
	'item_non_creer_fichiers_authent' => 'Забрана за създаване на файловете',
	'item_non_gerer_statistiques' => 'Без управление на статистиката',
	'item_non_limiter_recherche' => 'Разширяване на търсенето в текстове от свързаните сайтове',
	'item_non_publier_articles' => 'Забраняване публикуването на статии преди техните дати на публикуване.',
	'item_non_utiliser_moteur_recherche' => 'Без търсачка',
	'item_nouvel_auteur' => 'Нов автор',
	'item_nouvelle_rubrique' => 'Нова рубрика',
	'item_oui' => 'Да',
	'item_publier_articles' => 'Публикуване на статиите независимо от техните дати на публикуване.',
	'item_reponse_article' => 'Отговор на статията',
	'item_utiliser_moteur_recherche' => 'Използване на търсачката',
	'item_visiteur' => 'посетител',

	// J
	'jour_non_connu_nc' => 'непознат',

	// L
	'lien_ajout_destinataire' => 'Добавяне на получателя',
	'lien_ajouter_auteur' => 'Добавяне на автора',
	'lien_ajouter_participant' => 'Добавяне на участник',
	'lien_email' => 'Електронен адрес',
	'lien_nom_site' => 'ИМЕ НА САЙТА:',
	'lien_retirer_auteur' => 'Премахване на автор',
	'lien_retrait_particpant' => 'премахване на участника',
	'lien_site' => 'сайт',
	'lien_supprimer_rubrique' => 'изтриване на рубриката',
	'lien_tout_deplier' => 'Разширяване на всички',
	'lien_tout_replier' => 'Разтваряне на всички',
	'lien_trier_nom' => 'Подреждане по име',
	'lien_trier_nombre_articles' => 'Подреждане по номер на статията',
	'lien_trier_statut' => 'Подреждане по статус',
	'lien_voir_en_ligne' => 'ИЗГЛЕД НА САЙТА:',
	'logo_article' => 'ЛОГО НА СТАТИЯТА', # MODIF
	'logo_auteur' => 'ЛОГО НА АВТОРА', # MODIF
	'logo_rubrique' => 'ЛОГО НА РУБРИКАТА', # MODIF
	'logo_site' => 'ЛОГО НА САЙТА', # MODIF
	'logo_standard_rubrique' => 'СТАНДАРТНО ЛОГО ЗА РУБРИКИ', # MODIF
	'logo_survol' => 'АЛТЕРНАТИВНО ЛОГО', # MODIF

	// M
	'menu_aide_installation_choix_base' => 'Избор на база данни',
	'module_fichier_langue' => 'Езиков файл',
	'module_raccourci' => 'Кратка команда',
	'module_texte_affiche' => 'Показан текст',
	'module_texte_explicatif' => 'Можете да впишете следните кратки команди в шаблоните на сайта си. Те ще бъдат автоматично преведени на различни езици, за които има езиков файл.',
	'module_texte_traduction' => 'Езиковият файл ,, @module@ ’’ е достъпен на:',
	'mois_non_connu' => 'непознат',

	// O
	'onglet_repartition_actuelle' => 'сега',

	// P
	'plugin_etat_developpement' => 'в развитие',
	'plugin_etat_experimental' => 'експериментален',
	'plugin_etat_stable' => 'стабилен',
	'plugin_etat_test' => 'в процес на тестване',
	'plugins_liste' => 'Списък с плъгини',

	// R
	'repertoire_plugins' => 'Директория:',

	// S
	'statut_admin_restreint' => '(ограничен администратор)', # MODIF

	// T
	'taille_cache_image' => 'Изображенията, изчислени автоматично от СПИП (умалени изображения, заглавия, преобразени в графики, математически формули в TeX формат и др.) заемат общо @taille@ в директорията @dir@.',
	'taille_cache_infinie' => 'Този сайт няма фиксиран лимит за размера на <code>CACHE/</code> директорията.',
	'taille_cache_maxi' => 'СПИП се опитва да намали размера на данните в  <code>CACHE/</code> директорията до около  <b>@octets@</b>.',
	'taille_cache_octets' => 'Размерът на кеш-паметта в момента е @octets@.', # MODIF
	'taille_cache_vide' => 'Кеш-паметта е празна.',
	'taille_repertoire_cache' => 'Размер на кеш-паметта в момента',
	'text_article_propose_publication' => 'Изпратена е статия със заявка за публикуване. Не се колебайте да дадете мнението си за нея във форума, който е прикрепен към нея (най-долу на страницата).', # MODIF
	'texte_acces_ldap_anonyme_1' => 'Някои LDAP-сървъри не позволяват анонимен достъп. В такива случаи, за да можете да правите справка в директорията, трябва да използвате началното си потребителско име за достъп. Въпреки това, в повечето случаи можете да оставяте следните полета празни. ',
	'texte_admin_effacer_01' => 'Тази команда изтрива <i>цялото</i> съдържание в базата данни,
включително <i>всички</i> параметри за достъп за редактори и администратори. След нейното изпълнение, трябва
да се преинсталира СПИП, за да се създаде нова база данни и първи администраторски достъп.',
	'texte_adresse_annuaire_1' => '( Ако директорията Ви е инсталирана на същата машина, на която и Интернет сайта, вероятно е «localhost».)',
	'texte_ajout_auteur' => 'Следният автор бе добавен към статията:',
	'texte_annuaire_ldap_1' => 'Ако разполагате с достъп до (LDAP) директория, можете да я използвате, за да вписвате автоматично потребители в СПИП.',
	'texte_article_statut' => 'Статията е:',
	'texte_article_virtuel' => 'Виртуална статия',
	'texte_article_virtuel_reference' => '<b>Виртуална статия:</b> свързана статия на Вашия СПИП сайт, която се пренасочва към друг URL адрес. За да премахнете пренасочването, изтрийте горепосочения URL.',
	'texte_aucun_resultat_auteur' => 'Няма намерен разултат за @cherche_auteur@.',
	'texte_auteur_messagerie' => 'Сайт може продължително да следи списъка от свързани редактори, което позволява изпращането та съобщения в реално време (ако съобщението е забранено по-горе, тогава целият списък от редактори е забранен). Вие можете да решите да не се появявате в този списък (т.е. да сте невидим за останалите потребители).',
	'texte_auteur_messagerie_1' => 'Този сайт позволява обмен на съобщения и стартиране на форуми за лична дискусия сред участниците на сайта. Вие сами можете да избирате да не участвате в този диалог.',
	'texte_auteurs' => 'АВТОРИТЕ',
	'texte_choix_base_1' => 'Изберете база данни:',
	'texte_choix_base_2' => 'Сървърът SQL съдържа няколко бази данни.',
	'texte_choix_base_3' => '<b>Изберете</b> по-долу това, което доставчикът Ви e разрешил:',
	'texte_commande_vider_tables_indexation' => 'Използвайте тази команда, за да изпразните таблиците с индекси
   използвани от търсачката на СПИП. Това ще Ви позволи
   да спестите малко място на диска.',
	'texte_compresse_ou_non' => '(може да бъде или да не бъде компресиран)',
	'texte_compte_element' => '@count@ елемент',
	'texte_compte_elements' => '@count@ елементи',
	'texte_connexion_mysql' => 'Погледнете информацията, предоставена от доставчика Ви: ако доставчикът ви поддържа SQL, трябва да са дадени кодовете за връзка със сървъра SQL.', # MODIF
	'texte_contenu_article' => '(Съдържание на статията с няколко думи.)',
	'texte_contenu_articles' => 'Въз основа на оформлението на сайта Ви, може да решите
  да не използвате някои елементи на статиите.
  Използвайте този списък, за да изберете кои елементи искате да направите активни.',
	'texte_crash_base' => 'Ако Вашата база данни
   блокира, можете да се опитате да я поправите
   автоматично.',
	'texte_creer_rubrique' => 'Преди да пишете статии,<br /> трябва да създадете рубрика.',
	'texte_date_creation_article' => 'ДАТА НА СЪЗДАВАНЕ НА СТАТИЯТА:',
	'texte_date_publication_anterieure' => 'Дата на предишно публикуване:',
	'texte_date_publication_anterieure_nonaffichee' => 'Скриване датата на предишно публикуване.',
	'texte_date_publication_article' => 'ДАТА НА ПУБЛИКУВАНЕ В ИНТЕРНЕТ:',
	'texte_descriptif_petition' => 'Описание на молбите',
	'texte_descriptif_rapide' => 'Кратко описание',
	'texte_effacer_base' => 'Изтриване на базата данни СПИП',
	'texte_effacer_donnees_indexation' => 'Изтриване на данни с индекси',
	'texte_en_cours_validation' => 'Изпратени са следните статии със заявка за публикуване. Не се колебайте да дадете мнението си за тях във форума, който е прикрепен към тях. ', # MODIF
	'texte_enrichir_mise_a_jour' => 'Можете да обогатите външния вид на текста като използвате «Типографски кратки команди».',
	'texte_fichier_authent' => '<b>Да създаде ли СПИП специални  <tt>.htpasswd</tt>
  и <tt>.htpasswd-admin</tt> файлове в директорията@dossier@?</b><p>
  Тези файлове ще бъдат използвани за ограничаване достъпа на авторите
  и администраторите до други части на сайта
  (например, външна статистическа програма).<p>
  Ако не сте използвали такива файлове преди, можете да осигурите възможност
  за стойност "по подразбиране" (без 
  да се създават файлове).', # MODIF
	'texte_informations_personnelles_1' => 'Системата сега ще създаде личен достъп до сайта. ',
	'texte_informations_personnelles_2' => '(Забележка: ако това е преинсталация и достъпът Ви все още е активен, можете', # MODIF
	'texte_introductif_article' => '(Въведение към статията.)',
	'texte_jeu_caractere' => 'Препоръчваме да използвате на сайта универсална кодировка на знаците от азбуката (<tt>utf-8</tt>), за да може да се показва под формата на текст на всякакъв език. Никой от настоящите Интернет - навигатори нямат проблеми с нея. ',
	'texte_jeu_caractere_2' => 'N.B. Тази настройка няма да промени текста, който е вече запазен в базата от данни. ',
	'texte_jeu_caractere_3' => 'Настоящата кодировка на сайта е:',
	'texte_jeu_caractere_4' => 'Ако това не отговаря на ситуацията, която имате с данните си (например след възстановяване на базата от данни от архива) или ако <em>правите настройка на сайта си в момента</em> и желаете да използвате различна кодировка на символите, моля да обозначите кодировката тук:',
	'texte_jeu_caractere_conversion' => 'Забележка: Можете да да промените всичките текстове на сайта (статии, новини, форуми и др.) в кодировка на символите  <tt>utf-8</tt>. За целта, преминете към: <a href="@url@">страница за преобразуване в UTF-8</a>.',
	'texte_lien_hypertexte' => '(Ако съобщението се отнася до статия, публикувана в Интернет или до страница с повече информация, въведете заглавието на страницата и нейния уеб-адрес.)',
	'texte_login_ldap_1' => '(Оставете празно поле за потребител за анонимен достъп или попълнете пълния път за достъп, например «<tt>uid=smith, ou=users, dc=my-domain, dc=com</tt>».)',
	'texte_login_precaution' => 'Внимание! Това е потребителското име, с което в момента сте се свързали.
 Предпазливо използвайте формата ...',
	'texte_message_edit' => 'Внимание: това съобщение може да бъде променяно от всички администратори на сайта. То се чете от редакторите. Използвайте съобщенията само за подчертаване на важни за съществуването на сайта събития. ',
	'texte_mise_a_niveau_base_1' => 'СПИП файловете са актуализирани.
 Сега остава да обновите базата данни на
 сайта.',
	'texte_modifier_article' => 'Промяна на статията:',
	'texte_moteur_recherche_active' => '<b>Търсачката е активирана.</b> използвайте тази команда,
  ако желаете да направите бързо преиндексиране (например след
  възстановяване на архив). Забележете, че документите, коите са променени
  по стандартен начин (от интерфейса на СПИП) са индексирани
  отново автоматично: следователно тази команда върши работа само в изключителни обстоятелства.',
	'texte_moteur_recherche_non_active' => 'Търсачката не е активирана.',
	'texte_multilinguisme' => 'Ако желаете да боравите със статии на няколко езика с усложнена навигация, можете да добавите меню "избор на език" към статиите и/или към рубриките, в зависимост от организацията на сайта Ви.', # MODIF
	'texte_multilinguisme_trad' => 'Също така, можете да активирате система за управление на препратките към различните преводи на статията.', # MODIF
	'texte_non_compresse' => '<i>uncompressed</i> (сървърът ви не поддрържа това свойство)',
	'texte_nouveau_message' => 'Ново съобщение',
	'texte_nouvelle_version_spip_1' => 'Току-що инсталирахте нова версия на СПИП.',
	'texte_nouvelle_version_spip_2' => 'Тази нова версия налага по-сериозна от обикновената актуализация. Ако сте администратор на сайта, изтрийте файла <tt>inc_connect.php3</tt> от директория <tt>ecrire</tt> и стартирайте отново инсталацията, с цел да актуализирате параметрите на базата данни за връзка. <p>(NB: ако сте забравили параметрите на базата данни за връзка, погледнете следния файл <tt>inc_connect.php3</tt> преди да го изтриете).', # MODIF
	'texte_operation_echec' => 'Върнете се на предишната страница, за да изберете друга база или да създадете нова. Потвърдете информацията, изпратена от Вашия доставчик. ',
	'texte_plus_trois_car' => 'повече от 3 знака',
	'texte_plusieurs_articles' => 'Бяха намерени няколко автора за @cherche_auteur@:',
	'texte_port_annuaire' => '(Обичайната стойност е подходяща като цяло.)',
	'texte_presente_plugin' => 'На тази страница са указани наличните на сайта плъгини. Активирайте тези от тях, които Ви трябват, чрез отбелязване в съответната кутийка.',
	'texte_proposer_publication' => 'Когато напишете статията,<br /> можете да я изпратите за публикуване.',
	'texte_proxy' => 'В някои случаи (интранет, защитени мрежи и др.),
  е нужно да се използва <i>HTTP прокси</i>, за да се достигне до обединените сайтове.
  Ако има прокси, впишете адрес му отдолу по следния начин
  <tt><html>http://proxy:8080</html></tt>. По принцип,
  това поле се оставя празно.',
	'texte_publication_articles_post_dates' => 'Какво би трябвало да направи СПИП във връзка със статии,
  чиято публикация е зададена
  за бъдеща дата?',
	'texte_rappel_selection_champs' => '[Не забравяйте да изберете правилното поле.]',
	'texte_recalcul_page' => 'Ако желаете да
презаредите само една страница, по-добре направете това от публичната зона, като използвате « бутона "Презареждане" ».',
	'texte_recapitiule_liste_documents' => 'Тази страница обобщава списъка с документи, намиращи се из секциите. За да промените информацията в даден документ, преминете чрез препратката към страницата на неговата рубрика.',
	'texte_recuperer_base' => 'Поправка на базата данни',
	'texte_reference_mais_redirige' => 'свързана статия на Вашия СПИП сайт, но пренасочена към друг URL адрес.',
	'texte_requetes_echouent' => '<b>Когато някои SQL справки
  системно и без налична причина заочнат да се развалят, възможно е
  базата данни сама да
  го прави.</b>
  <p>SQL има на разположение едно свойство за поправки на таблиците си
  които случайно са развалени.
  Можете да опитате да упражните тази поправка;
  в случай, че това не стане, запазете копие на дисплея, който съдържа
  указания за това, което е развалено.
  <p>Ако проблемът все още е налице, обадете се
  на Вашия хост.', # MODIF
	'texte_selection_langue_principale' => 'Посочете по-долу основният език на сайта. За щастие, този избор не ограничава статиите Ви да бъдат написани на избран от Вас езит. Той позволявя да определите

<ul><li> формата по подразбиране на данните в публичния сайт</li>

<li> основата на типографските команди, която ще бъде използвана в СПИП за предоставянето на текста;</li>

<li> езикът, който се използва във формите на публичния сайт</li>

<li> езикът по подразбиране на данните в личната зона.</li></ul>',
	'texte_sous_titre' => 'Подзаглавие',
	'texte_statistiques_visites' => '(тъмни ивици: неделя / тъмна крива: средно развитие)',
	'texte_statut_attente_validation' => 'за одобрение',
	'texte_statut_publies' => 'публикувани на сайта',
	'texte_statut_refuses' => 'отхвърлени',
	'texte_suppression_fichiers' => 'Тази команда служи за изтриване на всички
 файлове в кеш-паметта на СПИП. Това позволява да се актуализират принудително всички страници, в
 случаи, когато са направени важни изменения в графиките или структурата на сайта.',
	'texte_sur_titre' => 'Челно заглавие',
	'texte_table_ok' => ' : тази таблица е добра.',
	'texte_tables_indexation_vides' => 'Таблиците с индекси на търсачката са празни.',
	'texte_tentative_recuperation' => 'Опит за поправка',
	'texte_tenter_reparation' => 'Опит за поправка на базата данни',
	'texte_test_proxy' => 'За да изпробвате дали работи проксито, впишете на това място
    URL-a на желана Интернет страница.',
	'texte_titre_02' => 'Тема:',
	'texte_titre_obligatoire' => '<b>Заглавие</b> [Задължително]',
	'texte_travail_article' => '@nom_auteur_modif@ е работил по статията преди @date_diff@ минути',
	'texte_travail_collaboratif' => 'Ако се случва често няколко редактора да
  работят по една и съща статия, системата
  може да покаже наскоро отваряните статии,
  с цел да избегнат едновременни промени.
  Тази операция е изключена по начало,
  с цел да не се показват излишни
  предупредителни съобщения.',
	'texte_trop_resultats_auteurs' => 'Твърде много намерени резултати за @cherche_auteur@; моля, прецизирайте търсенето.',
	'texte_unpack' => 'Изтегляне на най-новата версия',
	'texte_utilisation_moteur_syndiques' => 'При използване на търсачката, внедрена в СПИП, можете да търсите сайтове и статии, обединени по два начина. <br />- По-лесният е да търсите само в заглавията и описанията на статиите.<br />- Вторият начин, който е много по-ефективен, позволява на СПИП да търси в текста на свързаните сайтове. Ако свържете сайт към Вашия, СПИП ще търси в текста на съответния сайт.', # MODIF
	'texte_utilisation_moteur_syndiques_2' => 'Този метод кара СПИП често да посещава свързаните сайтове, които биха могли да предизвикат понижаване на представянето на собствения Ви сайт.',
	'texte_vide' => 'празно',
	'texte_vider_cache' => 'Изпразване на кеш-паметта',
	'titre_admin_effacer' => 'Техническа поддръжка',
	'titre_admin_tech' => 'Техническа поддръжка',
	'titre_admin_vider' => 'Техническа поддръжка',
	'titre_cadre_afficher_article' => 'Показване на статиите:',
	'titre_cadre_afficher_traductions' => 'Показване статуса на превод на следния език:',
	'titre_cadre_ajouter_auteur' => 'ДОБАВЯНЕ НА АВТОР:',
	'titre_cadre_interieur_rubrique' => 'В рубрика',
	'titre_cadre_numero_auteur' => 'НОМЕР НА АВТОРА',
	'titre_cadre_signature_obligatoire' => '<b>Подпис</b> [Задължителен]<br />',
	'titre_config_fonctions' => 'Конфигуриране на сайта',
	'titre_configuration' => 'Конфигуриране на сайта',
	'titre_connexion_ldap' => 'Възможности: <b>Вашата LDAP-връзка</b>',
	'titre_groupe_mots' => 'ГРУПА ОТ КЛЮЧОВИ ДУМИ:',
	'titre_langue_article' => 'ЕЗИК НА СТАТИЯТА', # MODIF
	'titre_langue_rubrique' => 'ЕЗИК НА РУБРИКАТА', # MODIF
	'titre_langue_trad_article' => 'ЕЗИК И ПРЕВОДИ НА СТАТИЯТА',
	'titre_les_articles' => 'СТАТИИ',
	'titre_naviguer_dans_le_site' => 'Търсене на сайта',
	'titre_nouvelle_rubrique' => 'Нова рубрика',
	'titre_numero_rubrique' => 'НОМЕР НА РУБРИКАТА:',
	'titre_page_admin_effacer' => 'Техническа поддръжка: изтриване на базата данни',
	'titre_page_articles_edit' => 'Промяна: @titre@',
	'titre_page_articles_page' => 'Статии',
	'titre_page_articles_tous' => 'Целият сайт',
	'titre_page_auteurs' => 'Посетители',
	'titre_page_calendrier' => 'Календар @nom_mois@ @annee@',
	'titre_page_config_contenu' => 'Конфигуриране на сайта',
	'titre_page_config_fonctions' => 'Конфигуриране на сайта',
	'titre_page_configuration' => 'Конфигуриране на сайта',
	'titre_page_controle_petition' => 'Допълнения на молбите',
	'titre_page_delete_all' => 'пълно и безвъзвратно изтриване',
	'titre_page_documents_liste' => 'Рубрика "документи"',
	'titre_page_index' => 'Лична зона',
	'titre_page_message_edit' => 'Писане на съобщение',
	'titre_page_messagerie' => 'Вашите съобщения',
	'titre_page_recherche' => 'Резултати от търсенето @recherche@',
	'titre_page_statistiques_referers' => 'Статистика (входящи препратки)',
	'titre_page_upgrade' => 'Актуализация на СПИП',
	'titre_publication_articles_post_dates' => 'Публикуване на статии с отминала дата',
	'titre_referencer_site' => 'Свързване на сайта:',
	'titre_rendez_vous' => 'СРЕЩИ:',
	'titre_reparation' => 'Поправка',
	'titre_suivi_petition' => 'Допълнения на молбите',
	'trad_article_inexistant' => 'Не съществува статия с такъв номер',
	'trad_article_traduction' => 'Всички версии на статията:',
	'trad_deja_traduit' => 'Статията е вече преведена',
	'trad_delier' => 'Отказ от свързване на статията с нейните преводи', # MODIF
	'trad_lier' => 'Статията е превод на статия номер ',
	'trad_new' => 'Писане на нов превод на статията', # MODIF

	// U
	'utf8_convert_erreur_orig' => 'Грешка: кодировката на символите @charset@ не се поддържа.',

	// V
	'version' => 'Версия:'
);

?>

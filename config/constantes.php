<?php
/**
* Chemin sur dossier racine du projet
*/
define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));
/**
* Chemin sur dossier src qui contient les controllers et les modeles
*/
define("PATH_SRC",ROOT."src".DIRECTORY_SEPARATOR);
/**
* Chemin sur dossier templates du projet
*/
define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);
/**
* Chemin sur data qui contient le fichier Json db.json
*/
define("PATH_DB",ROOT."data".DIRECTORY_SEPARATOR."db.json");
/**
* Requet GET et POST
*/
define("WEB_ROOT","http://localhost:8003");
//Cle d'erreurs
define("KEY_ERRORS","errors");
//cLE D'ACCE DE L'UTILISATEUR CONNECTE
define("KEY_USER_CONNECT","user-connect");
//Url charger les images Css
define("WEB_PUBLIC",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
define("PATH_UPLOADS",WEB_ROOT.'/public/uploads/');

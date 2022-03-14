<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['action'])){
        if($_GET['action']=="creer.question"){
            creer_question();
        }elseif($_REQUEST['action']=="liste.questions"){
            liste_questions();
        }
    }
}
function creer_question(){
    ob_start();
    require_once(PATH_VIEWS."question".DIRECTORY_SEPARATOR."creer.question.html.php");
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}
function liste_questions(){
    ob_start();
    $questions=json_to_array('questions');
    require_once(PATH_VIEWS."question".DIRECTORY_SEPARATOR."liste.question.html.php");
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}
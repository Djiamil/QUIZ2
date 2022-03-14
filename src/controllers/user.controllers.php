<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="inscription"){
                echo "Traiter le formulaire de connexion";
            }
        }
    }


    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_REQUEST['action'])){
            if(!is_connect()){
                header("location:".WEB_ROOT);
                exit();
            }
            if($_REQUEST['action']=="accueil"){
                if(is_admin()) {
                    lister_joueur();
                }else{
                    jeu();
                }    
            }elseif($_REQUEST['action']=="liste.joueur"){
                lister_joueur();
            }elseif($_REQUEST['action']=="creer.admin"){
                creer_admin();
            }
        }
    }

    function lister_joueur(){
        ob_start();
        $data=find_users("ROLE_JOUEUR");
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.joueur.html.php");
        $content_for_views=ob_get_clean();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
    function jeu(){
        ob_start();
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."jeu.html.php");
            $content_for_views=ob_get_clean();
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");

    }
    
   
    function creer_admin(){
        ob_start();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."inscription.html.php");
        $content_for_views=ob_get_clean();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
    
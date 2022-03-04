<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="connexion"){
                $login=$_POST['login'];
                $password=$_POST['password'];
                connexion($login,$password);
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="connexion"){
                require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            }elseif($_REQUEST['action']=="deconnexion"){
                logout();
            }elseif($_REQUEST['action']=="sincrire.au.jeu"){
                  
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."inscription.html.php");
            }  
        }else{
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
        }
    }

    // US1

    function connexion(string $login,string $password):void{
        $errors=[];
        champ_obligatoire('login',$login,$errors,"login obligatoire");
        if(count($errors)==0){
            valid_email('login',$login,$errors);
        }
        champ_obligatoire('password',$password,$errors);
         if(count($errors)==0){
            //  Appel d'une fonction du model
            $user=find_user_login_password($login,$password);
            if(count($user)!=0){
                // Utilisateur existe
                $_SESSION[KEY_USER_CONNECT]=$user;
                //?controler=user&action=acceuil
                header("location:".WEB_ROOT."?controller=user&action=accueil");
                 exit();
            }else{
                // Utilisateur nexiste pas
                $errors['connexion']="login ou mot de passe incorrect";
                $_SESSION['KEY_ERRORS']=$errors;
                 header("location:".WEB_ROOT);
                 exit();

            }

        }else{
            // Erreur de validation
            $_SESSION['KEY_ERRORS']=$errors;
            header("location:".WEB_ROOT);
            exit();
        }

    }
    function logout(){
        session_destroy();
        header("location:".WEB_ROOT);
        exit();
    }
    
<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="connexion"){
                $login=$_POST['login'];
                $password=$_POST['password'];
                connexion($login,$password);
            }elseif($_REQUEST['action']=="inscription"){
                extract($_POST);
                if (!is_connect()) {
                    inscription($alogin,$apassword);
                    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
                    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
                        echo "Bienvenue au jeu $aprenom";
?>    
                    <a href="<?=WEB_ROOT?>">Cliquez ici pour vous connecter</a>
<?php
                        echo "Connectez vous avec vore login $alogin et votre de passe $apassword";
                    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");    
                } else {
                    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
                    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");

                }
                
               
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="connexion"){
                require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            }elseif($_REQUEST['action']=="deconnexion"){
                logout();
            }elseif($_REQUEST['action']=="sincrire.pour.jouer"){
                require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
                require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."inscription.html.php");
                require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
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
        champ_obligatoire('password',$password,$errors,"password obligatoire");
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

    function inscription(string $login,string $password):void{
        $errors=[];
        champ_obligatoire('login',$login,$errors,"login obligatoire");
        if(count($errors)==0){
            valid_email('login',$login,$errors);
        }
        champ_obligatoire('password',$password,$errors,"password obligatoire");
        if(count($errors)==0){
        }else{
            $errors['inscription']="login ou mot de passe incorrect";
            $_SESSION['KEY_ERRORS']=$errors;
            header("location:".WEB_ROOT."?controller=securite&action=sincrire.pour.jouer");
                exit();
            }
        }
    
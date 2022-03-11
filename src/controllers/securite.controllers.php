<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="connexion"){
                    $login=$_POST['login'];
                    $password=$_POST['password'];
                    connexion($login,$password);
            }elseif($_REQUEST['action']=="inscription"){
                // extract($_POST);
                $tab=[];
                recuperer_donnees($tab);
                inscription($tab);
            
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

function inscription($tab):void{
    $errors=[];
    // valid_password() et valid_email() et conformite() et champ_valide()
    champ_obligatoire('aprenom',$tab['prenom'],$errors,"prenom obligatoire");
    champ_obligatoire('anom',$tab['nom'],$errors,"nom obligatoire");
    valid_email('alogin',$tab['login'],$errors);
    champ_obligatoire('alogin',$tab['login'],$errors,"login obligatoire");
    valid_password("apassword",$tab['password'],$errors,"password 1");
    valid_password("apassword2",$tab['password2'],$errors,"password 2");
    matched_passwords($tab['password'],$tab['password2'],'apassword2',$errors);
    login_already_exists($tab['login'],$errors,'alogin');
    
    if(count($errors)==0){
        // si pas d'erreur
        if(!is_connect()){
            recuperer_donnees($tab);
        }
        if(is_admin()){
            recuperer_donnees($tab,'ROLE_ADMIN',0);
        }
        // enregistrement
        $donnees_a_enregistrer=$tab;
        unset($tab['password2']);
        $data_json=array_to_json("users",$tab);
        file_put_contents(PATH_DB,$data_json);        
    }else{
        // Erreur de validation
        $_SESSION['KEY_ERRORS']=$errors;
        
        if(!is_connect()){
            header("location:".WEB_ROOT."?controller=securite&action=sincrire.pour.jouer");
            exit();
        }
        if(is_admin()){
            header("location:".WEB_ROOT."?controller=user&action=creer.admin");
            exit();
        }
    }
}
    
function recuperer_donnees(&$tab,$role=ROLE_JOUEUR,$score=15){
    extract($_POST);
    $tab['nom']=$anom;
    $tab['prenom']=$aprenom;
    $tab['login']=$alogin;
    $tab['password']=$apassword;
    $tab['password2']=$apassword2;
    $tab['role']=$role;
    $tab['score']=$score;
    $name=$_FILES['avatar']['name'];
    $name=$alogin;
    $pos = explode("@gmail.com",$name);
    // $pos = stripos($alogin,'@');
    $tempNam=$_FILES['avatar']['tmp_name'];
    $tempNam=$pos;
    var_dump($tempNam);die;
    // move_uploaded_file($tempNam,'',$name);
    
}
// inscription
function login_already_exists($login,&$errors,$key,$message='login already exists'){
    if(is_login_in_json_file($login)){
        $errors[$key]=$message;   
    }
}
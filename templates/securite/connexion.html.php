<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
if(isset($_SESSION['KEY_ERRORS'])){
    $errors=$_SESSION['KEY_ERRORS'];
    unset($_SESSION['KEY_ERRORS']);
}
?>
<div class="container">
        <div class="loginform" style="background-color:rgb(81,191,208);width:100%;">
            <h2>Login Form</h2>
            <h2 style="margin-right:1vw;">X</h2>
        </div>
        <form class="form" id="form" action="<?=WEB_ROOT?>" method="POST">
        <input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="connexion">
            <!-- <h2>Register With Us</h2> -->
            <div class="form-control">
                <?php if(isset($errors['connexion'])):?>
                    <p style="color:red"> <?= $errors['connexion']?><p>
                <?php endif ?>
                <div class="logologin"><img class="imglogin"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-password.png"?>"></div>
                <label for="login">Email</label>
                <input type="text" id="login" name="login"placeholder="Login">
                <small>Error message</small>
                <?php if(isset($errors['login'])):?>
                    <p style="color:red"> <?= $errors['login']?><p>
                    <?php endif ?>
            </div>
            <div class="form-control">
                <div class="logopass"><img class="imgpass"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-login.png"?>"></div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
                <small>Error message</small>
                <?php if(isset($errors['password'])):?>
                    <p style="color:red"> <?= $errors['password']?><p>
                <?php endif ?>
            </div>
            <div class="form-control" style="display:flex;align-items:center" >
                <input type="submit" value="Connexion" id="connexion">
                <a  id="aa" href="<?=WEB_ROOT."?controller=securite&action=sincrire.pour.jouer"?>" style="margin-left:7vw;" >S inscrire pour jouer ?</a>
            </div>
        
        </form>
    </div>
    <?php 
        require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
    ?>
<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
if(isset($_SESSION['KEY_ERRORS'])){
    $errors=$_SESSION['KEY_ERRORS'];
    unset($_SESSION['KEY_ERRORS']);
}
?>
<div class="container">
        <form class="form" id="form" action="<?=WEB_ROOT?>" method="POST">
        <input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="connexion">
            <!-- <h2>Register With Us</h2> -->
            <h2>Login Form</h2>

            <div class="form-control">
                <?php if(isset($errors['connexion'])):?>
                    <p style="color:red"> <?= $errors['connexion']?><p>
                <?php endif ?>
                <label for="login">Email</label>
                <input type="text" id="login" name="login"placeholder="Enter votre login">
                <small>Error message</small>
                <?php if(isset($errors['login'])):?>
                    <p style="color:red"> <?= $errors['login']?><p>
                    <?php endif ?>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password">
                <small>Error message</small>
                <?php if(isset($errors['password'])):?>
                    <p style="color:red"> <?= $errors['password']?><p>
                <?php endif ?>
            </div>
            <div>
                <input type="submit" value="Connexion" id="connexion">
                <a href="<?=WEB_ROOT."?controller=securite&action=sincrire.au.jeu"?>" >S inscrire pour jouer</a>
            </div>
        
        </form>
    </div>
    <?php 
        require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
    ?>
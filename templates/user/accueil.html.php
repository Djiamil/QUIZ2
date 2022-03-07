<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
?>

<div class="paramAsider">

        <div class="parametre">

            <div class="textparam">
                <h1 class="creerparam">CREER ET PARAMETRER VOS QUIZ</h1>
            </div>

            <div class="contButton">
                <button class="buttomDeconnexion"><a href="<?=WEB_ROOT."?controller=securite&action=deconnexion"?>" class="">Deconnexion</a></button>
            </div>

        </div>
        <div class="esiderInscrip">
            <div class="avaG">
                <div class="divGtop">
                    <div class="photoim"></div>
                    <div class="monNom">
                        <h1 class="h1Name">DJIAMIL</br>Mbaye Lo</h1>
                    </div>
                </div>
                <div class="divGbutton">
                    <ul class="myMenu">
                        <div class="questliste">
                             <?php if(is_admin()):?>
                                    <li class="listQuestion"><a href="<?=WEB_ROOT."?controller=user&action=liste.questions"?>" class="Question">Liste Questions</a></li>
                                    <img class="copy" src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-liste.png"?>">
                                </div>    
                                <div class="questliste">
                                    <li class="creerAdmin"><a href="<?=WEB_ROOT."?controller=user&action=creer.admin"?>" class="Admin">Creer Admin</a></li>
                                    <img class="plus" src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-ajout-active.png"?>">
                                </div> 
                                    <div class="questliste">
                                            <li class="listJoueur"><a href="<?=WEB_ROOT."?controller=user&action=liste.joueur"?>" class="lisJoueur">Liste joueurs</a></li>
                                            <img class="copyR" src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-liste-active.png"?>">
                                    </div> 
                                <div class="questliste">
                                    <li class="creerQuestion"><a href="<?=WEB_ROOT."?controller=user&action=creer.question"?>" class="CrQuestion">Créer Questions</a></li>
                                    <img class="plusR" src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-ajout-active.png"?>">
                             <?php endif ?>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="avaD">
                <div class="avaDG">
                    <?php
                        echo $content_for_views;
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php 
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>

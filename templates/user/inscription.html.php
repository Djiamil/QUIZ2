
<?php
    if(isset($_SESSION['KEY_ERRORS'])){
        $errors=$_SESSION['KEY_ERRORS'];
        unset($_SESSION['KEY_ERRORS']);
    }
?>

        <div class="containere">
                <form class="form" id="form_1" action="<?=WEB_ROOT?>" method="POST" enctype="multipart/form-data">
                    <h3>SINSCRIRE</h3>
                    <input type="hidden" name="controller" value="securite">
                    <input type="hidden" name="action" value="inscription">
                    <h4>Pour tester votre culture generale</h4>
                    <hr style="width:60%;">
                    <div class="form-controle">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="aprenom" placeholder="Aaaaa" name="aprenom">
                        <small>Error message</small>
                        <?php if(isset($errors['aprenom'])):?>
                         <p style="color:red"> <?= $errors['aprenom']?><p>
                        <?php endif ?>
                    </div>
                    <div class="form-controle">
                    <?php if(isset($errors['inscription'])):?>
                         <p style="color:red"> <?= $errors['inscription']?><p>
                    <?php endif ?>
                        <label for="nom">Nom</label>
                        <input type="text" id="anom" placeholder="BBBB" name="anom">
                        <small>Error message</small>
                        <?php if(isset($errors['anom'])):?>
                         <p style="color:red"> <?= $errors['anom']?><p>
                        <?php endif ?>
                    </div>
                    <div class="form-controle">
                        <label for="login">Login</label>
                        <input type="text" id="alogin" placeholder="aabaab" name="alogin">
                        <small>Error message</small>
                        <?php if(isset($errors['alogin'])):?>
                         <p style="color:red"> <?= $errors['alogin']?><p>
                        <?php endif ?>
                    </div>
                    <div class="form-controle">
                        <label for="password">Password</label>
                        <input type="password" id="apassword" placeholder="..........." name="apassword">
                        <small>Error message</small>
                        <?php if(isset($errors['apassword'])):?>
                             <p style="color:red"> <?= $errors['apassword']?><p>
                         <?php endif ?>
                    </div>
                    <div class="form-controle">
                        <label for="password2">Confirmer Password</label>
                        <input type="password" id="apassword2" placeholder="..........." name="apassword2">
                        <small>Error message</small>
                        <?php if(isset($errors['apassword2'])):?>
                             <p style="color:red"> <?= $errors['apassword2']?><p>
                         <?php endif ?>
                    </div>
                    <div style="display:flex; justify-content:space-between;">
                        <p>Avatar</p>
                        
                    </div>
                    <button type="submit">Creer compte</button>
                    <div class="mbaye">
                        <div class="coteimage" style="left: 5rem;"> 
                            <div>
                                <label for="avatar" id="tof"></label>
                                <input type="file"  id="avatar" name="avatar" value="avatar">
                            </div>
                        </div>
                        <h4>Avatar du joueur</h4>
                    </div>
                </form>    
                
        </div>

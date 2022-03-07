
    
        <div class="containere">
                <form class="form" id="form_1" action="<?=WEB_ROOT?>" method="POST">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="inscription">
                    <h3>S INSCRIRE</h3>
                    <h4>Pour tester votre culture generale</h4>
                    <hr style="width:100%;">
                    <div class="form-controle">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="aprenom" placeholder="Aaaaa">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="nom">Nom</label>
                        <input type="text" id="anom" placeholder="BBBB">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="login">Login</label>
                        <input type="text" id="alogin" placeholder="aabaab">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="password">Password</label>
                        <input type="password" id="apassword" placeholder="...........">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="password2">Confirmer Password</label>
                        <input type="password" id="apassword2" placeholder="...........">
                        <small>Error message</small>
                    </div>
                    <div style="display:flex; justify-content:space-between;">
                        <p>Avatar</p>
                        <input type="file"  id="avatar" name="avatar">
                    </div>
                    <button >Creer compte</button>
                </form>
                <div class="coteimage">
                    <div id="tof"></div>
                    <h4>Avatar du joueur</h4>
                </div>
        </div>


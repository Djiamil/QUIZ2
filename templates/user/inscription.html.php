<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
?>
    <div class="containereP">
        <div class="containere">
                <form class="form" id="form">
                    <!-- <h2>Register With Us</h2> -->
                    <h2>Join ODC Club</h2>
                    <div class="form-controle">
                        <label for="username">Username</label>
                        <input type="text" id="username" placeholder="Enter username">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="Enter email">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter password">
                        <small>Error message</small>
                    </div>
                    <div class="form-controle">
                        <label for="password2">Confirm password</label>
                        <input type="password" id="password2" placeholder="Confirm your password">
                        <small>Error message</small>
                    </div>
                    <button>Submit</button>
                </form>
            </div>
        <div class="coteimage"></div>
    </div>

<?php 
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>
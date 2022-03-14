<div class="letout">
    <h1 class="questionn">PARAMETREZ VOTRE QUESTIONS</h1>
    <div class="contQuestion">
        <form action="" class=""></form>
        <div class="areatext">
            <h1>Question</h1>
            <textarea name="texta" id="texta" class="aratextarea"></textarea>
        </div>
        <div class="nbrpoint">
            <h1>Nombre de points</h1>
            <button class="butonmoin">-</button>
            <label for="nobrepoint"></label>
            <input type="texte" name="nobrepoint" id="nobrepoint">
            <button class="butonmoin">+</button>
        </div>
        <div class="typereponse">
            <h1>Type de reponse</h1>
            <select name="pets" id="reptype">
                <h6>Donnez le type de repponse</h6>
                    <option value="Sinple">choix Simple</option>
                    <option value="Multiple">choix multiple</option>
                    <option value="texte">texte</option>
            </select>
            <button class="butretype">+</button>
        </div>
        <div class="choixreponse">
            <label for="choixrep">Reponse:</label>
            <input type="text" name="choixrep" id="choixrep">
            <input type="checkbox" name="checboxbox" id="checboxbox">
            <input type="radio" name="radion" id="radioradio">
            <img class="fasolide" src="<?= WEB_PUBLIC . "img" . DIRECTORY_SEPARATOR . "trash-can-solid.svg" ?>" alt="">
        </div>
        <button class="vaenregistrer"  id="vaenregistrer">Enregistrer</button>
    </div>
</div>
<?php 
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>
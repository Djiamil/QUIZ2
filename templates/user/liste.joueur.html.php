    <!-- <h4 class="listejjour">Liste des joueurs</h4> -->
   <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Score</th>
        </tr>
    <?php foreach ($data as $value):?>
         <tr>
            <td><?= $value['nom'] ?></td>
            <td ><?= $value['prenom'] ?></td>
            <td><?=$value['score']?>pts</td>
        </tr>
    <?php endforeach?>
    <button id="suivant">Suivant</button>
</table>




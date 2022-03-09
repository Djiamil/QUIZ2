<?php
$dataJson=file_get_contents(PATH_DB);
$data=json_decode($dataJson,true);
///Recuperationdes donnees du fichier
function json_to_array(string $key):array{
    $dataJson=file_get_contents(PATH_DB);
    $data=json_decode($dataJson,true);
    return $data[$key];
}

//Enregistrement et Mis a jour des donnees du fichier
function array_to_json(string $key,array $tab):string{
    $data_json=file_get_contents(PATH_DB);
    $data=json_decode($data_json,true);
    $dataArray[$key][]=$tab;
    $data_json=json_encode($dataArray);
    return  $data_json;
}    




    // <?php
    // $file = 'people.txt';
// Une nouvelle personne à ajouter
    // $person = "Jean Dupond\n";
// Ecrit le contenu dans le fichier, en utilisant le drapeau
// FILE_APPEND pour rajouter à la suite du fichier et
// LOCK_EX pour empêcher quiconque d'autre d'écrire dans le fichier
// en même temps
// file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
// 
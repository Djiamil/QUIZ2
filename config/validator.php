<?php

function champ_obligatoire(string $key,string $data,array &$errors,string $message="ce champ est obligatoire"){
    if(empty($data)){
            $errors[$key]=$message;
    }
}
function valid_email(string $key,string $data,array &$errors,string $message="email invalid"){
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
            $errors[$key]=$message;
    }
    
}

function valid_password(string $key,string $data,array &$errors,$cle,string $message="format invalide"){
    if(empty($data)){
        $errors[$key]=$cle." est obligatoire";
   }else{
       if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{6,}$/', $data)){
           $errors[$key]=$message;
        }
    }
}
function matched_passwords(string $password1,string $password2,string $key,array &$errors,string $message="passwords don't match"){
    if($password1!==$password2){
        $errors[$key]=$message;
    }
}
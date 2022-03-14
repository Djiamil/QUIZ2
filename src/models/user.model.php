<?php
function find_user_login_password(string $login,string $password):array{
    $users=json_to_array("users");
    foreach ($users as $user) {
          if( $user['login']==$login && $user['password']==$password)
               return $user;
     }
     return [];
}

function find_users(string $role):array{
     $users=json_to_array("users");
     $resulta=[];
     foreach ($users as $user){
          if($user['role']==$role){
               $resulta[]=$user;
          }
          
     }
     return $resulta;
}

function is_login_in_json_file(string $login):bool{
     $users=json_to_array("users");
     foreach ($users as $user){
          if($user['login']===$login){
               return true;
          } 
     }
     return false ;
}
// function liste_des_questions():array{
//      $questions=json_to_array("questions");
//      $tab=[];
//      foreach ($questions as $question){
//           $tab['question']=$question;
//      }
//      return $tab;
// }


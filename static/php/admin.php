<?php
session_start();

//include the database which also includes the settings
require_once('includes/database.inc.php');

function hash_pw($in){
    $options = [
        'cost' => 12,
    ];
    return password_hash($in, PASSWORD_BCRYPT, $options);
}

//Check if the login details are correct
if($_POST['user'] == UGUU_ADMIN_USER && hash_pw($_POST['pass']) == UGUU_ADMIN_PASS){
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
}else{
    echo 'wrong bitch!';
}

//function to delete file or delete it and blacklist
function delete_file($in, $opt){
    //Check if admin is logged in
    if(isset($_SESSION['valid'])){
    //Check if blacklist or not
    if(isset($opt)){

    }
  }
}
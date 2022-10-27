<?php
session_start();
if(isset($_POST['submit'])){
    $email =  $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $filename = '../storage/users.csv';
    $openFile = fopen($filename, 'r');

    while (!feof($openFile)){
        $user = fgetcsv($openFile);
        if ($email === $user[1] && $password === $user[2]){
            $_SESSION['username'] = $user[0];  
            header ('Location: ../dashboard.php');
            exit;
        }
    }
    fclose($openFile);
    header ('Location: ../forms/login.html');
    
   
}




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
    $data = fgetcsv($openFile);
    fclose($openFile);

   
    $user_name = $data[0];
    $user_email = $data[1];
    $user_password = $data[2];


    if ($email === $user_email && $password === $user_password){
                $_SESSION['username'] = $user_name;  
                header ('Location: ../dashboard.php');
                exit;
    }else {
        header ('Location: ../forms/login.html');
        exit;
    }
}




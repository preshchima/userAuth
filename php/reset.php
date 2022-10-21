<?php
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    $filename = '../storage/users.csv';
    $openFile = fopen($filename, 'r');
    $data = fgetcsv($openFile);

    fclose($openFile);
    
    $user_name = $data[0];
    $user_email = $data[1];
    $user_password = $data[2];

    //if it does, replace the password
    if ($email === $user_email){
        $openFile = fopen($filename, 'w');
        fputcsv($openFile, array($user_name, $email, $newpassword));
        fclose($openFile);
        echo "<h1>password reset successful</h1>"  . "<a href=\"../forms/login.html\">Login here</a>";
    }else {
        echo "User does not exist";
    }
}




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
    
while (!feof($openFile)){
    $user = fgetcsv($openFile);
    //if it does, replace the password
    if ($email === $user[1]){
       $user[2] = $newpassword;
        fclose($openFile);
        $openFile = fopen($filename, 'w');
        fputcsv($openFile, $user);
        fclose($openFile);

        echo "<h1>password reset successful</h1>"  . "<a href=\"../forms/login.html\">Login here</a>";
        exit;
    }
}
    fclose($openFile);
     echo "User does not exist";

}




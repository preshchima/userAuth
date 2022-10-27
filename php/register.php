<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $filename = '../storage/users.csv';
    // echo "OKAY";
    
if (userExists($email)){
    echo "<h1>User already exist</h1>";
}else {
    $openFile = fopen($filename, 'a');
    fputcsv($openFile, array($username, $email, $password));
    fclose($openFile);
    echo "<h1>User successfully registered</h1>" . "<a href=\"../forms/login.html\">Login here</a>";
}



}
function userExists($email){
    $filename = '../storage/users.csv';
    $openFile = fopen($filename, 'r');
    
    while (!feof($openFile)) {
        $user = fgetcsv($openFile);
        if ($user[1] == $email && $user != false) {
            return true;
        }
    }
    fclose($openFile);
    return false;
}





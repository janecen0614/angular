<?php
$conn = mysqli_connect("localhost", "root", "", "angularjs");

$array = json_decode(file_get_contents("php://input"));
if($aray){
    $username = mysqli_real_escape_string($conn,$array->username);
    $password = mysqli_real_escape_string($conn,$array->password);
    $btnName = $array->btnName;
    $adminuser="admin";
    $adminpass="administrator";
    if($btnName == "login"){
        $query = "select user,pass from signup";
        $result= mysqli_query($conn,$query);
        if($username==$adminuser && $password=$adminpass){
            echo"Login Successful";
        }
        while($r = mysqli_fetch_array($result)){
            $user=$r['user'];
            $pass=$r['pass'];
            if($username==$user && $password=$pass){
                echo"Login Successful";
                exit();
            }
        }
        if($username==$adminuser || $password=$adminpass){
            echo"Login Unsuccessful";
        }
    }
    if($btnNmae == "sign up"){
        $query = "Insert into signup(user,pass) values('$username', '$password')";
        if(mysqli_query($conn,$query2)){
            echo "Congratulations, your account has been successfully created.";
        }
        else{
            echo "Username already exists. Use different username";
        }
    }
}
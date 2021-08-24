<?php
include_once '../config/database.php';
include_once '../objects/user.php';
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
 
$user->name = $_POST['name'];
$user->email = $_POST['email'];
$user->phone = $_POST['phone'];
$user->password = base64_encode($_POST['password']);
 
if($user->signup()){
    $user_arr=array(
        "success" => 1,
        "message" => 'Register Berhasil',
        "user" => $user,
    );
}
else{
    $user_arr=array(
        "success" => 0,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($user_arr));
?>
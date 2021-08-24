<?php
include_once '../config/database.php';
include_once '../objects/user.php';
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->email = isset($_POST['email']) ? $_POST['email'] : die();
$user->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());  
$stmt = $user->login();
if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_arr=array(
        "success" => 1,
        "message" => "Selamat Datang ". $user->email,
        'user' => $row
    );
}
else{
    $user_arr=array(

        "success" => 0,
        "message" => "Invalid Email or Password!",
    );
}
print_r(json_encode($user_arr));
?>
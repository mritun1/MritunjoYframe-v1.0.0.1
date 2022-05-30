<?php 
require_once('../auth.php');
require_once 'config/autoload.php';
require_once 'config/api_function.php';


$db = new DB();
//$db = new APP_CRUD_CRUD();

if($db->db() == true){
    echo 'Database Connected';
}else{
    echo 'Something went wrong';
}
echo '<br/>';


// $sql = "CREATE TABLE IF NOT EXISTS users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     fname VARCHAR(255),
//     lname VARCHAR(255),
//     email VARCHAR(255),
//     password VARCHAR(255),
//     token VARCHAR(255) NOT NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table cars created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }


?>
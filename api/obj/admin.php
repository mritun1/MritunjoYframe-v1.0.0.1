<?php 
class ADMIN{

    public static function getAllData(){
        //LISTS OF ALL DATA
        // $db = new DB();
        // $para = "SELECT * FROM Art ORDER BY id DESC";
        // return $db->GetDataJson($para);
        //echo APP_AUTH_ADMIN::login();
        
    }

    public static function getDataUsingId($id){
        //GET SINGLE DATA BY ID
        // $db = new DB();
        // $para = "SELECT * FROM Art WHERE id='".$id."' LIMIT 1";
        // return $db->GetDataJson($para);
    }

    public static function searchData_1($query){
        //GET SINGLE DATA BY ID
        
        // $db = new DB();
        // $para = "SELECT * FROM Art WHERE artist LIKE '%".$query."%'";
        // return $db->GetDataJson($para);
    }

    public static function searchData_2($query){
        // $db = new DB();
        // $para = "SELECT * FROM Art WHERE year<='2015' AND year>='2007'";
        // return $db->GetDataJson($para);
    }

    public static function insertData(){
        //INSERT DATA
        // $db = new DB();
        // $para = "INSERT INTO cars(car_name)
        //         VALUES('" . $_POST['car_name'] . "')";
        // return $db->InputData("Insert", $para);
    }

    public static function UpdateData($id){
        //UPDATE DATA BY ID
        // $db = new DB();
        // $para = "UPDATE cars SET 
        //         car_name='" . $_POST["car_name"] . "' 
        //         WHERE id='" . $id ."' LIMIT 1";
        // return $db->InputData("Update", $para);
    }

    public static function DeleteData($id){
        //DELETE DATA BY ID
        // $db = new DB();
        // $para = "DELETE FROM cars WHERE id='$id' LIMIT 1";
        // return $db->InputData("Delete", $para);
    }

    public static function Access(){

        $for = filter_input(INPUT_POST, 'for', FILTER_SANITIZE_STRING);

        if($for == 'Adminlogin'){
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = strip_tags($_POST['password']);
            echo json_encode(APP_AUTH_ADMIN::login($username,$password));
        }

        if($for == 'Adminlogout'){
            $message['code'] = '1';
            $message['status'] = 'Logout Success';
            session_destroy();
            echo json_encode($message);
        }

    }
}
?>
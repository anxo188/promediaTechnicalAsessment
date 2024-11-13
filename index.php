<?php



define("DB_HOST","localhost");
define("DB_USER","promedia");
define("DB_PASS","test");
define('DB_DNAME','promediaTechnicalAsessment');

//Function Defining
function connectDB(){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DNAME);
        if($mysqli->connect_error){
                error_log("Can't connect to db");
        }else{
                error_log("Connected");
        }


        return $mysqli;
}

//Para este caso saltaré las verificaciones de seguridad de los tipos de datos, entiendo
//que en este caso de prueba no son necesarias
function registerData($name, $email,$phone,$subject,$comments,$acknowledged){
        $sql = "INSERT INTO `Responses` ( `Name`,`Email`,`Phne`,`Subject`,`Comments`,`Acknowledged`) >        global $mysqli;
        if(!$mysqli->query($sql)){
        		error_log("Problem registering user");
                return false;
        }else{
                return true;
        }
}

//Main script body
session_start();
include './Front.html';
$mysqli = connectDB();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['acknowledged'] == "on"){
                $acknowledged = true;
        }else{
                $acknowledged = false;
        }
        registerData($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['subject'],$_POST['comments'],$acknowledged);
}


?>
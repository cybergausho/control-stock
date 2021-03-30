<?php
include("class/config.php");
include('class/Usuario.php');
//comprueba que exista sesion  - deberia incluirse en todas las pag
if (!empty($_SESSION['uid'])) {
    $session_uid = $_SESSION['uid'];
    $url = BASE_URL . 'home.php';
    header("Location: $url");
} else{


$userClass = new Usuario();

$errorMsgReg = '';
$errorMsgLogin = '';

/* INICIAR SESION */

if (!empty($_POST['loginSubmit'])) {
    $dni = $_POST['dni'];
    $password = $_POST['password'];
    //if (strlen(trim($dni)) > 1 && strlen(trim($password)) > 1) {
    $uid = $userClass->userLogin($dni, $password);
    echo "<p>" . $dni . $password . "</p>";
    if ($uid) {
        echo "<p>" . $dni . $password . "</p>";
        $url = BASE_URL . 'home.php';
        header('Location: ' . $url); // Redirigir a home.php 
    } else {
        $errorMsgLogin = "Error en las credenciales de acceso.";
    }
}


/* REGISTRARSE */

if (!empty($_POST['signupSubmit'])) {
    //echo "<p>hello world</p>";
    $dni = $_POST['dniForm'];
    $correo = $_POST['correoForm'];
    $password = $_POST['passwordForm'];
    $nombre = $_POST['nombreForm'];

    /* Regular expression check  - - - - -this have to be a function*/
    $dni_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $dni);
    $correo_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $correo);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{1,20}$~i', $password);
    //echo "<p> dni".$dni_check." correo ".$correo_check."psswd ".$password_check."</p>";
    if ($dni_check && $correo_check && $password_check && strlen(trim($nombre)) > 0) {
        $uid = $userClass->userRegistration($dni, $password, $correo, $nombre, 1);
        //echo "<p> holavarria vardump ".$uid." jojo</p>";

        if ($uid) {
            $url = BASE_URL . 'home.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $errorMsgReg = "El DNI o el correo de usuario ya existen.";
        }
    } else {
        echo "<p>goodbye world</p>";
    }
}


include_once("includes/login.php");
include("includes/registrar.php");

}


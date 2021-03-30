<?php
if (!empty($_SESSION['uid'])) {
    $session_uid = $_SESSION['uid'];
    include('class/Usuario.php');
    $userClass = new Usuario();
}
if (empty($session_uid)) {
    $url = BASE_URL . 'index.php';
    header("Location: $url");
}

?>

<?php
     /**
     * NIM : 2257401031
     * NAMA : SAHRU
     * KELAS MI22A
     */ 
    session_start();
    session_destroy();
    session_unset();

    header('location:login.php');
?>
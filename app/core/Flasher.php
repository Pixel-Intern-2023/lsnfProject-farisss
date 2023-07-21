<?php

class Flasher
{

    public static function setFlash($message, $type, $action)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type,
            'action' => $action
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
         
            echo '<script>';
            echo 'Swal.fire({';
            echo '    text: "'.  $_SESSION['flash']['action'] .'",';
            echo '    icon: "' . $_SESSION['flash']['type'] .'",';
            echo '    title: "' .$_SESSION['flash']['message']. '",';
            echo '});';
            echo '</script>';
        
            unset($_SESSION['flash']);
        }
    }
}

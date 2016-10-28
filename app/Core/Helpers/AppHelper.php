<?php
namespace App\Core\Helpers;

use Illuminate\Support\Facades\Request;

class AppHelper {
    static function showMessage($message)
    {
        $message = explode('|', $message);
        $typeMessage = $message[0];
        $messageText = $message[1];

        switch($typeMessage){
            case 'error': $typeMessage = '#ef5350 red lighten-1'; $icon = '<i class="material-icons">error</i>';
                break;
            case 'success': $typeMessage = '#a5d6a7 green lighten-3'; $icon = '<i class="material-icons">done</i>';
                break;
            case 'warning': $typeMessage = '#ef5350 red lighten-1'; $icon = '<i class="material-icons">warning</i>';
                break;
            default: $typeMessage = '#a5d6a7 green lighten-3'; $icon = '<i class="material-icons">info</i>';
                break;
        }

        echo '<div id="alertMessage" class="black-text ' . $typeMessage . '">' . $icon . '  ' . $messageText . '</div>';
    }

    static function showAlert($message){
        $message = explode('|', $message);
        $typeMessage = $message[0];
        $messageText = $message[1];

        switch($typeMessage){
            case 'error': $typeMessage = '#ef5350 red lighten-1'; $icon = '<i class="material-icons">error</i>';
                break;
            case 'success': $typeMessage = '#a5d6a7 green lighten-3'; $icon = '<i class="material-icons">done</i>';
                break;
            case 'warning': $typeMessage = '#ef5350 red lighten-1'; $icon = '<i class="material-icons">warning</i>';
                break;
            default: $typeMessage = '#a5d6a7 green lighten-3'; $icon = '<i class="material-icons">info</i>';
                break;
        }

        echo '<div class="toast '.$typeMessage.'"><i class="material-icons">'.$icon.'</i> '.$messageText.'</div>';
    }

    static function returnCurrentRoute()
    {
        return Request::route()->getName();
    }

    static function returnPrefixRoute()
    {
        return str_replace('admin/', '', Request::route()->getPrefix());
    }
}
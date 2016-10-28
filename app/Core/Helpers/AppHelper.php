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
            case 'error': $typeMessage = 'danger'; $icon = '<i class="fa fa-times"></i>';
                break;
            case 'success': $typeMessage = 'success'; $icon = '<i class="fa fa-check"></i>';
                break;
            case 'warning': $typeMessage = 'warning'; $icon = '<i class="fa fa-warning"></i>';
                break;
            default: $typeMessage = 'info'; $icon = '<i class="fa fa-info-circle"></i>';
                break;
        }

        echo '<div id="alertMessage" class="alert alert-' . $typeMessage . '">' . $icon . ' ' . $messageText . '</div>';
    }

    static function showAlert($message){
        $message = explode('|', $message);
        $typeMessage = $message[0];
        $messageText = $message[1];

        switch($typeMessage){
            case 'error': $typeMessage = 'danger'; $icon = '<i class=&quot;fa fa-times&quot;></i>';
                break;
            case 'success': $typeMessage = 'success'; $icon = '<i class=&quot;fa fa-check&quot;></i>';
                break;
            case 'warning': $typeMessage = 'warning'; $icon = '<i class=&quot;fa fa-warning&quot;></i>';
                break;
            default: $typeMessage = 'info'; $icon = '<i class=&quot;fa fa-info-circle&quot;></i>';
                break;
        }

        echo '<div data-toggle="notify" data-onload data-message="'.$icon.' '.$messageText.'"
            data-options="{&quot;status&quot;:&quot;'.$typeMessage.'&quot;, &quot;pos&quot;:&quot;top-right&quot;}" class="hidden-xs"></div>';
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
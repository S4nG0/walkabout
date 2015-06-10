<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('connecte')) {

    function connecte($user) {
        if($user == null){
            return false;
        }
        return true;
    }
}
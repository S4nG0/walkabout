<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('code')) {

    function code() {
        $characts = 'abcdefghijklmnopqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts .= '1234567890'; 
	$code_aleatoire = ''; 

	for($i=0;$i < 18;$i++)    //10 est le nombre de caractères
	{ 
            $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
	}
        
        return $code_aleatoire;
    }
}
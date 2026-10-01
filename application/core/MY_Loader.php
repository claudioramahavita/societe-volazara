<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    protected $CI;
    function __construct()
    {
        parent::__construct();
    }
    function getExtrait($contenu,$max=100,$min=0){
		$str=substr($contenu,$min,$max).'...';
		return $str;
        }
        function html_echape($string){
            if ($string) {
                //strip_tags($string);   enlever les balises
               // return htmlspecialchars($string);
                //ou || return htmlentities($string, ENT_QUOTES,'UTF-8',false);
    
                //permet d'enlever completement les balises : 
                return strip_tags($string);
    
            }
        }
}
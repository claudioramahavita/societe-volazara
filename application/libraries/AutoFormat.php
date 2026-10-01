<?php

class AutoFormat{

    private $CI;
    function __construct()
    {
        $this->CI=& get_instance();
    }
    function chiffre($v,$nbr_chf_virgule=2,$separateur_virgule=",",$separateur_nbr=" "){
      return  number_format($v,$nbr_chf_virgule,$separateur_virgule,$separateur_nbr);
    }
}

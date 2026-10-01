<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_produit extends My_Model
{   
      
     public function __construct() {
        parent::__construct($this);
    }

    function invent(){
$where="id_type_produit<>'brute' AND id_type_produit<>'budget'";
return $this->get_all_data($where);
    }

function appro(){
    $where="id_type_produit<>'brute' AND id_type_produit<>'budget'";
    return $this->get_all_data($where);
    }
    function budget(){
        $where="id_type_produit='budget'";
        return $this->get_single_data($where);
        }
        function brute(){
            $where="id_type_produit='brute'";
            return $this->get_single_data($where);
            }
function retir_stock(){
    $where="id_type_produit<>'brute' AND id_type_produit<>'budget'";
    return $this->get_all_data($where);
}
}
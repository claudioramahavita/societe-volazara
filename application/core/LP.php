<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LP
{
    public $frais;
    public $produits;
    public $nbr_caractere;
    public $CA;

    function __construct($prod=null)
    {
        $this->produits=$prod;
        if(!is_null($prod)){
            $this->init_();
        }
        
       
    }
    function init_(){
        $pu=$this->produits->prix_unitaire;
        $remise=$pu*$this->produits->remise/100;
        $PA=$pu- $remise;
        $tva=1+$this->produits->tax/100;
        $this->CA=$PA*$tva*$this->produits->qte;
        $this->nbr_caractere=$this->count_nbreCaractere($this->CA);
    
    }
   function get_ratio_frais(){
       return $this->frais/$this->produits->qte;
   }
    function count_nbreCaractere($in){
        $k=$in;
        if(is_float($in)){
            $k=ceil($k);
        }
        return strlen($k);
    }
    public function __sleep()
    {
        return array('frais', 'produits', 'nbr_caractere','CA');
    }
}
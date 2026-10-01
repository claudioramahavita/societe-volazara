<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Dataview{
    private $data=Array();
    public function setData(Array $data){
        $this->data=$data;
    }
    public function getData(){
        return $this->data;
    }
    
   
    public function toArray($arr=Array()){
        $i=array();
                foreach ($arr as $k => $v) {
                   preg_match("/([a-zA-Z]+[0-9]+)\_([a-zA-Z0-9_]+){1,}/i",$k,$match);
        $i[]=$match;
                }
                $data=Array();
                foreach ($i as $k=> $m) {
                    $key=$m[1];
                    $value=$m[0];//arr
                    $datakey=$m[2];
                    $data_toadd=Array("$datakey"=>$arr["$value"]);
                    if(array_key_exists("$key",$data)){
                        $data_toadd=$data["$key"]+$data_toadd;
                    }
                    $data["$key"]=$data_toadd;

                }
                return $data;
    
    }
}
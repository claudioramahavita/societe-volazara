<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produits extends My_Model
{   
    private $CI;
    public $where_not_in=null;
    public $item_where_not_in=null;
     public function __construct() {
        parent::__construct($this);
         $this->CI=&get_instance();
       $this->ordre='ASC';
    }
    
    public function search_prod($arg='',$where=null,$value=50,$offset=0){
        $arg=trim($arg);
        $r=explode(" ",$arg);
        $this->db->select('sous_type_produit.*');
        $this->db->select('type_produit.*');
        $this->db->select('produits.*');
        if(count($r)>0){
foreach($r as $k=>$v){
   // $this->db->like('cip_produits_interne', $v, 'after');
    $this->db->like('designation_produits', $v, 'both');
          }
        }else{
                $this->db->like('designation_produits', $arg, 'both');
        }
        if(!is_null($where)){
            $this->db->where($where);
        }
         $this->db->limit($value,$offset);
         $this->db->join('sous_type_produit', 'id_sous_type_produit = type_produit_id', 'left');
         $this->db->join('type_produit', 'type_prod_id = id_type_produit', 'left');
        $query=$this->db->get($this->table_name);
    return $query->result(); 
    }
    public function get_info($where=null,$group_by='id_produits',$order_by='designation_produits',$value=null,$offset=0){
        $this->db->flush_cache();//deletes all items from the Query Builder cache
        $this->db->select('COUNT(id_produits) as nbre_produit');
        $this->db->select('sous_type_produit.*');
        $this->db->select('type_produit.*');
        $this->db->select('produits.*');
        $this->db->select("DATE_FORMAT(produits_at, \"%d %b. %y \") as date_pub");
        $this->db->from($this->table_name);
        $this->db->join('sous_type_produit', 'id_sous_type_produit = type_produit_id', 'inner');
        $this->db->join('type_produit', 'type_prod_id = id_type_produit', 'inner');
        if(!(is_null($order_by))){
            $this->db->order_by($order_by,$this->ordre);
        }

        if(!is_null($where)){
            $this->db->where($where);
        }
        if(!is_null($this->where_not_in)&&!is_null($this->item_where_not_in)){
            $this->db->where_not_in($this->item_where_not_in,$this->where_not_in);
            
        }
        if(!is_null($value)&&!empty($value)){
            $this->db->limit($value,$offset);
        }
        if(!is_null($group_by)){
            $this->db->group_by($group_by);
        }
    
        $query=$this->db->get();
            if(isset($where['id_produits'])||is_null($group_by)){
                return $query->row();
            }
            return $query->result();
    }
}
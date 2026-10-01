<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sous_type_produit extends My_Model
{   
      
     public function __construct() {
        parent::__construct($this);
    }
    public function get_info($where=null,$group_by='id_sous_type_produit',$value=null,$offset=0){
        $this->db->flush_cache();//deletes all items from the Query Builder cache
        $this->db->select('COUNT(id_sous_type_produit) as nbre_sous_type_produit');
        $this->db->select('sous_type_produit.*');
        $this->db->select('type_produit.*');
    
        $this->db->from($this->table_name);
        $this->db->join('type_produit', 'type_prod_id = id_type_produit', 'inner');
    
        if(!is_null($where)){
            $this->db->where($where);
        }
        if(!is_null($value)){
            $this->db->limit($value,$offset);
        }
        if(!is_null($group_by)){
            $this->db->group_by($group_by);
        }
    
        $query=$this->db->get();
            if(isset($where['id_sous_type_produit'])||is_null($group_by)){
                return $query->row();
            }
            return $query->result();
    }

    
}
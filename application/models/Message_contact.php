<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_contact extends My_Model
{   
        
     public function __construct() {
        parent::__construct($this);
    }
   
   public function get_info($where=null,$group_by=null,$order_by=null,$ordre='DESC',$is_caount=false){
        $this->db->flush_cache();//deletes all items from the Query Builder cache
        $this->db->select($this->table_name.'.*');
      
		$this->db->select('visiteur.*');
		if($is_caount){
          $this->db->select('count(id_message_contact) as nbre_contact');
      }
		$this->db->from($this->table_name);
       
		$this->db->join('visiteur', 'visiteur.id_visiteur = messsage_contact.sender_id', 'inner');
        if(!is_null($group_by)){
          $this->db->group_by($group_by);
      }
	  
	   if(!is_null($order_by)){
          $this->db->order_by($order_by,$ordre);
      }
         if(!is_null($where)){
            $this->db->where($where);
            if(isset($where['id_message_contact'])&&$group_by=='id_message_contact'){
              $query=$this->db->get();
              return $query->row();
            }
        }
		if(is_null($group_by)&&$is_caount){
			$query=$this->db->get();
              return $query->row();
		}
      
        $query=$this->db->get();
        
        return $query->result();
      }
  
   
}
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Model extends CI_Model{
    protected $table_name;
    public $ordre='DESC';
    /**
     * $value (int) – Number of rows to limit the results to
     * $offset (int) – Number of rows to skip
     */
    public function getTable_name(){
return $this->table_name;
    }
    public function __construct($subclass) {
        parent::__construct();
        if(is_a($subclass,'My_Model')||(class_exists($subclass))||(is_object($subclass))){
            $this->table_name= strtolower(get_class($subclass));
           }elseif(is_string($subclass)){
        $this->table_name= $subclass;
       }
        
    }
  
    public function get_first_row($where=null,$order_by=null,$ordre='DESC',$group_by=null,$field=null,$match=null,$side='both',$value=null,$offset=0){
        $this->db->flush_cache();
        if(!(is_null($where))){
            $this->db->where($where);
        }
        if(!is_null($field)&&!is_null($match)){
            $this->db->like($field,$match,$side);
        }
        if(!(is_null($value))){
            $this->db->limit($value,$offset);
        }
        
        if(!(is_null($order_by))){
            $this->db->order_by($order_by,$ordre);
        }
        if(!(is_null($group_by))){
            if(is_array($group_by)){
                foreach ($group_by as $k => $v) {
                    $this->db->group_by($v);
                }
            }else{
                $this->db->group_by($group_by);
            }
            
        }

        $query= $this->db->get($this->table_name);
        return $query->first_row();
        
    }

    public function get_last_row($where=null,$order_by=null,$ordre='DESC',$group_by=null,$field=null,$match=null,$side='both',$value=null,$offset=0){
        $this->db->flush_cache();
        if(!(is_null($where))){
            $this->db->where($where);
        }
        if(!is_null($field)&&!is_null($match)){
            $this->db->like($field,$match,$side);
        }
        if(!(is_null($value))){
            $this->db->limit($value,$offset);
        }
        
        if(!(is_null($order_by))){
            $this->db->order_by($order_by,$ordre);
        }
        if(!(is_null($group_by))){
            if(is_array($group_by)){
                foreach ($group_by as $k => $v) {
                    $this->db->group_by($v);
                }
            }else{
                $this->db->group_by($group_by);
            }
            
        }
        $query= $this->db->get($this->table_name);
        return $query->last_row();        
    }



    public function multi_update_insert($data){
        $this->db->flush_cache();//deletes all items from the Query Builder cache
        $this->db->trans_start();
       $values='';
       $onupdate='';
       $listkey=null;
       $i=0;

    foreach ($data as $data_item) {
        
       
        $i+=1;
        if($i==1){
            $insert_query = $this->db->insert_string($this->table_name, $data_item);
            
            $fields=Array();
            foreach ($data_item as $k=>$v) {
                $fields[]=$k.'=VALUES('.$k.')';
                if($i==1){
                    $listkey[]=$k;
                }
            }
          
            $onupdate.=implode(',',$fields);
    
        }else{
           
            $fields=Array();
            foreach ($data_item as $k=>$v) {
                
                $fields[]=$k.'=VALUES('.$k.')';
                if($i==1){
                    $listkey[]=$k;
                }
            }
            $guillemet="guillemet";
            $values.=',('.$guillemet.implode("$guillemet,$guillemet",$data_item).$guillemet.')';
          
          
        }
           
        
    }
     //$values=trim($values,'"');
     $values=str_replace('"','\"',$values);
           
     $values=str_replace($guillemet,'"',$values);
      $str_v='""';
      $values=str_replace($str_v,"null",$values);
        //$onupdate.=','.implode(',',$fields);

    $insert_query.=$values;
    $insert_query.=' ON DUPLICATE KEY UPDATE '.$onupdate;


    $this->db->query($insert_query);
    $this->db->trans_complete();

    }

     public function multi_insert_update($data){
        $this->db->flush_cache();//deletes all items from the Query Builder cache
        $this->db->trans_start();
    foreach ($data as $data_item) {
        $insert_query = $this->db->insert_string($this->table_name, $data_item);
        $insert_query.=' ON DUPLICATE KEY UPDATE ';
        
        $fields=Array();
        foreach ($data_item as $k=>$v) {
            $fields[]=$k.'=VALUES('.$k.')';
        }
        $insert_query.=implode(',',$fields);
        
    }
    $this->db->query($insert_query);
    $this->db->trans_complete();
    }


    public function multi_insert($data = NULL){
        $id=Array();
            $this->db->flush_cache();//deletes all items from the Query Builder cache
            $this->db->trans_start();
        foreach ($data as $data_item) {
            $insert_query = $this->db->insert_string($this->table_name, $data_item);
            $this->db->query($insert_query);
            $id[]= $this->db->insert_id();
        }
        
        $this->db->trans_complete();
        return $id;
     }
     //obtenir propriete table=>type,name,..
     function get_fields(){
        return $this->db->field_data($this->table_name);
     }
    /* public function multi_insert_ignore($data = NULL){
        
        if(count($data)>100){
            $chunk=array_chunk($data,100);
            foreach($chunk as $k){
                $this->db->flush_cache();//deletes all items from the Query Builder cache
                $this->db->trans_start();
                $this->db->insert_ignore_batch($this->table_name, $k);
                $this->db->trans_complete();
            }
        }else{
            $this->db->insert_ignore_batch($this->table_name, $data);
        }
     }*/
   //  return nbre ligne modifier ou inserer ou update
   public  function get_affect_rows(){
        return $this->db->affected_rows();
     }
     public function get_comp_insert($reset=true){
       return $this->db->get_compiled_insert($this->table_name,$reset);
     }
     public function get_comp_select($reset=true){
         return $this->db->get_compiled_select($this->table_name,$reset);
     }
     public function get_comp_update($reset=true){
        return $this->db->get_compiled_update($this->table_name,$reset);
      }
      public function get_comp_delete($reset=true){
        return $this->db->get_compiled_delete($this->table_name,$reset);
      }

       public function multi_insert_ignore($data = NULL){

            $this->db->flush_cache();//deletes all items from the Query Builder cache
            $this->db->trans_start();
        foreach ($data as $data_item) {
            $insert_query = $this->db->insert_string($this->table_name, $data_item);
            $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
           $this->db->query($insert_query);
           
        }
        
     return $this->db->trans_complete();
      
     }
     public function multi_replace($data = NULL){
        $id=null;
        if(count($data)>100){
            $chunk=array_chunk($data,100);
            foreach($chunk as $k){
                $this->db->flush_cache();//deletes all items from the Query Builder cache
                $this->db->trans_start();
                $this->db->replace_batch($this->table_name, $k);
              $id[]=$this->db->trans_complete();
            }
        }else{
           $id= $this->db->replace_batch($this->table_name, $data);
        }
        return $id;
    }
     //$table, $set = NULL, $index = NULL, $batch_size = 100
     
    public function multi_update($data,$fields){
        $id=null;
        if(count($data)>100){
            $chunk=array_chunk($data,100);
            foreach($chunk as $k){
                $this->db->flush_cache();//deletes all items from the Query Builder cache
                $this->db->trans_start();
                $this->db->update_batch($this->table_name, $k,$fields);
               $id[]= $this->db->trans_complete();
            }
        }else{
           $id= $this->db->update_batch($this->table_name,$data,$fields); 
        }
        return $id;
     }
    

     public function insert_update($data){
        $insert_query = $this->db->insert_string($this->table_name, $data);
        $insert_query.=' ON DUPLICATE KEY UPDATE ';
        
        $fields=Array();
        foreach ($data as $k=>$v) {
            $fields[]=$k.'=VALUES('.$k.')';
        }
        $insert_query.=implode(',',$fields);

        /*if(is_array($fields)&&!empty($fields)){
        $insert_query.=' ON DUPLICATE KEY UPDATE ';
        $insert_query.=implode(',',$fields);
        }*/
        $this->db->query($insert_query);
        return $this->db->insert_id();
    } 

    
    //insertion
    public function insert_($data){
         $this->db->insert($this->table_name,$data);
         return $this->db->insert_id();
     }
    public function new_($data){
        $this->db->replace($this->table_name,$data);
        return $this->db->insert_id();
    }
    public function insert_ignore($data){
        $insert_query = $this->db->insert_string($this->table_name, $data);
        $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
        $this->db->query($insert_query);
        return $this->db->insert_id();
    } 
    public function debug_sql(){
      // return print_r( $this->db->last_query());
       return $this->db->last_query();
    }
    public function sql_error() {
       return $this->db->error();
    }
    //mis à jour
    public function update_($data,$where=null,$where_not_in=null,$item_where_not_in=null){
        $this->db->flush_cache();
        $this->db->set($data);
        if(!is_null($where)){
            $this->db->where($where);
                  }
        if(!is_null($where_not_in)&&!is_null($item_where_not_in)){
        
            $this->db->where_not_in($item_where_not_in,$where_not_in);
        }
      return  $this->db->update($this->table_name);        
       // return $this->db->affected_rows();
    }
    
     //mis à jour
     public function update_in($data,$where=null,$where_in=null,$item_where_in=null){
        $this->db->flush_cache();
        $this->db->set($data);
        if(!is_null($where)){
  $this->db->where($where);
        }
      
        if(!is_null($where_in)&&!is_null($item_where_in)){
        
            $this->db->where_in($item_where_in,$where_in);
        }
      return  $this->db->update($this->table_name);        
       // return $this->db->affected_rows();
    }


     //supression
    public function delete_($where){
       return $this->db->delete($this->table_name,$where);
    }

    public function delete_where_in($where_in=null,$item_where_in=null){
        $this->db->flush_cache();
        if(!is_null($where_in)&&!is_null($item_where_in)){
        
            $this->db->where_in($item_where_in,$where_in);
        }
        
        return $this->db->delete($this->table_name);
     }
     public function delete_where_not_in($where_not_in=null,$item_where_not_in=null){
        $this->db->flush_cache();
        if(!is_null($where_not_in)&&!is_null($item_where_not_in)){
        
            $this->db->where_not_in($item_where_not_in,$where_not_in);
        }
        
        return $this->db->delete($this->table_name);
     }

    //delete from table_name
    public function empty_(){
        return $this->db->empty_table($this->table_name);
    }
    public function truncate_(){
      return  $this->db->truncate($this->table_name);
    }
     //line
     public function get_nbr_line($where_other_opt=null){
         if (!is_null($where_other_opt)) {
             $this->db->where($where_other_opt);
             }
        return $this->db->count_all_results($this->table_name);
    }
    public function createView($sql=''){
        if(!empty($sql)){
            $sql="CREATE VIEW $this->table_name AS $sql";
            $query = $this->db->query($sql);
            return $query;
        }
        return false;
    }
/*
    public function checkView($view=null){
        if(is_null($view)){
           $view=$this->table_name; 
        }
        
        $this->db->select(1);
        $this->db->from("sys.views");
        $sql="Name='$view'";
        $this->db->where($sql);
        $query=$this->db->get(); 
        return $query->result();
    }*/
public function isTableExistes(){
    return $this->db->table_exists($this->table_name);
}
    public function createOrReplaceView($sql=''){
        if(!empty($sql)){
            $sql="CREATE OR REPLACE VIEW $this->table_name AS $sql";
            $query = $this->db->query($sql);
            return $query;
        }
        return false;
    }
       
    public function get_all_data($where=null,$order_by=null,$where_in=null,$item_where_in=null,$value=null,$offset=0){
        $this->db->flush_cache();
        if(!(is_null($where))){
            $this->db->where($where);
        }
        if(!is_null($where_in)&&!is_null($item_where_in)){
            $this->db->where_in($item_where_in,$where_in);
        }
        if(!(is_null($value))){
            $this->db->limit($value,$offset);
        }
        
        if(!(is_null($order_by))){
            $this->db->order_by($order_by,$this->ordre);
        }

        $query= $this->db->get($this->table_name);
        return $query->result();
    }
    public function get_distinct_data($value=null,$va=null,$offset=0){
        $this->db->flush_cache();
        if(!is_null($value)){
            $this->db->select("$value");
        }
        if(!(is_null($va))){
            $this->db->limit($va,$offset);
        }
        $this->db->distinct();
        $query=$this->db->get($this->table_name); // Produces: SELECT DISTINCT * FROM table
return $query->result();
    }
    
 
    public function get_single_data($where=null){
      
        if(!(is_null($where))){
            $this->db->where($where);
        }
        
         $query= $this->db->get($this->table_name);
        return $query->row();
    }
    
    //obtenir une information par utilisation de la fonction dans le serveur
    public function get_sqlBy($arg){
        $this->db->select($arg.' as resultat');
         $query= $this->db->get();         
        return $query->row()->resultat;
    }
    function get_date_diff($date1,$date2){
        $this->db->select("DATEDIFF('$date1', '$date2') as resultat");
        $query= $this->db->get();
       return $query->row()->resultat;
    }
    function get_timestamp_diff($date1,$date2,$tp='MINUTE'){
        $this->db->select("TIMESTAMPDIFF($tp,'$date1', '$date2') as resultat");
        $query= $this->db->get();
       return $query->row()->resultat;
    }
    function get_time_diff($date1,$date2){
        $this->db->select("TIMEDIFF('$date1', '$date2') as resultat");
        $query= $this->db->get();
       return $query->row()->resultat;
    }
    function getMinMaxTime($date1,$date2){
        $dat=$this->get_time_diff($date1,$date2);
        $data=new stdClass();
        if($dat>0){
            $data->min=$date2;
            $data->max=$date1;
        }else{
            $data->max=$date2;
            $data->min=$date1;
        }
        return $data;
    }
    function getMinMaxDate($date1,$date2){
        $dat=$this->get_date_diff($date1,$date2);
        $data=new stdClass();
        if($dat>0){
            $data->min=$date2;
            $data->max=$date1;
        }else{
            $data->max=$date2;
            $data->min=$date1;
        }
        return $data;
    }
  
	
	
	
}

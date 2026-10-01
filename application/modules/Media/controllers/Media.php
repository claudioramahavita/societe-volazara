<?php

class Media extends MY_Controller{
   public $base_url_file='http://localhost/restobar/';
    function __construct()
    {
        parent::__construct($this);
        $this->base_url_file=base_url();
    }
  
	
	//telechargement image et video des médias
	
	function upload_video_medias($fichier='video',$blog_id=null,$dosname='video'){
        
       
        if(!empty($_FILES[$fichier]['name'])){
        $dir1=dirname(APPPATH).DS.'uploads';
        $dir2=$dir1.DS.$dosname;
        $dir3=$dir2.DS.'medias';
        
            $dir4=$dir3.DS.$blog_id;
        
        if(!file_exists($dir1)) mkdir($dir1,0777);
        if(!file_exists($dir2)) mkdir($dir2,0777);
        if(!file_exists($dir3)) mkdir($dir3,0777);
        if(!file_exists($dir4)) mkdir($dir4,0777);
        move_uploaded_file($_FILES[$fichier]['tmp_name'],$dir4.DS.$_FILES[$fichier]['name']); 
return $_FILES[$fichier]['name'];
        }
    
    return null;
    }
	
	function get_url_file_medias_video($id,$name_file,$type='video'){

    $fichier= dirname(APPPATH).DS.'uploads'.DS.$type.DS.'medias'.DS.$id.DS.$name_file;
    
    
        return $this->base_url_file.'uploads/'.$type.'/medias/'.$id.'/'.$name_file;
   
    }
	
	

	
	
	
	function errors_img_import($name_file='photo',$onlyimg=true){
		$errors=[];
		if(isset($_FILES[$name_file]['name'])&&!empty($_FILES[$name_file]['name'])){
			if($_FILES[$name_file]['error']!==0){
				$errors[]="Erreur de telechargement de fichier!";
			}elseif($onlyimg&&strpos($_FILES[$name_file]['type'],'image')!==0){
				$errors[]="Le fichier n'est pas une image!";
			}
		}
		return $errors;
    }

   

    //telechargement photo de profil
    function upload_photo($fichier='photo',$perso_id=null,$dosname='photo',$type='user'){
        $err=$this->errors_img_import($fichier);
        if(count($err)==0){
        if(isset($_FILES[$fichier]['name'])&&!empty($_FILES[$fichier]['name'])){
        $dir1=dirname(APPPATH).DS.'uploads';
        $dir2=$dir1.DS.$dosname;
        $dir3=$dir2.DS.$type;
        if(is_null($perso_id)){
            $perso_id=$this->monsession->get_user_info()->id_user;
        }
        $dir4=$dir3.DS.$perso_id;
        if(!file_exists($dir1)) mkdir($dir1,0777);
        if(!file_exists($dir2)) mkdir($dir2,0777);
        if(!file_exists($dir3)) mkdir($dir3,0777);
        if(!file_exists($dir4)) mkdir($dir4,0777);
        $r=$_FILES[$fichier]['name'];
        $k=explode('.',$r);
        $n=count($k);
        $u=$k[$n-1];
        $file_name="$perso_id.$u";
        move_uploaded_file($_FILES[$fichier]['tmp_name'],$dir4.DS.$file_name); 
return $file_name;
        }
    }else{
        $this->monsession->send_flashMessage($err,'danger');
    }
    return null;
    }
    //info img user

	function get_url_file($id,$name_file,$type='photo',$type2='user',$default=false){
        $file=$this->base_url_file."uploads/$type/$type2/$id/$name_file";
 return $file;
           /* if($default||!file_exists($file)){
                return  base_url(USER_DEFAULT_IMG);
            }else{
           
        }*/
        }

	
    

    function get_logo($name_file){

        return $this->base_url_file.'uploads/logo/'.$name_file;
       
        }

    function upload_logo($fichier='logo'){
        $err=$this->errors_img_import($fichier);
        if(count($err)==0){
        if(!empty($_FILES[$fichier]['name'])){
        $dir1=dirname(APPPATH).DS.'uploads';
        $dir2=$dir1.DS.'logo';
        if(!file_exists($dir1)) mkdir($dir1,0777);
        if(!file_exists($dir2)) mkdir($dir2,0777);
        move_uploaded_file($_FILES[$fichier]['tmp_name'],$dir2.DS.$_FILES[$fichier]['name']); 
return $_FILES[$fichier]['name'];
        }
    }else{
        $this->monsession->send_flashMessage($err,'danger');
    }
    return null;
    }

   
    //info ordonnances
    function get_file($id_factures,$name_file,$type='ordonnances'){

        return $this->base_url_file.'uploads/'.$type.'/'.$id_factures.'/'.$name_file;
       
        }

}


    <!-- Main content -->
	 
	 <div style="background-color: rgb(0, 0, 0);" class="card card-body text-white ">
         
	
	
			
		 <h1><?php echo $visiteur->nom_visiteur.' '.$visiteur->prenom_visiteur?></h1>
			<p>email : <?php echo $visiteur->email_visiteur?> </p>
			
			<p>objet : <?php echo $messages->objet_contact?> </p>
				
                
                
                
                
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea disabled name="input_val[article]" id="c_message" cols="50" rows="6" class="form-control bg-dark" ><?php echo $messages->message_contact;?></textarea>
                  </div>
                
                
            
</div>																							
<!-- /.card -->







    <!-- Main content -->
	 
	 <div style="background-color: rgb(0, 0, 0);" class="card card-body text-white ">
         
	
	
			
		 <h1><?php echo $visiteur->nom_visiteur?></h1>
			<p>Email : <?php echo $visiteur->email_visiteur?> </p>
			<p>Blog : <?php echo $blog->titre?> </p>
				
                
                
                
                
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Commentaire </label>
                    <textarea disabled name="input_val[article]" id="c_message" cols="50" rows="6" class="form-control bg-dark" ><?php echo $commentaire->texte_commentaire;?></textarea>
                  </div>
                
                
            
</div>																							
<!-- /.card -->





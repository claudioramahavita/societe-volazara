
<div class="text-center" >
				<font color="#424242"><h1>Visiteurs </h1></font>
       </div>
    <!-- Main content -->
	 <div class="card card-dark card-outline card-outline-tabs">
              
              <div class="card-body">
				 <p align="right">
						
						<input class="form-control col-lg-3" type="search"  id="myInput" placeholder="recherche..." >
                        </p>

			   <table class="table table-responsive table-dark mb-0" id="tab" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="false" data-cookie="true"
																	data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                                    <thead>
                                        <tr class="text-center">
											
                                           <th scope="col" data-field="photo">#</th>
                                            <th scope="col" data-field="titre">Nom</th>
											<th scope="col" data-field="titre">Prénom</th>
                                            <th scope="col" data-field="titre">N° téléphone</th>
											<th scope="col" data-field="titre">Adresse email</th>
											
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($visiteur as $k=>$v):?>
									  
                                        <tr class="text-center"  onmouseover="this.style.backgroundColor='rgb(0, 0, 0)';this.style.cursor='pointer';"  onmouseout="this.style.backgroundColor='transparent';"  >
                                            
                                        <td><?php echo $v->id_visiteur;?></td>
                                            <td ><?php echo $v->nom_visiteur;?></td>
                                            <td ><?php echo $v->prenom_visiteur;?></td>
											<td ><?php echo $v->telephone_visiteur;?></td>
											<td ><?php echo $v->email_visiteur;?></td>
										
											
                                        </tr>
									   <?php endforeach;?>
                                        
                                    </tbody>
                                </table>

						</div>
</div>
<!-- /.card -->
</div>







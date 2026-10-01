
<div class="text-center" >
				<font color="#424242"><h1>Commentaires</h1></font>
       </div>
    <!-- Main content -->
	 <div class="card card-dark card-outline card-outline-tabs">
              
              <div class="card-body">
               <p align="right">
						
						<input class="form-control col-lg-3" type="search"  id="myInput" placeholder="recherche..." >
                        </p>
						<div id="tab_com">
							<?php $data['commentaire']=$commentaire;
								$this->load->view('view_com',$data) ?>
						</div>
				</div>
</div>
<!-- /.card -->
</div>







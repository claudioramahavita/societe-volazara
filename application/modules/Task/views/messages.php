
<div class="text-center" >
				<font color="#424242"><h1>Messages</h1></font>
       </div>
    <!-- Main content -->
	 <div class="card card-dark card-outline card-outline-tabs">
              
              <div class="card-body">
                <p align="right">
						
						<input class="form-control col-lg-3" type="search"  id="myInput" placeholder="recherche..." >
                        </p>
				<div id="tab_message">
				
					<?php $data['messages']=$messages;
					$this->load->view('view_msg',$data) ?>
				
				</div>
						</div>
</div>
<!-- /.card -->
</div>







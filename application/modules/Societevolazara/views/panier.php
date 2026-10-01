<main id="main">
  
<section id="hero2" class="d-flex align-items-center">
    
  </section>
  <?php echo $this->monsession->flashMessage()?>
<div class="container mb-4">
<!--<form action="<?=site_url('Task/addCmd')?>" autocapitalize="true" autocomplete="true" method="post" role="form" class="php-email-form mt-4">
--><form action="<?=site_url('Task/addCmd')?>" autocapitalize="true" autocomplete="true" method="post" role="form" class="mt-4">
<?php $this->load->view('formulaire_cmd');?>
              
     <?php $data['pr']=$this->OtherSession->get_other_info(SESSION_CMD);?>        
    <div class="row">

        <div class="col-12" id="list-panier">
       <?php $this->load->view('table_panier_cmd',$data);?>
        </div>
		
        <div class="col mb-2">
            <div class="row">
                
                <div class="col-sm-12 col-md-6 text-right">
                    <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Je commande</button>
                </div>
            </div>
        </div>
       
    </div> </form>
	
</div>
  </main><!-- End #main -->
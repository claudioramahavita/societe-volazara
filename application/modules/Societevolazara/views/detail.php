<?php
     $w['id_produits']=$this->uri->segment(3);
     $w['id_type_produit']='vary';
     $w['ispub']=1;
     $prod=$this->tab_produits->get_info($w);
     ?>
 
 <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>-</h2>
          <ol>
            <li><a href="<?=site_url('Societevolazara/')?>">Accueil</a></li>
            <?php if(!is_null($prod)):?>
            <li>Details <?=$prod->designation_produits;?></li>
            <?php endif;?>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
    
     <?php if(!is_null($prod)):?>
      <?php $this->load->view('portfolio_detail',array('v'=>$prod));?>
      <?php endif;?>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
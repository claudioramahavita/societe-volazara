<?php 
$this->media->base_url_file=EVIDY_URL;
?>
<div class="col-lg-4 col-md-6 portfolio-item filter-app<?=$v->id_sous_type_produit?>">
            <div class="portfolio-wrap">
              <img src="<?=$this->media->get_url_file($v->id_produits,$v->img_produit,'photo','produit',false)?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?=$v->designation_produits?></h4>
				<h4><?=$this->autoformat->chiffre($v->prix_unitaire_en_ligne,0)?> MGA</h4>
                
                <div class="portfolio-links">
                  <a href="<?=$this->media->get_url_file($v->id_produits,$v->img_produit,'photo','produit',false)?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="<?php echo site_url('Societevolazara/detail/'.$v->id_produits)?>" title="More Details"><i class="bx bx-link"></i></a>
				  
                </div>
				<a  onclick="addsess('<?=$v->id_produits?>')" class="text-light btn">Ajouter</a>
              </div>
            </div>
          </div>
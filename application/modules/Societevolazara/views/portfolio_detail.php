
<?php 
$this->media->base_url_file=EVIDY_URL;
?>


<div class="container">

<div class="row gy-4">

  <div class="col-lg-8">
    <div class="portfolio-details-slider swiper-container">
      <div class="swiper-wrapper align-items-center">

        <div class="swiper-slide">
          <img src="<?=$this->media->get_url_file($v->id_produits,$v->img_produit,'photo','produit',false)?>" alt="">
        </div>

        

      </div>
      
    </div>
    <h1 class="text-right"><?=$this->autoformat->chiffre($v->prix_unitaire_en_ligne,0)?> Mga</h1>
    <div class="col-sm-12 col-md-6 text-center">
            <button  onclick="addsess(<?=$v->id_produits?>)" class=" btn btn-lg btn-block btn-success text-uppercase">+ Ajouter</button>
        </div>
  </div>

  <div class="col-lg-4">
    <div class="portfolio-info">
      <h3>information <?=$v->designation_produits?></h3>
      <ul>
        <li><strong>Categorie</strong>: <?=$v->nom_sous_type?></li>
        <li><strong>Publié le </strong>: <?=$v->date_pub?></li>
      </ul>
    </div>
    <div class="portfolio-description">
      <h2><?=$v->designation_produits?></h2>
      <p>
      <?=$v->description?>
    </p>
    </div>
  </div>

</div>

</div>
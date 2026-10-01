<section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Nos produits</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">

              <li data-filter="*" class="filter-active">All</li>
              <?php $prod=$this->tab_sous_type_produit->get_info();?>
              <?php foreach($prod as $k=>$v):?>
              <li data-filter=".filter-app<?=$v->id_sous_type_produit?>"><?=$v->nom_sous_type?></li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php 
         $w['ispub']=1;
         $w['id_type_produit']='vary';
        $pro=$this->tab_produits->get_info($w);?>
              <?php foreach($pro as $k=>$v):?>
               
                <?php $data['v']=$v;
                $this->load->view('product_lst',$data);
                ?>

               <?php endforeach;?>
        </div>

      </div>
    </section>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
	  
        <img style="margin:40px;" src="<?php echo base_url()."assets/img/logo2.jpg" ;?>" width="95"  class="img-fluid" alt="">

        <nav id="navbar" class="navbar text-center">
          <ul>
            <li><a class="nav-link scrollto <?= $this->uri->segment(2)!="index"?:'active';?>" href="<?php echo site_url('Societevolazara/')?>">Accueil</a></li>
            <li><a class="nav-link scrollto" href="#about">à propos de nous</a></li>
            <li><a class="nav-link scrollto" href="#services">Nos Services</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Nos produits</a></li>
            
           
            <li><a class="nav-link scrollto" href="#contact">Nous-contactez</a></li>
			<li><div class="social-links text-center text-md-right pt-3 pt-md-0">
				<a target="_blank" href="https://web.facebook.com/steph.merl?refid=46&__xts__[0]=12.AbqlllrjFXVt8WK9e9oNdEnOVdDbhnSsFhgA1SWH-8nFOyitwAuDYILx5uMqSCqZJFKEdrCXcwASmhoeytqMDtBhpe1Xju-6rrienT-sPaENu2CIxb_bXZqbM9zMd4dJFfonJ9L4_y8daGfqFjqfVpWZZjSkRT3f3bjFoQtXYsZnr9xD44JYJYlwn-KEY5bw-cutaGqA4l6FWY7hH8w6ZDbX41Rv579MISRSVZ6aJ_vj9_FVY7WvgO4KHnDGtyYPqC4WELooSmcuRWnfJMFonzByKC42r_L13PwnLv3EQdr0Zv46y-mfDp-sqZ5hGODX-yCH0DuK8mYi5eHEVbFT5wcEoyuslIjx_VzF57LTxTN677kh5HA1pA8082uYV1QJqBSCdTBMYEhncJN7LgBpjNSwvOBV1nnmcp-jC9XlrLDPXF8-QRTLJzjmrkRvpkJ8D7I5bdRA9SzEXMwxEef72wWZsbs1_geXu5pgnH18FKGAnxB5fMaD8xfDr2mvexLWStnEfzcVMDSzNjC0z0W_2l2pAbXo7I2jfZWDk1XFxzrWl3QUsl1xEbHy3wAjX0zfN07K_N49dP1TFzp-Log8EZqLeKt8QuTD39YhLhH4dObz_dp_AobkmjUQO5NXUAXzfcA&_rdc=1&_rdr" class="facebook"><i class="bx bxl-facebook"></i></a>
			</div></li>
            <li><a  href="<?php echo site_url('Societevolazara/panier')?>"><img src="<?php echo base_url()."assets/img/panier.png" ;?>" width="95"  class="img-fluid" alt=""> <h2 class="text-dark" > (<span id="nbr-cmd"><?php $pr=$this->OtherSession->get_other_info(SESSION_CMD);
            echo count($pr)?></span>) </h2></a></li>
			
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header>
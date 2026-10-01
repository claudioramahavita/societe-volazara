<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<html lang="en">
<?php $this->load->view('header');?>
 <body>
  
  
  <!-- End Header -->
  <?php $this->load->view('top-bar-content');?> 
        <!-- header end -->
        <!-- main-slider start -->
		
       <?php $this->load->view($view_content);?>
        <!-- page-content end -->
        <!-- footer start -->
        <?php $this->load->view('footer');?>
      <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php $this->load->view('js-content');?>

</body>  

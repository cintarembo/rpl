<?php 
$this->load->view('layouts/public/headers');
$this->load->view('layouts/public/navigations');
?>
    <!-- Main Content -->
    <?php echo $content ?>
    <!-- .Main Content -->
    <div class="clearfix"></div>
<?php $this->load->view('layouts/public/footers'); ?>
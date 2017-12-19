<?php 
$this->load->view('layouts/public/headers');
$this->load->view('layouts/public/navigations');
$this->load->view('layouts/public/slider');
?>
    <!-- Main Content -->
    <section class="container">
        <?php echo $content ?>
    </section>
    <!-- .Main Content -->
    <div class="clearfix"></div>
<?php $this->load->view('layouts/public/footers'); ?>
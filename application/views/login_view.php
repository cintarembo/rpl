<?php 
    $this->load->view('layouts/public/headers');
?>
    <script src="<?php echo base_url()?>public/assets/js/topbar.min.js"></script>
    <!-- APP MAIN CONTENT -->
    <main class="container" id="container">    
        <?php echo $content ?>
    </main>
    <!-- APP END OF CONTENT -->
<?php $this->load->view('layouts/public/footers') ?>
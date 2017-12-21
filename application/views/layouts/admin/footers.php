        <!-- Footer -->
        <footer class="py-5 bg-light">
            <div class="container">
                <p class="m-0 text-center text-black">Copyright &copy; Your Website 2017</p>
            </div>
            <!-- /.container -->
        </footer>
        <!-- MAIN SCRIPT -->
        <script src="<?php echo base_url()?>public/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/js/pjax-api.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/js/qwest.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/js/vanilla-masker.min.js"></script>
        
        <script src="<?php echo base_url()?>public/assets/vendor/datepickerX/js/DatePickerX.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/vendor/timepicker/js/timepicker.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/vendor/file-upload/js/file-upload.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/vendor/alerty/js/alerty.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/vendor/datatables/js/vanilla-dataTables.min.js"></script>
        
        <script>
            
            /** Collapsed hamburger menu after navigation in mobile */
            const backtocollapsed = (e) => {
              let a = document.querySelector('.navbar-toggler');
              a.classList.remove('collapsed');
              let b = document.querySelector('#navbarSupportedContent');
              b.classList.remove('show');
              b.setAttribute('aria-expanded', false);
            }
             
            /** Initialize PJAX */
            var Pjax = require('pjax-api').Pjax;
            new Pjax({
              areas: [
                '#container'
              ]
            });

            /** Add Event when pjax is success */
            document.addEventListener('pjax:ready', function (e) {
              backtocollapsed();
            });

            /** Add Event when pjax send new request */
            document.addEventListener('pjax:content', function (e) {
              topbar.show();
            });

             /** DOM ready */
             window.onload = () => {
              topbar.hide();
              
              qwest.base =  '<?php echo base_url()?>';
            }
           
        </script>
    </body>
</html>
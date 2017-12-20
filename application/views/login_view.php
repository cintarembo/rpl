<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login </title>
      <link rel="stylesheet" href="<?php echo base_url()?>public/assets/vendor/bootstrap/css/bootstrap.min.css">
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="<?php echo base_url()?>public/assets/vendor/alerty/js/alerty.min.js"></script>
      <script>let base = '<?php echo base_url()?>';</script>
      </head>
  <body>

    <script src="<?php echo base_url()?>public/assets/js/topbar.min.js"></script>
    <!-- APP MAIN CONTENT -->
    <main class="container mt-5" id="container">    
        <?php echo $content ?>
    </main>
    <!-- APP END OF CONTENT -->
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
        
        <script>
             
            /** Initialize PJAX */
            var Pjax = require('pjax-api').Pjax;
            new Pjax({
              areas: [
                '#container'
              ]
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
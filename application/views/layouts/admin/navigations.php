<header class="myHeader" id="header">
      <!-- APP NAVIGATION -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" id="mainNavigation">
          <a class="navbar-brand" href="#">Logo Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()?>admin/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()?>admin/films">Films</a>
                  </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Film
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/films">Daftar Film</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/films/addfilms">Tambah Film Baru</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/films/genre">Genre</a>
                  </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>admin/member">Member</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url()?>admin/laporan">Laporan</a>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- END OF NAVIGATION -->
</header> 
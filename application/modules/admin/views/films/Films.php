
<!-- Page Heading -->
      <button class="btn btn-primary float-right" id="tambahFilm">Tambah Film</button>
      <h1 class="my-4">Daftar Film
      </h1>
      
      <div class="row grid">
        <?php if (!empty($film)): ?>
          <?php foreach ($film as $f): ?>
            <!-- Column Film -->
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
              <div class="card box-shadow">
                <a href="#">
                    <img class="card-img-top"
                      src="<?php echo UPLOADPATH.'255x220/'.$f->cover ?>" alt="<?php echo $f->judul?>">
                </a>
                <!-- Basic Informations -->
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $f->judul ?></a>
                  </h4>
                  <p class="card-text"><?php echo $f->sinopsis ?></p>
                  <small><i><?php echo 'Tanggal :'.$f->tanggal_tayang.'<br>Jam: '.$f->jam_tayang?></i></small>
                  <br>
                  <div class="btn-group float-right filters-button-group" role="group">
                    <button type="button" class="btn btn-sm btn-default edit-film" data-id="<?php echo $f->id_film ?>">Edit</button>    
                    <button type="button" class="btn btn-sm btn-danger delete-film" data-id="<?php echo $f->id_film ?>">Delete</button>
                  </div>
                </div>
                <!-- .Basic Informations -->
              </div>
            </div>
            <!-- .Column Film -->
          <?php endforeach;?>
        <?php else: ?>
        <p>Maaf, belum ada film yang tersedia.</p>
        <?php endif; ?>
      </div>
      <!-- /.row -->
      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

<script>
  topbar.hide();
  let a = document.getElementById('tambahFilm');
  a.addEventListener('click', function (e) {
      e.preventDefault();
      Pjax.assign('<?php echo base_url()?>admin/films/addFilms');
  });

<?php if(!empty($film)): ?>
  let b = document.getElementsByClassName('edit-film');
  for (const edit of b) {
    edit.addEventListener('click', function (e) {
      e.preventDefault();
      Pjax.assign('films/editFilms/'+this.getAttribute('data-id'));
    });
  }
  
  let c = document.getElementsByClassName('delete-film');
  for (const i of c) {
    i.addEventListener('click', function (e) {
      e.preventDefault();
      alerty.confirm('Yakin ingin menghapus film ini ?',{
        okLabel: 'Ya',
        cancelLabel: 'Tidak'
      }, (res)=>{
          /** Make AJAX Req */
          qwest.post('admin/films/delfilms',{
              id:this.getAttribute('data-id')
            })
           .then((res)=>{
            alerty.toasts('Berhasil menghapus film!',{
                    place:'top',  
                    bgColor: 'rgb(0, 202, 67)',
                    fontColor: '#fff' 
                },(res)=>{
                    Pjax.assign('<?php echo base_url()?>admin/films');
                });
           })
           .catch((err)=>{
            alerty.toasts('Terjadi kesalahan, ulangi lagi!',{
                    place:'top',  
                    bgColor: 'rgb(255, 46, 46)',
                    fontColor: '#fff' 
                },(res)=>{
                    Pjax.assign('<?php echo base_url()?>admin/films');
                });
           }); 
      });  
    });
  }
<?php endif;?>
</script>
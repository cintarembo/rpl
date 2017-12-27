<!-- Include Choices CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/choices/assets/styles/css/choices.min.css">
<!-- Include Choices JavaScript -->
<script src="<?php echo base_url(); ?>public/assets/vendor/choices/assets/scripts/dist/choices.min.js"></script>
<!-- Page Title -->
<button class="btn btn-warning float-right" id="kembali">Kembali</button>
<h1 class="my-4">Tambah Film Baru</h1>
<!-- Forms -->
<div class="row">
    <div class="col-md-8">
        <form action="javascript:;" enctype="multipart/form-data" id="formAddFilm" class="formAdd" name="formAddFilm">
            <div class="form-group">
                <label for="judul">Judul Film</label>
                <input type="text" class="form-control" id="judul-film" name="judul" aria-describedby="judul-film" placeholder="Masukkan judul film" required>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis Film</label>
                <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="7"></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal-tayang">Mulai Tayang</label>
                        <input type="text" class="form-control" id="mulai-tayang" name="mulai-tayang" placeholder="Masukkan tanggal mulai tayang" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal-tayang">Akhir Tayang</label>
                        <input type="text" class="form-control" id="selesai-tayang" name="selesai-tayang" placeholder="Masukkan tanggal akhir tayang" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="durasi">Durasi Film</label>
                        <input type="text" class="form-control" id="durasi-film" name="durasi-film" placeholder="Masukkan durasi film" value="0" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select class="form-control" name="genrefilm[]" id="genrefilm" placeholder="Silahkan pilih genre"
                            multiple>
                            <?php foreach ($genre as $s): ?>
                                <option value="<?php echo $s->id_genre; ?>"><?php echo $s->genre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="studio">Studio</label>
                        <select class="form-control" name="studio[]" id="studio" placeholder="Silahkan pilih studio"
                            multiple>
                            <?php foreach ($studio as $s): ?>
                                <option value="<?php echo $s->id; ?>"><?php echo $s->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="jam-tayang">Jam Tayang</label>
                        <select class="form-control" name="jam[]" id="jam" placeholder="Silahkan pilih jam tayang"
                            multiple>
                            <?php 
                                $a = 0;
                                $b = 0;
                                for ($i = 0; $i <= 23; ++$i) {
                                    for ($j = 0; $j <= 11; ++$j) {
                                        $zero = ($i < 10) ? '0' : '';
                                        $zero2 = ($a < 10) ? '0' : '';
                                        echo '<option value="'.$b.':'.$a.':00">'.$zero.''.$b.':'.$zero2.''.$a.':00</option>
                                        ';
                                        $a += 5;
                                    }
                                    if ($a = 55) {
                                        $a = 0;
                                    }
                                    ++$b;
                                }
                            ?>
                            <?php foreach ($jam as $s): ?>
                                <option value="<?php echo $s->id; ?>"><?php echo $s->jam; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="form-switch">
                        <input name="featured" type="checkbox">
                        <i></i>
                        Featured
                    </label>
                </div>
                <div class="col-md-3">
                <label class="form-switch">
                    <input name="status" type="checkbox">
                    <i></i>
                    Status
                </label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-file-container" data-upload-id="coverFilm">
                    <label for="cover">Cover Film <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <div class="custom-file-container__image-preview"></div>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="coverfilm" accept="*" multiple>
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                </div>   
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card">
                <img class="card-img-top"
                     src="">
            <!-- Basic Informations -->
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Sinopsis</p>
                <small><i>Tanggal & Jam</i></i></small>
            </div>
            <!-- .Basic Informations -->
        </div>
        <div class="film_preview"></div>
    </div>
</div>

<script type="text/javascript">
    /** Initialize file upload */
    new FileUploadWithPreview('coverFilm');

    document.getElementById('formAddFilm').onkeypress = (e) => {
        let a = e.target;
        let b = document.querySelector('.card-body');
        let c = b.children;

        setTimeout(() => {
            if(a.id=='judul-film'){
                c[0].innerHTML = a.value;
            }
        }, 20);
    }
    
    /** Get value from input */
    document.getElementById('formAddFilm').onsubmit = (e) => {
        e.preventDefault();
        let form = document.forms.namedItem("formAddFilm");
        let img = document.querySelector('#coverfilms');
        let a = new FormData(form);
        qwest.post('admin/films/addfilms',a)
             .then((res) => {
                let data = JSON.parse(res);
                if(data.status==true){
                    alerty.toasts(data.msg,{
                        place:'top',  
                        bgColor: 'rgb(0, 202, 67)',
                        fontColor: '#fff' 
                    },(res)=>{
                        //Pjax.assign('<?php echo base_url(); ?>admin/films');
                    });
                }else{
                    alerty.toasts(data.msg,{
                        place:'top',  
                        bgColor: 'red',
                        fontColor: '#fff' 
                    },(res)=>{
                    });
                }
             })
             .catch((err) => {
                alerty.toasts('Terjadi suatu kesalahan, silahkan periksa kembali',{
                    place:'top',  
                    bgColor: 'red',
                    fontColor: '#fff' 
                });
             })
    }

    document.getElementById('kembali').onclick = (e) => {
        e.preventDefault();
        Pjax.assign('<?php echo base_url(); ?>admin/films');
    }

    /**DatePicker and Timepicker*/
    let tgl = document.getElementById('mulai-tayang');
    let atgl = document.getElementById('selesai-tayang');
    tgl.DatePickerX.init({
        mondayFirst: true,
        minDate    : new Date(2017, 8, 13)
    });
    atgl.DatePickerX.init({
        mondayFirst: true,
        minDate    : new Date(2017, 8, 23)
    });

    timepicker.load({
        interval: 5,
        defaultHour: 7
    });


    VMasker(document.querySelector("#durasi-film")).maskMoney({
        precision: 0,
        delimiter: '.',
        suffixUnit: 'min',
    });


    topbar.hide();

    new Choices('#studio', {
        removeItemButton: true,
    });
    new Choices('#genrefilm', {
        removeItemButton: true,
    });
    new Choices('#jam', {
        removeItemButton: true,
    });

</script>
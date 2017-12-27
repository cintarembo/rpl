<!-- Include Choices CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/choices/assets/styles/css/choices.min.css">
<!-- Include Choices JavaScript -->
<script src="<?php echo base_url(); ?>public/assets/vendor/choices/assets/scripts/dist/choices.min.js"></script>
<!-- Page Title -->
<button class="btn btn-warning float-right" id="kembali">Kembali</button>
<h1 class="my-4">Edit Film <small><?php echo $data->film->judul; ?></small></h1>
<div class="row">
    <div class="col-md-8">
        <!-- Forms -->
        <form action="javascript:;" enctype="multipart/form-data" id="formAddFilm" class="formAdd" name="formAddFilm">
            <input type="hidden" name="id" value="<?php echo $data->film->id_film; ?>">
            <div class="form-group">
                <label for="judul">Judul Film</label>
                <input type="text" class="form-control" id="judul-film" name="judul" value="<?php echo $data->film->judul; ?>" placeholder="Masukkan judul film">
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis Film</label>
                <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="7"><?php echo $data->film->sinopsis; ?></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal-tayang">Mulai Tayang</label>
                        <input type="text" class="form-control" id="mulai-tayang" name="mulai-tayang" placeholder="Masukkan tanggal mulai tayang" value="<?php echo $data->film->mulai_tayang; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal-tayang">Akhir Tayang</label>
                        <input type="text" class="form-control" id="selesai-tayang" name="selesai-tayang" placeholder="Masukkan tanggal akhir tayang" value="<?php echo $data->film->selesai_tayang; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="durasi">Durasi Film</label>
                        <input type="text" class="form-control" id="durasi-film" name="durasi-film" placeholder="Masukkan durasi film" value="<?php echo $data->film->durasi; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select class="form-control" name="genrefilm[]" id="genrefilm" placeholder="Silahkan pilih genre"
                            multiple>
                            <?php 
                            $datagenre = $this->gfm->where('id_film', $data->film->id_film)->get_all();
                            foreach ($genre as $s) {
                                foreach ($datagenre as $dg) {
                                    $selected = ($dg->id_genre == $s->id_genre) ? 'selected' : '';
                                    echo '<option value="'.$s->id_genre.'" '.$selected.'>'.$s->genre.'</option>';
                                }
                            }?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="studio">Studio</label>
                        <select class="form-control" name="studio[]" id="studio" placeholder="Silahkan pilih studio"
                            multiple>
                            <?php
                            foreach ($studio as $a) {
                                if (!empty($data_studio)) {
                                    foreach ($data_studio as $ds) {
                                        $selected2 = ($ds->id_studio == $a->id) ? 'selected' : '';
                                        echo '<option value="'.$a->id.'" '.$selected2.'>'.$a->nama.'</option>';
                                    }
                                } else {
                                    echo '<option value="'.$a->id.'">'.$a->nama.'</option>';
                                }
                            }
                            ?>
                                
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="jam-tayang">Jam Tayang</label>
                        <select class="form-control" name="jam[]" id="jam" placeholder="Silahkan pilih jam tayang"
                            multiple>
                            <?php 
                                foreach ($jam as $j) {
                                    for ($i = 0; $i < count($data_jam); ++$i) {
                                        $sel = ($data_jam[$i]->id_jam == $j->id) ? 'selected' : '';
                                        echo '<option value="'.$j->id.'" '.$sel.'>'.$j->jam.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="form-switch">
                        <?php $featured = ($data->film->featured == 1) ? 'checked' : ''; ?>
                        <input name="featured" type="checkbox" <?php echo $featured; ?>>
                        <i></i>
                        Featured
                    </label>
                </div>
                <div class="col-md-3">
                <label class="form-switch">
                    <?php $status = ($data->film->status == 1) ? 'checked' : ''; ?>
                    <input name="status" type="checkbox" <?php echo $status; ?>>
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

<script>
    /** Initialize file upload */
    let upload = new FileUploadWithPreview('coverFilm');
    
    /** Attach already uploaded image */
    let a = document.querySelector('.custom-file-container__image-preview');
    a.style = 'background-image: url("<?php echo UPLOADPATH.'original/'.$data->film->cover; ?>")';
        
    /** Get value from input */
    document.getElementById('formAddFilm').onsubmit = (e) => {
        e.preventDefault();
        let form = document.forms.namedItem("formAddFilm");
        let data = new FormData(form);
        qwest.post('admin/films/editfilms',data)
             .then((res)=>{
                let data = JSON.parse(res);
                if(data.status==true){
                    alerty.toasts(data.msg,{
                        place:'top',  
                        bgColor: 'rgb(0, 202, 67)',
                        fontColor: '#fff' 
                    },(res)=>{
                        Pjax.assign('<?php echo base_url(); ?>admin/films');
                    });
                }else{
                    alerty.toasts(data.msg,{
                        place:'top',  
                        bgColor: 'red',
                        fontColor: '#fff' 
                    },(res)=>{
                        //Pjax.assign('<?php echo base_url(); ?>admin/films');
                    });
                }
             })
             .catch((err)=>{
                console.log(err);
             });
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
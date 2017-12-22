<!-- Page Title -->
<button class="btn btn-warning float-right" id="kembali">Kembali</button>
<h1 class="my-4">Edit Film <small><?php echo $data->film->judul ?></small></h1>
<div class="row">
    <div class="col-md-8">
        <!-- Forms -->
        <form action="javascript:;" enctype="multipart/form-data" id="formAddFilm" class="formAdd" name="formAddFilm">
            <input type="hidden" name="id" value="<?php echo $data->film->id_film ?>">
            <div class="form-group">
                <label for="judul">Judul Film</label>
                <input type="text" class="form-control" id="judul-film" name="judul" value="<?php echo $data->film->judul ?>" placeholder="Masukkan judul film">
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis Film</label>
                <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="7"><?php echo $data->film->sinopsis ?></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal-tayang">Tanggal Tayang</label>
                        <input type="text" class="form-control" id="tanggal-tayang" name="tanggal-tayang" value="<?php echo $data->film->tanggal_tayang ?>" placeholder="Masukkan tanggal tayang">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="jam-tayang">Jam Tayang</label>
                        <input type="text" class="form-control" data-toggle="timepicker" id="jam-tayang" name="jam-tayang" value="<?php echo $data->film->jam_tayang ?>" placeholder="Masukkan jam tayang">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="durasi">Durasi Film</label>
                        <input type="text" class="form-control" id="durasi-film" name="durasi-film" value="<?php echo $data->film->durasi ?>" placeholder="Masukkan durasi film">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="genrefilm">Genre</label>
                        <select name="genrefilm" id="genrefilm" class="form-control">
                            <?php foreach ($genre as $g): ?>
                                <?php $selected = ($g->id_genre==$data->id_genre) ? 'selected' : '' ; ?>
                                <option value="<?php echo $g->id_genre?>" <?php echo $selected?>><?php echo $g->genre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="harga">Harga Tiket</label>
                        <input type="text" class="form-control" id="harga-tiket" name="harga-tiket" value="<?php echo $data->film->harga ?>" placeholder="Masukkan harga tiket">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="studio">Studio</label>
                        <select name="studio" id="studio" class="form-control" required>
                            <?php foreach ($studio as $s): 
                                $studio = ($s->id==$data->film->id_hall)?>
                                <option value="<?php echo $s->id ?>" <?php echo $studio ?>><?php echo $s->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="form-switch">
                        <?php $featured = ($data->film->featured==1) ? 'checked' : '' ; ?>
                        <input name="featured" type="checkbox" <?php echo $featured ?>>
                        <i></i>
                        Featured
                    </label>
                </div>
                <div class="col-md-3">
                <label class="form-switch">
                    <?php $status = ($data->film->status==1) ? 'checked' : '' ; ?>
                    <input name="status" type="checkbox" <?php echo $status ?>>
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
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="coverFilm" accept="*" multiple>
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
    a.style = 'background-image: url("<?php echo UPLOADPATH.'original/'.$data->film->cover?>")';
        
    /** Get value from input */
    document.getElementById('formAddFilm').onsubmit = (e) => {
        e.preventDefault();
        let form = document.forms.namedItem("formAddFilm");
        let data = new FormData(form);
        qwest.post('admin/films/editfilms',data)
             .then((res)=>{
                console.log(res);
             })
             .catch((err)=>{
                console.log(err);
             });
    }

    document.getElementById('kembali').onclick = (e) => {
        e.preventDefault();
        Pjax.assign('<?php echo base_url()?>admin/films');
    }

    /**DatePicker and Timepicker*/
    let tgl = document.querySelector('.form-group [name="tanggal-tayang"]');
    tgl.DatePickerX.init({
        mondayFirst: true,
        minDate    : new Date(2017, 8, 13)
    });

    timepicker.load({
        interval: 5,
        defaultHour: 7
    });

    VMasker(document.querySelector("#harga-tiket")).maskMoney({
        precision: 0,
        separator: ',',
        delimiter: '.',
        unit: 'Rp',
    });

    VMasker(document.querySelector("#durasi-film")).maskMoney({
        precision: 0,
        delimiter: '.',
        suffixUnit: 'min',
    });

    topbar.hide();

</script>
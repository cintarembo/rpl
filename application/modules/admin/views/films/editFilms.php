<!-- Page Title -->
<button class="btn btn-warning float-right" id="kembali">Kembali</button>
<h1 class="my-4">Edit Film <small><?php echo $data->film->judul ?></small></h1>

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
    <div class="form-group">
        <select name="genrefilm" id="genrefilm" class="form-control">
            <?php foreach ($genre as $g): ?>
                <?php $selected = ($g->id_genre==$data->id_genre) ? 'selected' : '' ; ?>
                <option value="<?php echo $g->id_genre?>" <?php echo $selected?>><?php echo $g->genre ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal-tayang">Tanggal Tayang</label>
        <input type="text" class="form-control" id="tanggal-tayang" name="tanggal-tayang" value="<?php echo $data->film->tanggal_tayang ?>" placeholder="Masukkan tanggal tayang">
    </div>
    <div class="form-group">
        <label for="jam-tayang">Jam Tayang</label>
        <input type="text" class="form-control" data-toggle="timepicker" id="jam-tayang" name="jam-tayang" value="<?php echo $data->film->jam_tayang ?>" placeholder="Masukkan jam tayang">
    </div>
    <div class="form-group">
        <label for="durasi">Durasi Film</label>
        <input type="text" class="form-control" id="durasi-film" name="durasi-film" value="<?php echo $data->film->durasi ?>" placeholder="Masukkan durasi film">
    </div>
    <div class="form-group">
        <label for="harga">Harga Tiket</label>
        <input type="text" class="form-control" id="harga-tiket" name="harga-tiket" value="<?php echo $data->film->harga ?>" placeholder="Masukkan harga tiket">
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

    topbar.hide();

</script>
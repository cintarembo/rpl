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
            <div class="form-group">
                <select name="genrefilm" id="genrefilm" class="form-control" required>
                    <?php foreach ($genre as $g): ?>
                    <option value="<?php echo $g->id_genre ?>"><?php echo $g->genre?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal-tayang">Tanggal Tayang</label>
                <input type="text" class="form-control" data-validate-field="tanggal" id="tanggal-tayang" name="tanggal-tayang" placeholder="Masukkan tanggal tayang" required>
            </div>
            <div class="form-group">
                <label for="jam-tayang">Jam Tayang</label>
                <input type="text" class="form-control" data-validate-field="jam" data-toggle="timepicker" id="jam-tayang" name="jam-tayang" placeholder="Masukkan jam tayang" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi Film</label>
                <input type="text" class="form-control" data-validate-field="durasi" id="durasi-film" name="durasi-film" placeholder="Masukkan durasi film" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga Tiket</label>
                <input type="text" class="form-control" data-validate-field="harga" id="harga-tiket" name="harga-tiket" placeholder="Masukkan harga tiket" required>
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
                alerty.toasts('Berhasil menambahkan film!',{
                    place:'top',  
                    bgColor: 'rgb(0, 202, 67)',
                    fontColor: '#fff' 
                },(res)=>{
                    Pjax.assign('<?php echo base_url()?>admin/films');
                });
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
        precision: 2,
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
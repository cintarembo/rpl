<div class="row">
    <div class="col-md-6">
    <!-- Page Heading -->
    <button class="btn btn-primary float-right" id="tambahGenre">Tambah Genre</button>
    <h1 class="my-4">Daftar Film
    </h1>
        <table class="table" id="listGenre">
            <thead>
                <tr>
                <th scope="col">Nama</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($genre)): 
                  foreach ($genre as $g): ?>
                <tr data-id="<?php echo $g->id_genre ?>" class="formdata">
                    <td><?php echo $g->genre ?></td>
                </tr>
                <?php endforeach;
                      else:  ?>
            <h3>Belum ada genre</h3>
            <?php endif; ?>
             
            </tbody>
        </table>
    </div>

    <div class="col-md-6" style="display:none" id="formtambahgenre">
        <h1 class="my-4">Tambah Genre Baru</h1>
        <form action="javascript:;" id="formGenre">
            <div class="form-group">
                <label for="nama">Nama genre</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" id="tombolCancel">Cancel</button>
        </form>
    </div>
</div>

<script>

//Membuat Event untuk tombol cancel
let cancel = document.getElementById('tombolCancel');
cancel.addEventListener('click', function (e) {
    let a = document.getElementById('formtambahgenre');
    a.style = 'display:none';
});

//Membuat event untuk tombol tambah genre
let a = document.getElementById('tambahGenre');
a.addEventListener('click', function (e) {
   let a = document.getElementById('formtambahgenre');
   a.style = 'display:block';
});

//Event saat form tambah genre baru di submit/tekan enter
document.getElementById('formGenre').onsubmit = (e) => {
    let a = e.target;
    setTimeout(() => {
        let b = e.target[0].value;
        qwest.post('admin/films/addgenre',{
            nama:b
        }).then((res)=>{
            alerty.toasts('Berhasil menambahkan genre baru!',{
                place:'top',  
                bgColor: 'rgb(0, 202, 67)',
                fontColor: '#fff' 
            },(res)=>{
                Pjax.assign('<?php echo base_url()?>admin/films/genre');
            });
        }).catch((err)=>{
            console.log(err);
        })  
    }, 20);
    
};

/*****************
 * Membuat Event untuk keseluruhan document
 * Jika sesuai dengan baris maka event keydown akan
 * membuat promises untuk update
 */
document.addEventListener('keydown', function (e) {
    let baris = document.getElementsByClassName('formdata');
    for (const a of baris){
        if(a.contains(e.target)){
            for (const i of baris) {
                i.onkeydown = (e) => {
                    if(e.keyCode==13){
                        let a = i.getAttribute('data-id');
                        setTimeout(() => {
                            let b = i.cells[0].textContent;
                            //Make promises request
                            qwest.post('admin/films/editgenre',{
                                id:a,
                                nama:b
                            }).then((e)=>{
                                console.log('oke');
                            }).catch((err)=>{
                                console.log(err);
                            })

                        }, 10); 
                    }
                }
            }
        }
    }
});

/**
 * Inisialisasi tabel genre
 */
const listGenre = new DataTable('#listGenre',{
    searchable: true,
    sortable:true,
    perPage:5,
    plugins: {
        editable: {
            enabled: true,
            contextMenu: true,
            hiddenColumns: true,
            menuItems: [
                {
                    text: "Edit",
                    action: function() {
                        this.editCell();
                    }
                },
                {
                    text: "Remove",
                    action: function() {
                        alerty.confirm('Anda yakin ingin menghapus genre ini?',{
                            okLabel: 'Ya',
                            cancelLabel: 'Tidak'
                        },(res) => {
                            let a = document.querySelector('.formdata');
                            let b = a.getAttribute('data-id');
                            qwest.post('admin/films/delgenre/',{
                                id:b
                            }).then((res)=>{
                                alerty.toasts('Berhasil menghapus genre ini!',{
                                    place:'top',  
                                    bgColor: 'rgb(0, 202, 67)',
                                    fontColor: '#fff' 
                                },(res)=>{
                                    Pjax.assign('<?php echo base_url()?>admin/films/genre');
                                });
                                this.removeRow();
                            }).catch((err)=>{
                                console.log(err);
                            })
                        });
                    }
                }
            ],
            
        }
    }
});

/** Close loading bar */
topbar.hide();
</script>
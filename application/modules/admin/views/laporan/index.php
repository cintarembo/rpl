<h1 class="my-4">Laporan Penjualan Tiket</h1>

<table>
    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Username</th>
            <th>Email</th>
            <th>Tanggal Pembelian</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    
    <?php if (!empty($laporan)) :
        foreach ($laporan as $m) : ?>
        <tr data-id="<?php echo $m->id_transaksi?>" >
            <td><a href="laporan/detail/<?php echo $m->id_transaksi ?>" class="id_transaksi" style="color:black"><?php echo $m->id_transaksi ?></a></td>
            <td><a href="#" style="text-decoration:none;color:#000"><?php echo $m->member->username?></a></td>
            <td><?php echo $m->member->email?></td>
            <td><?php echo $m->tgl_beli?></td>
            <td id="total_harga"><?php echo $m->total_harga?></td>
            <td style="
            background-color:<?php $bgcolor = ($m->status=='menunggu') ? '#f006' : '#FFF' ;
            echo $bgcolor;?>;
            color:<?php $color = ($m->status=='menunggu') ? '#FFF' : '#000' ;
            echo $color;?>"><?php echo $m->status?></td>
        </tr>
        <?php endforeach;
    else : ?>
    <h3>Maaf belum ada member untuk saat ini.</h3>
    <?php endif;?>
    
    </tbody>
</table>

<script type="text/javascript" defer="defer">

setTimeout(() => {
    const laporan = new DataTable('table',{
        searchable:true,
        sortable:true,
        perPage:10,
        plugins:{
            editable:{
                enabled:true,
                contextMenu:true,
                hiddenColumns: true,
                menuItems: [
                    {
                        text: "Sudah Dibayar",
                        action: function() {
                            lunas();
                        }
                    },
                    {
                        text: "Menunggu Pembayaran",
                        action: function() {
                            belum();
                        }
                    }
                ],
            }
        }
    });

    const lunas = (params) => {
        let id_transaksi = document.getElementsByClassName('id_transaksi');
        for (const i of id_transaksi) {
            let a = i.getAttribute('data-id');
            qwest.post('admin/laporan/pembayaran',{
                id_transaksi:a,
                status: 'lunas'
            }).then((res) => {
                    let b = i.cells[5];
                    b.removeAttribute('style');
                    b.innerHTML = 'lunas';
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    }

    const belum = (params) => {
        let id_transaksi = document.getElementsByClassName('id_transaksi');
        for (const i of id_transaksi) {
            let a = i.getAttribute('data-id');
            qwest.post('admin/laporan/pembayaran',{
                id_transaksi:a,
                status: 'menunggu'
            }).then((res) => {
                    let b = i.cells[5];
                    b.setAttribute('style','background-color:#f006;color:#FFF');
                    b.innerHTML = 'menunggu';
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    }
}, 100);
</script>
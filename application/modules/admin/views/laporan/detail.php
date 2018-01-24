<div class="row">
    <div class="col">
        <h1 class="my-4">Detail Transaksi</h1>
    </div>
    <div class="col">
        <a href="<?php echo base_url()?>admin/laporan" class="btn btn-small btn-warning my-4">Kembali</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="id_transaksi">ID Transaksi</label>
                    <h5><?php
                        echo $laporan_detail->id_transaksi ?>
                    </h5>
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label for="username">Nama Lengkap</label>
                    <h5><?php echo
                        $laporan_detail->member->first_name.'&nbsp'
                        .$laporan_detail->member->last_name ?>
                    </h5>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="tanggal">Tanggal Pembelian</label>
                    <h5>
                    <?php $this->load->helper('tanggal');
                        echo
                            _date(
                                "l, jS F Y h:i:s A",
                                strtotime($laporan_detail->tgl_beli),
                                'Asia/Jakarta'
                            )?>
                    </h5>
                </div>
            </div>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul Film</th>
                    <th>Waktu</th>
                    <th>Studio</th>
                    <th>Durasi</th>
                    <th>Kursi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $laporan_detail->detail->film->judul ?></td>
                    <td><?php echo $laporan_detail->detail->tanggal.'&nbsp-&nbsp'.$laporan_detail->detail->jam ?></td>
                    <td><?php echo $laporan_detail->detail->studio ?></td>
                    <td><?php echo $laporan_detail->detail->film->durasi ?></td>
                    <td><?php
                    $kursi = $this->kursi->where('id_detail', $laporan_detail->detail->id)->get_all();
                    foreach ($kursi as $k) {
                        echo $k->no_kursi;
                        echo '&nbsp';
                    } ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
echo '
<h1 class="my-4">Detail Transaksi</h1>
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="id_transaksi">ID Transaksi</label>
                    <h5>'.$laporan_detail->id_transaksi.'</h5>
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label for="username">Nama Lengkap</label>
                    <h5>'.$laporan_detail->member->first_name.'&nbsp'.$laporan_detail->member->last_name.'</h5>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="tanggal">Tanggal Pembelian</label>
                    <h5>'
                    .date("l, jS F Y h:i:s A", strtotime($laporan_detail->tgl_beli)).'</h5>
                </div>
            </div>
        </div>
        
        <table></table>
    </div>
</div>
';

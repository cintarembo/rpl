<section class="container">
    <div class="coloum-wrapper">
        <div class="col-md-12">
            <h3>kiri</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Judul Film</th>
                        <th>Waktu</th>
                        <th>Durasi</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($transaksi)) {
                    foreach ($transaksi as $t) {
                        echo '
                            <tr>
                                <td>'.$t->id_transaksi.'</td>
                                <td>'.$t->detail->film->judul.'</td>
                                <td>'.$t->detail->tanggal.'</td>
                                <td>'.$t->detail->film->durasi.'</td>
                                <td>'.$t->total_harga.'</td>
                                <td>'.$t->status.'</td>
                                <td><a href="'.base_url().'pub/home/pay?t='.$t->id_transaksi.'" class="btn btn-success btn-sm">Bayar Sekarang</a></td>
                            </tr>
                        ';
                    }
                } else {
                    echo '<h4>And belum memesan tiket bioskop, segera pesan sekarang!</h4>';
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
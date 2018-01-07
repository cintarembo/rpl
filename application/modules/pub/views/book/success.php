<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/tickets.png">
            <p class="order__title">Thank you <br><span class="order__descript">you have successfully purchased tickets</span></p>
        </div>
        <div class="ticket">
            <div class="ticket-position">
                <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">online ticket</div> </div>
                <div class="ticket__inner">
                    <div class="ticket-secondary">
                        <span class="ticket__item">Ticket number <strong class="ticket__number"><?php echo $transaksi->id_transaksi; ?></strong></span>
                        <span class="ticket__item ticket__date"><?php echo $transaksi->tanggal; ?></span>
                        <span class="ticket__item ticket__time"><?php echo $transaksi->jam; ?></span>
                        <span class="ticket__item">Cinema: <span class="ticket__cinema"><?php echo $transaksi->studio; ?></span></span>
                        <span class="ticket__item ticket__price">price: <strong class="ticket__cost"><?php echo '$'.$transaksi->transaksi->total_harga; ?></strong></span>
                    </div>

                    <div class="ticket-primery">
                        <span class="ticket__item ticket__item--primery ticket__film">Film<br><strong class="ticket__movie"><?php echo $transaksi->film->judul; ?></strong></span>
                        <span class="ticket__item ticket__item--primery">Sits: <span class="ticket__place">
                        <?php $a = count($kursi); 
                            foreach ($kursi as $k) {
                                $koma = ($a>1) ? ', ' : '' ;
                                echo $k->no_kursi;
                                echo $koma;
                                $a--;
                        } ?>
                        </span></span>
                    </div>


                </div>
                <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">online ticket</div></div>
            </div>
        </div>

        <div class="ticket-control">
            <a href="#" class="watchlist list--download">Download</a>
            <a href="#" class="watchlist list--print">Print</a>
        </div>

    </div>
</section>

<div class="clearfix"></div>
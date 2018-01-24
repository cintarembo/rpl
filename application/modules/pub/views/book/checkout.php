<?php if (!$this->ion_auth->logged_in()) {
    redirect(base_url().'pub/home/login');
    if (empty($transaksi)) {
        show_404();
    }
}
?>
<!-- Main content -->
<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">Book a ticket <br>
                <span class="order__descript">and have fun movie time</span></p>
            <div class="order__control">
                <a href="" class="order__control-btn active">Purchase</a>
                <a href="book3-reserve.html" class="order__control-btn">Reserve</a>
            </div>
        </div>
    </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">
                1. What &amp; Where &amp; When
            </div>
            <div class="order-step second--step order-step--disable">
                2. Choose a sit
            </div>
            <div class="order-step third--step">
                3. Check out
            </div>
        </div>

    <div class="col-sm-12">
        <div class="checkout-wrapper">
            <h2 class="page-heading">price</h2>
            <ul class="book-result">
                <li class="book-result__item">Total: 
                    <span class="book-result__count booking-cost">
                        <?php echo 'Rp. '.$transaksi->total_harga?>
                    </span>
                </li>
            </ul>

            <h2 class="page-heading">Choose yout payment method</h2>
            <div class="payment">
                <a href="javascript:" class="payment__item">
                    <img alt='paypal' src="<?php echo base_url(
                        'public/assets/vendor/amovie/images/payment/pay1.png'
                    )?>">
                </a>
                <a href="javascript:" class="payment__item">
                    <img alt='maestro' src="<?php echo base_url(
                        'public/assets/vendor/amovie/images/payment/pay5.png'
                    )?>">
                </a>
                <a href="javascript:" class="payment__item">
                    <img alt='master-card' src="<?php echo base_url(
                        'public/assets/vendor/amovie/images/payment/pay6.png'
                    )?>">
                </a>
                <a href="javascript:" class="payment__item">
                    <img alt='visa' src="<?php echo base_url(
                        'public/assets/vendor/amovie/images/payment/pay7.png'
                    )?>">
                </a>
            </div>

            <h2 class="page-heading">How to purchase your order</h2>
            <div class="payment">
                <ol>1. Silahkan pilih metode pembayaran anda.</ol>
                <ol>2. Transfer sesuai dengan nominal yang tertera.</ol>
                <ol>3. Klik pay now untuk melanjutkan.</ol>
                <ol>4. Unggah bukti transaksi anda.</ol>
                <ol>5. Selamat menikmati film anda.</ol>
            </div>
        </div>
        
        <div class="order">
            <button class="btn btn-md btn--warning btn--wide" id="purchase">
                Pay Now
            </button>
        </div>

    </div>
</section>

<div class="clearfix"></div>

<script>
let payment = '';
let payments = document.getElementsByClassName('payment__item');
for (const pay of payments) {
    let bp = pay;
    bp.addEventListener('click', (e) => {
        let a = e.target;
        let b = a.getAttribute('alt');
        payment = b;
    })
}

$('#purchase').click(function (e) { 
    e.preventDefault();
    let payments = document.getElementsByClassName('payment__item');
    let id = '<?php echo $transaksi->id_transaksi; ?>';
    Pjax.assign(base+'pub/home/pay?t='+id+'&metode='+payment);
});
</script>
<?php if (!$this->ion_auth->logged_in()) {
    redirect(base_url().'pub/home/login');
}
?>
<!-- Main content -->
<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="images/tickets.png">
            <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
            <div class="order__control">
                <a href="" class="order__control-btn active">Purchase</a>
                <a href="book3-reserve.html" class="order__control-btn">Reserve</a>
            </div>
        </div>
    </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
            <div class="order-step second--step order-step--disable">2. Choose a sit</div>
            <div class="order-step third--step">3. Check out</div>
        </div>

    <div class="col-sm-12">
        <div class="checkout-wrapper">
            <h2 class="page-heading">price</h2>
            <?php if(!empty($this->input->get('kursi-depan'))): ?>
            <ul class="book-result">
                <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket"><?php echo $this->input->get('kursi-depan')?></span></li>
                <li class="book-result__item">One item price: <span class="book-result__count booking-price">$10</span></li>
                <li class="book-result__item">Total: <span class="book-result__count booking-cost"><?php $depan =$this->input->get('kursi-depan')*10; echo '$'.$depan; ?></span></li>
            </ul>
            <?php endif;?>
            <?php if(!empty($this->input->get('kursi-tengah'))): ?>
            <ul class="book-result">
                <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket"><?php echo $this->input->get('kursi-tengah')?></span></li>
                <li class="book-result__item">One item price: <span class="book-result__count booking-price">$20</span></li>
                <li class="book-result__item">Total: <span class="book-result__count booking-cost"><?php $tengah = $this->input->get('kursi-tengah')*20; echo '$'.$tengah; ?></span></li>
            </ul>
            <?php endif;?>
            <?php if(!empty($this->input->get('kursi-belakang'))): ?>
            <ul class="book-result">
                <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket"><?php echo $this->input->get('kursi-belakang') ?></span></li>
                <li class="book-result__item">One item price: <span class="book-result__count booking-price">$30</span></li>
                <li class="book-result__item">Total: <span class="book-result__count booking-cost"><?php $belakang = $this->input->get('kursi-belakang')*30; echo '$'.$belakang; ?></span></li>
            </ul></br>
            <?php endif;?>
            <ul class="book-result">
                <li class="book-result__item">Total: <span class="book-result__count booking-cost"><?php echo '$'.$this->input->get('total_harga')?></span></li>
            </ul>

            <h2 class="page-heading">Choose payment method</h2>
            <div class="payment">
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay1.png">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay2.png">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay3.png">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay4.png">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay5.png">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay6.png">
                </a>
                <a href="#" class="payment__item">
                    <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/payment/pay7.png">
                </a>
            </div>

            <h2 class="page-heading">Contact information</h2>
    
            <form id='contact-info' method='post' novalidate="" class="form contact-info">
                <div class="contact-info__field contact-info__field-mail">
                    <input type='email' name='user-mail' placeholder='Your email' class="form__mail">
                </div>
                <div class="contact-info__field contact-info__field-tel">
                    <input type='tel' name='user-tel' placeholder='Phone number' class="form__mail">
                </div>
            </form>

        
        </div>
        
        <div class="order">
            <button class="btn btn-md btn--warning btn--wide" id="purchase">purchase</button>
        </div>

    </div>
</section>


<div class="clearfix"></div>

<div class="booking-pagination">
        <a href="<?php echo base_url()?>pub/home/book2" class="booking-pagination__prev">
            <p class="arrow__text arrow--prev">prev step</p>
            <span class="arrow__info">choose a sit</span>
        </a>
</div>

<div class="clearfix"></div>
<script>
    
</script>
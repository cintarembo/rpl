<!-- Main content -->
<style>.swiper-slide img {height:200px;}</style>
<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="images/tickets.png">
            <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
            <div class="order__control">
                <a href="#" class="order__control-btn active">Purchase</a>
                <a href="#" class="order__control-btn">Reserve</a>
            </div>
        </div>
    </div>
        <div class="order-step-area">
            <div class="order-step first--step">1. What &amp; Where &amp; When</div>
        </div>

    <h2 class="page-heading heading--outcontainer">Choose a movie</h2>
</section>

<div class="choose-film">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach ($film as $f): ?>
                <div class="swiper-slide" data-film='<?php echo $f->judul; ?>'> 
                    <div class="film-images">
                        <img alt='' src="<?php echo UPLOADPATH.'380x600/'.$f->cover; ?>">
                    </div>
                    <p class="choose-film__title"><?php echo $f->judul; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<section class="container">
    <div class="col-sm-12">
        <div class="choose-indector choose-indector--film">
            <strong>Choosen: </strong><span class="choosen-area"></span>
        </div>

        <h2 class="page-heading">Date</h2>

        <div class="choose-container choose-container--short">
            <div class="datepicker">
                <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                <input type="text" id="datepicker" value='26/12/2017' class="datepicker__input">
            </div>
        </div>

        <h2 class="page-heading">Pick time</h2>

        <div class="time-select time-select--wide"></div>

        <div class="choose-indector choose-indector--time">
            <strong>Choosen: </strong><span class="choosen-area"></span>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<form id='film-and-time' class="booking-form" method='get' action="javascript:">
    <input type='text' name='film' class="choosen-movie">
    <input type='text' name='tanggal' class="choosen-date">
    
    <input type='text' name='studio' class="choosen-cinema">
    <input type='text' name='jam' class="choosen-time">

    <div class="booking-pagination">
        <a href="#" class="booking-pagination__prev hide--arrow">
            <span class="arrow__text arrow--prev"></span>
            <span class="arrow__info"></span>
        </a>
        <?php if (!$this->ion_auth->logged_in()): ?>
            <button class="btn btn-md btn--warning btn--wide" id="signin">signin</button>
        <?php else: ?>
            <button type="submit" class="booking-pagination__next">
                <span class="arrow__text arrow--next">next step</span>
                <span class="arrow__info">choose a sit</span>
            </button>
        <?php endif; ?>
    </div>

</form>

<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
            'use strict';

            //1. Buttons for choose order method
            //order factor
            $('.order__control-btn').click(function(e) {
                e.preventDefault();

                $('.order__control-btn').removeClass('active');
                $(this).addClass('active');
            });

            //2. Init vars for order data
            // var for booking;
            var movie = $('.choosen-movie'),
                date = $('.choosen-date');


            //3. Swiper slider
            //init employee sliders
            var mySwiper = new Swiper('.swiper-container', {
                slidesPerView: 10,
                loop: true
            });

            $('.swiper-slide-active').css({ marginLeft: '-2px' });
            //media swipe visible slide
            //Onload detect
            if ($(window).width() > 1930) {
                mySwiper.params.slidesPerView = 13;
                mySwiper.resizeFix();
            } else if (($(window).width() > 993) & ($(window).width() < 1199)) {
                mySwiper.params.slidesPerView = 6;
                mySwiper.resizeFix();
            } else if (($(window).width() > 768) & ($(window).width() < 992)) {
                mySwiper.params.slidesPerView = 5;
                mySwiper.resizeFix();
            } else if (($(window).width() < 767) & ($(window).width() > 481)) {
                mySwiper.params.slidesPerView = 4;
                mySwiper.resizeFix();
            } else if ($(window).width() < 480) {
                mySwiper.params.slidesPerView = 2;
                mySwiper.resizeFix();
            } else {
                mySwiper.params.slidesPerView = 10;
                mySwiper.resizeFix();
            }

            //Resize detect
            $(window).resize(function() {
                if ($(window).width() > 1930) {
                    mySwiper.params.slidesPerView = 13;
                    mySwiper.reInit();
                }

                if (($(window).width() > 993) & ($(window).width() < 1199)) {
                    mySwiper.params.slidesPerView = 6;
                    mySwiper.reInit();
                } else if (($(window).width() > 768) & ($(window).width() < 992)) {
                    mySwiper.params.slidesPerView = 5;
                    mySwiper.reInit();
                } else if (($(window).width() < 767) & ($(window).width() > 481)) {
                    mySwiper.params.slidesPerView = 4;
                    mySwiper.reInit();
                } else if ($(window).width() < 480) {
                    mySwiper.params.slidesPerView = 2;
                    mySwiper.reInit();
                } else {
                    mySwiper.params.slidesPerView = 10;
                    mySwiper.reInit();
                }
            });

            //5. Datepicker init
            $('.datepicker__input').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                showAnim: 'fade'
            });

            $(document).click(function(e) {
                var ele = $(e.target);
                if (
                    !ele.hasClass('datepicker__input') &&
                    !ele.hasClass('ui-datepicker') &&
                    !ele.hasClass('ui-icon') &&
                    !$(ele).parent().parents('.ui-datepicker').length
                ) {
                    $('.datepicker__input').datepicker('hide');
                }
            });

            //6. Choose variant proccess
            //choose film
            $('.film-images').click(function(e) {
                //visual iteractive for choose
                $('.film-images').removeClass('film--choosed');
                $(this).addClass('film--choosed');

                //data element init
                var chooseFilm = $(this).parent().attr('data-film');
                $('.choose-indector--film').find('.choosen-area').text(chooseFilm);

                //data element set
                movie.val(chooseFilm);

                //get studio and jam
                $('.time-select').load(base+"pub/home/timestudio?f="+chooseFilm, function (response, status, request) {
                    this; // dom element
                    
                });
            });

            // choose (change) city and date for film

            //data element init (default)
            var chooseDate = $('.datepicker__input').val();

            //data element set (default)
            date.val(chooseDate);


            $('.datepicker__input').change(function() {
                //data element change
                var chooseDate = $('.datepicker__input').val();
                //data element set change
                date.val(chooseDate);
            });

            // --- Step for data - serialize and send to next page---//
            

            //7. Visibility block on page control
            //control block display on page
            $('.choose-indector--film').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('hide-content');
                $('.choose-film').slideToggle(400);
            });

            $('.choose-indector--time').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('hide-content');
                $('.time-select').slideToggle(400);
            });

    });
</script>

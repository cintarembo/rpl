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

        <h2 class="page-heading">City &amp; Date</h2>

        <div class="choose-container choose-container--short">
            <form id='select' class="select" method='get'>
                    <select name="select_item" id="select-sort" class="select__sort" tabindex="0">
                    <option value="1" selected='selected'>London</option>
                    <option value="2">New York</option>
                    <option value="3">Paris</option>
                    <option value="4">Berlin</option>
                    <option value="5">Moscow</option>
                    <option value="3">Minsk</option>
                    <option value="4">Warsawa</option>
                    <option value="5">Kiev</option>
                </select>
            </form>

            <div class="datepicker">
                <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                <input type="text" id="datepicker" value='26/12/2017' class="datepicker__input">
            </div>
        </div>

        <h2 class="page-heading">Pick time</h2>

        <div class="time-select time-select--wide">
                <div class="time-select__group group--first">
                    <div class="col-sm-3">
                        <p class="time-select__place">Cineworld</p>
                    </div>
                    <ul class="col-sm-6 items-wrap">
                        <li class="time-select__item" data-time='09:40'>09:40</li>
                        <li class="time-select__item" data-time='13:45'>13:45</li>
                        <li class="time-select__item" data-time='15:45'>15:45</li>
                        <li class="time-select__item" data-time='19:50'>19:50</li>
                        <li class="time-select__item" data-time='21:50'>21:50</li>
                    </ul>
                </div>

                <div class="time-select__group">
                    <div class="col-sm-3">
                        <p class="time-select__place">Empire</p>
                    </div>
                    <ul class="col-sm-6 items-wrap">
                        <li class="time-select__item" data-time='10:45'>10:45</li>
                        <li class="time-select__item" data-time='16:00'>16:00</li>
                        <li class="time-select__item" data-time='19:00'>19:00</li>
                        <li class="time-select__item" data-time='21:15'>21:15</li>
                        <li class="time-select__item" data-time='23:00'>23:00</li>
                    </ul>
                </div>

                <div class="time-select__group">
                    <div class="col-sm-3">
                        <p class="time-select__place">Curzon</p>
                    </div>
                    <ul class="col-sm-6 items-wrap">
                        <li class="time-select__item" data-time='09:00'>09:00</li>
                        <li class="time-select__item" data-time='11:00'>11:00</li>
                        <li class="time-select__item" data-time='13:00'>13:00</li>
                        <li class="time-select__item" data-time='15:00'>15:00</li>
                        <li class="time-select__item" data-time='17:00'>17:00</li>
                        <li class="time-select__item" data-time='19:00'>19:00</li>
                        <li class="time-select__item" data-time='21:00'>21:00</li>
                        <li class="time-select__item" data-time='23:00'>23:00</li>
                        <li class="time-select__item" data-time='01:00'>01:00</li>
                    </ul>
                </div>

                <div class="time-select__group">
                    <div class="col-sm-3">
                        <p class="time-select__place">Odeon</p>
                    </div>
                    <ul class="col-sm-6 items-wrap">
                        <li class="time-select__item" data-time='10:45'>10:45</li>
                        <li class="time-select__item" data-time='16:00'>16:00</li>
                        <li class="time-select__item" data-time='19:00'>19:00</li>
                        <li class="time-select__item" data-time='21:15'>21:15</li>
                        <li class="time-select__item" data-time='23:00'>23:00</li>
                    </ul>
                </div>

                <div class="time-select__group group--last">
                    <div class="col-sm-3">
                        <p class="time-select__place">Picturehouse</p>
                    </div>
                    <ul class="col-sm-6 items-wrap">
                        <li class="time-select__item" data-time='17:45'>17:45</li>
                        <li class="time-select__item" data-time='21:30'>21:30</li>
                        <li class="time-select__item" data-time='02:20'>02:20</li>
                    </ul>
                </div>
            </div>

        <div class="choose-indector choose-indector--time">
            <strong>Choosen: </strong><span class="choosen-area"></span>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<form id='film-and-time' class="booking-form" method='get' action="javascript:">
    <input type='text' name='choosen-movie' class="choosen-movie">
    <input type='text' name='choosen-city' class="choosen-city">
    <input type='text' name='choosen-date' class="choosen-date">
    
    <input type='text' name='choosen-cinema' class="choosen-cinema">
    <input type='text' name='choosen-time' class="choosen-time">

    <div class="booking-pagination">
        <a href="#" class="booking-pagination__prev hide--arrow">
            <span class="arrow__text arrow--prev"></span>
            <span class="arrow__info"></span>
        </a>
        <?php if (!$this->ion_auth->logged_in()): ?>

        <?php else: ?>

        <?php endif; ?>
        <button type="submit" class="booking-pagination__next">
            <span class="arrow__text arrow--next">next step</span>
            <span class="arrow__info">choose a sit</span>

        </button>

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
                city = $('.choosen-city'),
                date = $('.choosen-date'),
                cinema = $('.choosen-cinema'),
                time = $('.choosen-time');

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

            //4. Dropdown init
            //select
            $('#select-sort').selectbox({
                onChange: function(val, inst) {
                    $(inst.input[0]).children().each(function(item) {
                        $(this).removeAttr('selected');
                    });
                    $(inst.input[0]).find('[value="' + val + '"]').attr('selected', 'selected');
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
            });

            //choose time
            $('.time-select__item').click(function() {
                //visual iteractive for choose
                $('.time-select__item').removeClass('active');
                $(this).addClass('active');

                //data element init
                var chooseTime = $(this).attr('data-time');
                $('.choose-indector--time').find('.choosen-area').text(chooseTime);

                //data element init
                var chooseCinema = $(this).parent().parent().find('.time-select__place').text();

                //data element set
                time.val(chooseTime);
                cinema.val(chooseCinema);
            });

            // choose (change) city and date for film

            //data element init (default)
            var chooseCity = $('.select .sbSelector').text();
            var chooseDate = $('.datepicker__input').val();

            //data element set (default)
            city.val(chooseCity);
            date.val(chooseDate);

            $('.select .sbOptions').click(function() {
                //data element change
                var chooseCity = $('.select .sbSelector').text();
                //data element set change
                city.val(chooseCity);
            });

            $('.datepicker__input').change(function() {
                //data element change
                var chooseDate = $('.datepicker__input').val();
                //data element set change
                date.val(chooseDate);
            });

            // --- Step for data - serialize and send to next page---//
            $('.booking-form').submit(function() {
                var bookData = $(this).serialize();
                let movie = $('.choosen-movie').val();
                Pjax.assign(base+'pub/home/book2?'+bookData);
            });

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

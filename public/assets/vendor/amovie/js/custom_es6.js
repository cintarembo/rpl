//General function for all pages

//Modernizr touch detect
Modernizr.load({
    test: Modernizr.touch,
    yep: ['css/touch.css?v=1'],
    nope: []
});

//1. Scroll to top arrow
// Scroll to top
const $block = $('<div/>', { class: 'top-scroll' }).append('<a href="#"/>').hide().appendTo('body').click(() => {
    $('body,html').animate({ scrollTop: 0 }, 800);
    return false;
});

//initialization
const $window = $(window);

if ($window.scrollTop() > 35) {
    showElem();
} else {
    hideElem();
}

//handlers
$window.scroll(function () {
    if ($(this).scrollTop() > 35) {
        showElem();
    } else {
        hideElem();
    }
});

//functions
function hideElem() {
    $block.fadeOut();
}
function showElem() {
    $block.fadeIn();
}

//2. Mobile menu
//Init mobile menu
$('#navigation').mobileMenu({
    triggerMenu: '#navigation-toggle',
    subMenuTrigger: '.sub-nav-toggle',
    animationSpeed: 500
});

//3. Search bar dropdown
//search bar
$('#search-sort').selectbox({
    onChange(val, inst) {
        $(inst.input[0]).children().each(function (item) {
            $(this).removeAttr('selected');
        });
        $(inst.input[0]).find(`[value="${val}"]`).attr('selected', 'selected');
    }
});

//4. Login window pop up
//Login pop up
$('.login-window').click(e => {
    e.preventDefault();
    $('.overlay').removeClass('close').addClass('open');
});

$('.overlay-close').click(e => {
    e.preventDefault;
    $('.overlay').removeClass('open').addClass('close');

    setTimeout(() => {
        $('.overlay').removeClass('close');
    }, 500);
});

function init_Elements() {
    //1. Accodions
    //Init 2 type accordions
    $('#accordion').collapse();
    $('#accordion-dark').collapse();

    //2. Dropdown
    //select
    $('#select-sort').selectbox({
        onChange(val, inst) {
            $(inst.input[0]).children().each(function (item) {
                $(this).removeAttr('selected');
            });
            $(inst.input[0]).find(`[value="${val}"]`).attr('selected', 'selected');
        }
    });

    //3. Datapicker init
    $('.datepicker__input').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: 'fade'
    });

    $(document).click(e => {
        const ele = $(e.target);
        if (
            !ele.hasClass('datepicker__input') &&
            !ele.hasClass('ui-datepicker') &&
            !ele.hasClass('ui-icon') &&
            !$(ele).parent().parents('.ui-datepicker').length
        ) {
            $('.datepicker__input').datepicker('hide');
        }
    });

    //4. Tabs
    //Init 2 type tabs
    $('#hTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#vTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    //5. Mega select with filters
    //Mega select interaction
    $('.mega-select__filter').click(function (e) {
        //prevent the default behaviour of the link
        e.preventDefault();
        $('.select__field').val('');

        $('.mega-select__filter').removeClass('filter--active');
        $(this).addClass('filter--active');

        //get the data attribute of the clicked link(which is equal to value filter of our content
        const filter = $(this).attr('data-filter');

        //Filter buttoms
        //show all the list items(this is needed to get the hidden ones shown)
        $('.select__btn a').show();

		/*using the :not attribute and the filter class in it we are selecting
                only the list items that don't have that class and hide them '*/
        $(`.select__btn a:not(.${filter})`).hide();

        //Filter dropdown
        //show all the list items(this is needed to get the hidden ones shown)
        $('.select__group').removeClass('active-dropdown');
        $('.select__group').show();

		/*using the :not attribute and the filter class in it we are selecting
                only the list items that don't have that class and hide them '*/
        $(`.select__group.${filter}`).addClass('active-dropdown');
        $(`.select__group:not(.${filter})`).hide();
    });

    $('.filter--active').trigger('click');

    $('.select__field').focus(function () {
        $(this).parent().find('.active-dropdown').css('opacity', 1);
    });

    $('.select__field').blur(function () {
        $(this).parent().find('.active-dropdown').css('opacity', 0);
    });

    $('.select__variant').click(function () {
        const value = $(this).attr('data-value');

        $('.select__field').val(value);
    });

    //6. Progressbar
    //Count function for progressbar
    function init_progressBar(duration) {
        $('.progress').each(function () {
            const value = $(this).find('.progress__bar').attr('data-level');
            const result = `${value}%`;
            if (duration) {
                $(this).find('.progress__current').animate({ width: `${value}%` }, duration);
            } else {
                $(this).find('.progress__current').css({ width: `${value}%` });
            }
        });
    }

    //inview progress bars
    $('.progress').one('inview', (event, visible) => {
        if (visible == true) {
            init_progressBar(2000);
        }
    });

    //7. Dropdown for authorize button
    //user list option
    $('.auth__show').click(e => {
        e.preventDefault();
        $('.auth__function').toggleClass('open-function');
    });

    $('.btn--singin').click(e => {
        e.preventDefault();
        $('.auth__function').toggleClass('open-function');
    });
}

function init_Home() {
    //1. Init revolution slider and add arrows behaviour
    const api = $('.banner').revolution({
        delay: 9000,
        startwidth: 1170,
        startheight: 500,

        onHoverStop: 'on',

        hideArrowsOnMobile: 'off',

        hideTimerBar: 'on',
        hideThumbs: '0',

        keyboardNavigation: 'on',

        navigationType: 'none',
        navigationArrows: 'solo',

        soloArrowLeftHalign: 'left',
        soloArrowLeftValign: 'center',
        soloArrowLeftHOffset: 0,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: 'right',
        soloArrowRightValign: 'center',
        soloArrowRightHOffset: 0,
        soloArrowRightVOffset: 0,

        touchenabled: 'on',
        swipe_velocity: '0.7',
        swipe_max_touches: '1',
        swipe_min_touches: '1',
        drag_block_vertical: 'false',

        fullWidth: 'off',
        forceFullWidth: 'off',
        fullScreen: 'off'
    });

    api.bind('revolution.slide.onchange', (e, data) => {
        const slides = $('.banner .slide');
        const currentSlide = data.slideIndex;

        var nextSlide = slides.eq(currentSlide).attr('data-slide');
        const prevSlide = slides.eq(currentSlide - 2).attr('data-slide');

        const lastSlide = slides.length;

        if (currentSlide == lastSlide) {
            var nextSlide = slides.eq(0).attr('data-slide');
        }

        //put onload value for slider navigation
        $('.tp-leftarrow').html(`<span class="slider__info">${prevSlide}</span>`);
        $('.tp-rightarrow').html(`<span class="slider__info">${nextSlide}</span>`);
    });

    //2. Dropdown for authorize button
    //user list option
    $('.auth__show').click(e => {
        e.preventDefault();
        $('.auth__function').toggleClass('open-function');
    });

    $('.btn--singin').click(e => {
        e.preventDefault();
        $('.auth__function').toggleClass('open-function');
    });

    //3. Mega select with filters (and markers)
    //Mega select interaction
    $('.mega-select__filter').click(function (e) {
        //prevent the default behaviour of the link
        e.preventDefault();
        $('.select__field').val('');

        $('.mega-select__filter').removeClass('filter--active');
        $(this).addClass('filter--active');

        //get the data attribute of the clicked link(which is equal to value filter of our content)
        const filter = $(this).attr('data-filter');

        //Filter buttons
        //show all the list items(this is needed to get the hidden ones shown)
        $('.select__btn a').show();
        $('.select__btn a').css('display', 'inline-block');

		/*using the :not attribute and the filter class in it we are selecting
                        only the list items that don't have that class and hide them '*/
        $(`.select__btn a:not(.${filter})`).hide();

        //Filter dropdown
        //show all the list items(this is needed to get the hidden ones shown)
        $('.select__group').removeClass('active-dropdown');
        $('.select__group').show();

		/*using the :not attribute and the filter class in it we are selecting
                        only the list items that don't have that class and hide them '*/
        $(`.select__group.${filter}`).addClass('active-dropdown');
        $(`.select__group:not(.${filter})`).hide();

        //Filter marker
        //show all the list items(this is needed to get the hidden ones shown)
        $('.marker-indecator').show();

		/*using the :not attribute and the filter class in it we are selecting
                        only the list items that don't have that class and hide them '*/
        $(`.marker-indecator:not(.${filter})`).hide();
    });

    $('.filter--active').trigger('click');
    $('.active-dropdown').css('z-index', '-1');

    $('.select__field').focus(function () {
        $(this).parent().find('.active-dropdown').css('opacity', 1);
        $(this).parent().find('.active-dropdown').css('z-index', '50');
    });

    $('.select__field').blur(function () {
        $(this).parent().find('.active-dropdown').css('opacity', 0);
        $(this).parent().find('.active-dropdown').css('z-index', '-1');
    });

    $('.select__variant').click(function (e) {
        e.preventDefault();
        $(this).parent().find('.active-dropdown').css('z-index', '50');
        const value = $(this).attr('data-value');
        $('.select__field').val(value);
        $(this).parent().find('.active-dropdown').css('z-index', '-1');
    });

    /* 
                    $('body').click( function (e){
                      console.log(e.target);
                    })*/

    //4. Rating scrore init
    //Rating star
    $('.score').raty({
        width: 130,
        score: 0,
        path: `${base}/public/assets/vendor/amovie/images/rate/`,
        starOff: 'star-off.svg',
        starOn: 'star-on.svg'
    });

    //5. Scroll down navigation function
    //scroll down
    $('.movie-best__check').click(ev => {
        ev.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('#target').offset().top - 30 }, 900, 'swing');
    });
}


function init_CinemaList() {
    //1. Dropdowns
    //select
    $('.select__sort').selectbox({
        onChange(val, inst) {
            $(inst.input[0]).children().each(function (item) {
                $(this).removeAttr('selected');
            });
            $(inst.input[0]).find(`[value="${val}"]`).attr('selected', 'selected');
        }
    });

    //2. Sorting buy category
    // sorting function
    $('.tags__item').click(function (e) {
        //prevent the default behaviour of the link
        e.preventDefault();

        $('.tags__item').removeClass('item-active');
        $(this).addClass('item-active');

        const filter = $(this).attr('data-filter');

        //show all the list items(this is needed to get the hidden ones shown)
        $('.cinema-item').show();
        //hide advertazing and pagination block
        $('.adv-place').show();
        $('.pagination').show();

		/*using the :not attribute and the filter class in it we are selecting
                            only the list items that don't have that class and hide them '*/
        if (filter.toLowerCase() !== 'all') {
            $(`.cinema-item:not(.${filter})`).hide();
            //show advertazing and pagination block only on filter (all)
            $('.pagination').hide();
            $('.adv-place').hide();
            // fix grid position
            $('.row').css('clear', 'none');
        }
    });
}

function init_Contact() {
    //1. Fullscreen map init
    //Init map
    const mapOptions = {
        scaleControl: true,
        center: new google.maps.LatLng(51.509708, -0.130539),
        zoom: 15,
        navigationControl: false,
        streetViewControl: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    const map = new google.maps.Map(document.getElementById('location-map'), mapOptions);
    const marker = new google.maps.Marker({
        map,
        position: map.getCenter()
    });

    //Custome map style
    const map_style = [
        { stylers: [{ saturation: -100 }, { gamma: 3 }] },
        { elementType: 'labels.text.stroke', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.business', elementType: 'labels.text', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.business', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.place_of_worship', elementType: 'labels.text', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.place_of_worship', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
        { featureType: 'road', elementType: 'geometry', stylers: [{ visibility: 'simplified' }] },
        {
            featureType: 'water',
            stylers: [{ visibility: 'on' }, { saturation: 0 }, { gamma: 2 }, { hue: '#aaaaaa' }]
        },
        {
            featureType: 'administrative.neighborhood',
            elementType: 'labels.text.fill',
            stylers: [{ visibility: 'off' }]
        },
        { featureType: 'road.local', elementType: 'labels.text', stylers: [{ visibility: 'off' }] },
        { featureType: 'transit.station', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] }
    ];

    //Then we use this data to create the styles.
    const styled_map = new google.maps.StyledMapType(map_style, { name: 'Cusmome style' });

    map.mapTypes.set('map_styles', styled_map);
    map.setMapTypeId('map_styles');

    //=====================================

    // Maker

    //=====================================

    //Creates the information to go in the pop-up info box.
    const boxTextA = document.createElement('div');
    boxTextA.innerHTML = '<span class="pop_up_box_text">Leicester Sq, London, WC2H 7LP</span>';

    //Sets up the configuration options of the pop-up info box.
    const infoboxOptionsA = {
        content: boxTextA,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: '#4c4145',
            opacity: 1,
            width: '300px',
            color: ' #b4b1b2',
            fontSize: '13px',
            padding: '14px 20px 15px'
        },
        closeBoxMargin: '6px 2px 2px 2px',
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: 'images/components/close.svg',
        isHidden: false,
        pane: 'floatPane',
        enableEventPropagation: false
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    const infoboxA = new InfoBox(infoboxOptionsA);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(marker, 'click', function (e) {
        //Open the Glastonbury info box.
        infoboxA.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(marker.getPosition());
    });
}

function init_Gallery() {
    //1. Pop up fuction for gallery elements

    //pop up for photo (object - images)
    $('.gallery-item--photo').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });

    //pop up for photo (object - title link)
    $('.gallery-item--photo-link').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });

    //pop up for video (object - images)
    $('.gallery-item--video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false,
        gallery: {
            enabled: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });

    //pop up for video (object - title link)
    $('.gallery-item--video-link').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false,
        gallery: {
            enabled: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });
}

function init_MovieList() {
    //1. Dropdown init
    //select
    $('.select__sort').selectbox({
        onChange(val, inst) {
            $(inst.input[0]).children().each(function (item) {
                $(this).removeAttr('selected');
            });
            $(inst.input[0]).find(`[value="${val}"]`).attr('selected', 'selected');
        }
    });

    //2. Datepicker init
    $('.datepicker__input').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: 'fade'
    });

    $(document).click(e => {
        const ele = $(e.target);
        if (
            !ele.hasClass('datepicker__input') &&
            !ele.hasClass('ui-datepicker') &&
            !ele.hasClass('ui-icon') &&
            !$(ele).parent().parents('.ui-datepicker').length
        ) {
            $('.datepicker__input').datepicker('hide');
        }
    });

    //3. Rating scrore init
    //Rating star
    $('.score').raty({
        width: 130,
        score: 0,
        path: `${base}/public/assets/vendor/amovie/images/rate/`,
        starOff: 'star-off.svg',
        starOn: 'star-on.svg'
    });

    //4. Sorting by category
    // sorting function
    $('.tags__item').click(function (e) {
        //prevent the default behaviour of the link
        e.preventDefault();

        //active sorted item
        $('.tags__item').removeClass('item-active');
        $(this).addClass('item-active');

        const filter = $(this).attr('data-filter');

        //show all the list items(this is needed to get the hidden ones shown)
        $('.movie--preview').show();
        $('.pagination').show();

		/*using the :not attribute and the filter class in it we are selecting
                            only the list items that don't have that class and hide them '*/
        if (filter.toLowerCase() !== 'all') {
            $(`.movie--preview:not(.${filter})`).hide();
            //Show pagination on filter = all;
            $('.pagination').hide();
        }
    });

    //5. Toggle function for additional content
    //toggle timetable show
    $('.movie__show-btn').click(function (ev) {
        ev.preventDefault();

        $(this).parents('.movie--preview').find('.time-select').slideToggle(500);
    });

    $('.time-select__item').click(function () {
        $('.time-select__item').removeClass('active');
        $(this).addClass('active');
    });
}

function init_MoviePage() {
    const cinema = $('.choosen-cinema'), time = $('.choosen-time'), date = $('.choosen-date'), movie = $('.choosen-movie');

    //1. Rating scrore init
    //Rating star
    $('.score').raty({
        width: 130,
        score: 5,
        path: `${base}/public/assets/vendor/amovie/images/rate/`,
        starOff: 'star-off.svg',
        starOn: 'star-on.svg'
    });

    //2. Swiper slider
    //Media slider
    //init employee sliders
    const mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 4
    });

    $('.swiper-slide-active').css({ marginLeft: '-1px' });

    //Media switch
    $('.list--photo').click(function (e) {
        e.preventDefault();

        const mediaFilter = $(this).attr('data-filter');

        $('.swiper-slide').hide();
        $(`.${mediaFilter}`).show();

        $('.swiper-wrapper').css('transform', 'translate3d(0px, 0px, 0px)');
        mySwiper.params.slideClass = mediaFilter;

        mySwiper.reInit();
        $('.swiper-slide-active').css({ marginLeft: '-1px' });
    });

    $('.list--video').click(function (e) {
        e.preventDefault();

        const mediaFilter = $(this).attr('data-filter');
        $('.swiper-slide').hide();
        $(`.${mediaFilter}`).show();

        $('.swiper-wrapper').css('transform', 'translate3d(0px, 0px, 0px)');
        mySwiper.params.slideClass = mediaFilter;

        mySwiper.reInit();
        $('.swiper-slide-active').css({ marginLeft: '-1px' });
    });

    //media swipe visible slide
    //Onload detect

    if (($(window).width() > 760) & ($(window).width() < 992)) {
        mySwiper.params.slidesPerView = 2;
        mySwiper.resizeFix();
    } else if (($(window).width() < 767) & ($(window).width() > 481)) {
        mySwiper.params.slidesPerView = 3;
        mySwiper.resizeFix();
    } else if (($(window).width() < 480) & ($(window).width() > 361)) {
        mySwiper.params.slidesPerView = 2;
        mySwiper.resizeFix();
    } else if ($(window).width() < 360) {
        mySwiper.params.slidesPerView = 1;
        mySwiper.resizeFix();
    } else {
        mySwiper.params.slidesPerView = 4;
        mySwiper.resizeFix();
    }

    if ($('.swiper-container').width() > 900) {
        mySwiper.params.slidesPerView = 5;
        mySwiper.resizeFix();
    }

    //Resize detect
    $(window).resize(() => {
        if (($(window).width() > 760) & ($(window).width() < 992)) {
            mySwiper.params.slidesPerView = 2;
            mySwiper.reInit();
        } else if (($(window).width() < 767) & ($(window).width() > 481)) {
            mySwiper.params.slidesPerView = 3;
            mySwiper.reInit();
        } else if (($(window).width() < 480) & ($(window).width() > 361)) {
            mySwiper.params.slidesPerView = 2;
            mySwiper.reInit();
        } else if ($(window).width() < 360) {
            mySwiper.params.slidesPerView = 1;
            mySwiper.reInit();
        } else {
            mySwiper.params.slidesPerView = 4;
            mySwiper.reInit();
        }
    });

    //3. Slider item pop up
    //boolian var
    let toggle = true;

    //pop up video media element
    $('.media-video .movie__media-item').magnificPopup({
        //disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false,

        gallery: {
            enabled: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },

        disableOn() {
            return toggle;
        }
    });

    //pop up photo media element
    $('.media-photo .movie__media-item').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        },

        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },

        disableOn() {
            return toggle;
        }
    });

    //detect if was move after click
    $('.movie__media .swiper-slide').on('mousedown', function (e) {
        toggle = true;
        $(this).on('mousemove', function testMove() {
            toggle = false;
        });
    });

    //4. Dropdown init
    //select
    $('#select-sort').selectbox({
        onChange(val, inst) {
            $(inst.input[0]).children().each(function (item) {
                $(this).removeAttr('selected');
            });
            $(inst.input[0]).find(`[value="${val}"]`).attr('selected', 'selected');
        }
    });

    //5. Datepicker init
    $('.datepicker__input').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: 'fade'
    });

    $(document).click(e => {
        const ele = $(e.target);
        if (
            !ele.hasClass('datepicker__input') &&
            !ele.hasClass('ui-datepicker') &&
            !ele.hasClass('ui-icon') &&
            !$(ele).parent().parents('.ui-datepicker').length
        ) {
            $('.datepicker__input').datepicker('hide');
        }
    });

    //6. Reply comment form
    // button more comments
    $('#hide-comments').hide();

    $('.comment-more').click(function (e) {
        e.preventDefault();
        $('#hide-comments').slideDown(400);
        $(this).hide();
    });

    //reply comment function
    $('.comment__reply').click(function (e) {
        e.preventDefault();

        $('.comment').find('.comment-form').remove();
        $(this)
            .parent()
            .append(
            "<form id='comment-form' class='comment-form' method='post'>\
                            <textarea class='comment-form__text' placeholder='Add you comment here'></textarea>\
                            <label class='comment-form__info'>250 characters left</label>\
                            <button type='submit' class='btn btn-md btn--danger comment-form__btn'>add comment</button>\
                        </form>"
            );
    });

    //7. Timetable active element
    $('.time-select__item').click(function () {
        $('.time-select__item').removeClass('active');
        $(this).addClass('active');

        //data element init
        const chooseTime = $(this).attr('data-time');
        $('.choose-indector--time').find('.choosen-area').text(chooseTime);

        //data element init
        const chooseCinema = $(this).parent().parent().find('.time-select__place').text();

        //data element set
        time.val(chooseTime);
        cinema.val(chooseCinema);
    });

    const chooseDate = $('.datepicker__input').val();

    //data element set (default)
    date.val(chooseDate);


    //7.1 Submit form
    $('#book__ticket__this__film').click(e => {
        const bookData = $('.booking-form').serialize();
        if ((time.val() == '') || (date.val() == '') || (cinema.val() == '')) {
            Notice('Anda belum memilih jam', {
                level: 'error',
                timeout: 6000
            });
        } else {
            Pjax.assign(base + 'pub/home/book2?' + bookData);
        }
    });

    //8. Toggle between cinemas timetable and map with location
    //change map - ticket list
    $('#map-switch').click(function (ev) {
        ev.preventDefault();

        $('.time-select').slideToggle(500);
        $('.map').slideToggle(500);

        $('.show-map').toggle();
        $('.show-time').toggle();
        $(this).blur();
    });

    //10. Scroll down navigation function
    //scroll down
    $('.comment-link').click(ev => {
        ev.preventDefault();
        $('html, body').stop().animate({ scrollTop: $('.comment-wrapper').offset().top - 90 }, 900, 'swing');
    });
}

function init_MoviePageFull() {
    //init employee sliders
    const mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 5
    });

    $('.swiper-slide-active').css({ marginLeft: '-1px' });

    //Media switch
    $('.list--photo').click(function (e) {
        e.preventDefault();

        const mediaFilter = $(this).attr('data-filter');

        $('.swiper-slide').hide();
        $(`.${mediaFilter}`).show();

        $('.swiper-wrapper').css('transform', 'translate3d(0px, 0px, 0px)');
        mySwiper.params.slideClass = mediaFilter;

        mySwiper.reInit();
        $('.swiper-slide-active').css({ marginLeft: '-1px' });
    });

    $('.list--video').click(function (e) {
        e.preventDefault();

        const mediaFilter = $(this).attr('data-filter');
        $('.swiper-slide').hide();
        $(`.${mediaFilter}`).show();

        $('.swiper-wrapper').css('transform', 'translate3d(0px, 0px, 0px)');
        mySwiper.params.slideClass = mediaFilter;

        mySwiper.reInit();
        $('.swiper-slide-active').css({ marginLeft: '-1px' });
    });
    //media swipe visible slide
    //Onload detect

    if (($(window).width() > 768) & ($(window).width() < 992)) {
        mySwiper.params.slidesPerView = 3;
        mySwiper.resizeFix();
    } else if (($(window).width() < 767) & ($(window).width() > 481)) {
        mySwiper.params.slidesPerView = 3;
        mySwiper.resizeFix();
    } else if (($(window).width() < 480) & ($(window).width() > 361)) {
        mySwiper.params.slidesPerView = 2;
        mySwiper.resizeFix();
    } else if ($(window).width() < 360) {
        mySwiper.params.slidesPerView = 1;
        mySwiper.resizeFix();
    } else {
        mySwiper.params.slidesPerView = 5;
        mySwiper.resizeFix();
    }

    if ($('.swiper-container').width() > 900) {
        mySwiper.params.slidesPerView = 5;
        mySwiper.resizeFix();
    }

    //Resize detect
    $(window).resize(() => {
        if (($(window).width() > 993) & ($('.swiper-container').width() > 900)) {
            mySwiper.params.slidesPerView = 5;
            mySwiper.reInit();
        }

        if (($(window).width() > 768) & ($(window).width() < 992)) {
            mySwiper.params.slidesPerView = 3;
            mySwiper.reInit();
        } else if (($(window).width() < 767) & ($(window).width() > 481)) {
            mySwiper.params.slidesPerView = 3;
            mySwiper.reInit();
        } else if (($(window).width() < 480) & ($(window).width() > 361)) {
            mySwiper.params.slidesPerView = 2;
            mySwiper.reInit();
        } else if ($(window).width() < 360) {
            mySwiper.params.slidesPerView = 1;
            mySwiper.reInit();
        } else {
            mySwiper.params.slidesPerView = 5;
            mySwiper.reInit();
        }
    });
}

function init_Rates() {
    //1. Rating fucntion
    //Rating star
    $('.score').raty({
        width: 130,
        score: 0,
        path: `${base}/public/assets/vendor/amovie/images/rate/`,
        starOff: 'star-off.svg',
        starOn: 'star-on.svg'
    });

    //After rate callback
    $('.score').click(function () {
        $(this).children().hide();

        $(this).html('<span class="rates__done">Thanks for your vote!<span>');
    });
}

function init_Cinema() {
    //1. Swiper slider
    //init cinema sliders
    const mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 8,
        loop: true
    });

    $('.swiper-slide-active').css({ marginLeft: '-1px' });
    //media swipe visible slide

    //onload detect
    if (($(window).width() > 993) & ($(window).width() < 1199)) {
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
        mySwiper.params.slidesPerView = 8;
        mySwiper.resizeFix();
    }

    //resize detect
    $(window).resize(() => {
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
            mySwiper.params.slidesPerView = 8;
            mySwiper.reInit();
        }
    });

    //2. Datepicker
    //datepicker
    $('.datepicker__input').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: 'fade'
    });

    $(document).click(e => {
        const ele = $(e.target);
        if (
            !ele.hasClass('datepicker__input') &&
            !ele.hasClass('ui-datepicker') &&
            !ele.hasClass('ui-icon') &&
            !$(ele).parent().parents('.ui-datepicker').length
        ) {
            $('.datepicker__input').datepicker('hide');
        }
    });

    //3. Comment area control
    // button more comments
    $('#hide-comments').hide();

    $('.comment-more').click(function (e) {
        e.preventDefault();
        $('#hide-comments').slideDown(400);
        $(this).hide();
    });

    //reply comment function

    $('.comment__reply').click(function (e) {
        e.preventDefault();

        $('.comment').find('.comment-form').remove();

        $(this)
            .parent()
            .append(
            "<form id='comment-form' class='comment-form' method='post'>\
                            <textarea class='comment-form__text' placeholder='Add you comment here'></textarea>\
                            <label class='comment-form__info'>250 characters left</label>\
                            <button type='submit' class='btn btn-md btn--danger comment-form__btn'>add comment</button>\
                        </form>"
            );
    });

    //4. Init map
    const mapOptions = {
        scaleControl: true,
        center: new google.maps.LatLng(51.508798, -0.131687),
        zoom: 16,
        navigationControl: false,
        streetViewControl: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    const map = new google.maps.Map(document.getElementById('cinema-map'), mapOptions);
    const marker = new google.maps.Marker({
        map,
        position: map.getCenter()
    });

    //Custome map style
    const map_style = [
        { stylers: [{ saturation: -100 }, { gamma: 3 }] },
        { elementType: 'labels.text.stroke', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.business', elementType: 'labels.text', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.business', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.place_of_worship', elementType: 'labels.text', stylers: [{ visibility: 'off' }] },
        { featureType: 'poi.place_of_worship', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
        { featureType: 'road', elementType: 'geometry', stylers: [{ visibility: 'simplified' }] },
        {
            featureType: 'water',
            stylers: [{ visibility: 'on' }, { saturation: 0 }, { gamma: 2 }, { hue: '#aaaaaa' }]
        },
        {
            featureType: 'administrative.neighborhood',
            elementType: 'labels.text.fill',
            stylers: [{ visibility: 'off' }]
        },
        { featureType: 'road.local', elementType: 'labels.text', stylers: [{ visibility: 'off' }] },
        { featureType: 'transit.station', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] }
    ];

    //Then we use this data to create the styles.
    const styled_map = new google.maps.StyledMapType(map_style, { name: 'Cusmome style' });

    map.mapTypes.set('map_styles', styled_map);
    map.setMapTypeId('map_styles');

    //=====================================

    // Maker

    //=====================================

    //Creates the information to go in the pop-up info box.
    const boxTextA = document.createElement('div');
    boxTextA.innerHTML = '<span class="pop_up_box_text">Cineworld, 63-65 Haymarket, London</span>';

    //Sets up the configuration options of the pop-up info box.
    const infoboxOptionsA = {
        content: boxTextA,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: '#4c4145',
            opacity: 1,
            width: '300px',
            color: ' #b4b1b2',
            fontSize: '13px',
            padding: '14px 20px 15px'
        },
        closeBoxMargin: '6px 2px 2px 2px',
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: 'images/components/close.svg',
        isHidden: false,
        pane: 'floatPane',
        enableEventPropagation: false
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    const infoboxA = new InfoBox(infoboxOptionsA);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(marker, 'click', function (e) {
        //Open the Glastonbury info box.
        infoboxA.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(marker.getPosition());
    });
}

function init_SinglePage() {
    //1. Swiper slider (with arrow behaviur).
    //init images sliders
    const mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        onSlideChangeStart: function change(index) {
            const i = mySwiper.activeIndex;
            const prev = i - 1;
            const next = i + 1;

            const prevSlide = $('.post__preview .swiper-slide').eq(prev).attr('data-text');
            $('.arrow-left').find('.slider__info').text(prevSlide);
            const nextSlide = $('.post__preview .swiper-slide').eq(next).attr('data-text');
            $('.arrow-right').find('.slider__info').text(nextSlide);

            //condition first-last slider
            $('.arrow-left , .arrow-right').removeClass('no-hover');

            if (i == 0) {
                $('.arrow-left').find('.slider__info').text('');
                $('.arrow-left').addClass('no-hover');
            }

            if (i == last) {
                $('.arrow-right').find('.slider__info').text('');
                $('.arrow-right').addClass('no-hover');
            }
        }
    });

    //var init and put onload value
    const i = mySwiper.activeIndex;
    var last = mySwiper.slides.length - 1;
    const prev = i - 1;
    const next = i + 1;

    const prevSlide = $('.post__preview .swiper-slide').eq(prev).attr('data-text');
    const nextSlide = $('.post__preview .swiper-slide').eq(next).attr('data-text');

    //put onload value for slider navigation
    $('.arrow-left').find('.slider__info').text(prevSlide);
    $('.arrow-right').find('.slider__info').text(nextSlide);

    //condition first-last slider
    if (i == 0) {
        $('.arrow-left').find('.slider__info').text('');
    }

    if (i == last) {
        $('.arrow-right').find('.slider__info').text('');
    }

    //init slider navigation arrow

    $('.arrow-left').on('click', e => {
        e.preventDefault();
        mySwiper.swipePrev();
    });
    $('.arrow-right').on('click', e => {
        e.preventDefault();
        mySwiper.swipeNext();
    });

    //2. Comment area control
    // button more comments
    $('#hide-comments').hide();

    $('.comment-more').click(function (e) {
        e.preventDefault();
        $('#hide-comments').slideDown(400);
        $(this).hide();
    });

    //reply comment function

    $('.comment__reply').click(function (e) {
        e.preventDefault();

        $('.comment').find('.comment-form').remove();

        $(this)
            .parent()
            .append(
            "<form id='comment-form' class='comment-form' method='post'>\
                            <textarea class='comment-form__text' placeholder='Add you comment here'></textarea>\
                            <label class='comment-form__info'>250 characters left</label>\
                            <button type='submit' class='btn btn-md btn--danger comment-form__btn'>add comment</button>\
                        </form>"
            );
    });
}

function init_Trailer() {
    //1. Element controls
    //pop up element
    $('.trailer-sample').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

    //show hide content
    $('.trailer-btn').click(function (e) {
        e.preventDefault();

        $(this).hide();
        $(this).parent().addClass('trailer-block--short').find('.hidden-content').slideDown(500);
    });
}

function init_Checkout()
{
    var url = decodeURIComponent(document.URL);
    var prevDate = url.substr(url.indexOf('?') + 1);
    //Serialize, add new data and send to next page
    $('#purchase').on('click', (e) => {
        e.preventDefault();
    var bookData = $(this).serialize();
    var fullData = prevDate + '&' + bookData;
    var action,
        control = $('.order__control-btn.active').text();

    if (control == 'Purchase') {
        action = 'book3-buy.html';
    } else if (control == 'Reserve') {
        action = 'book3-reserve.html';
    }
    var id= '<?php echo $id_transaksi ?>';
    Pjax.assign(base+'pub/home/success?t='+id)
});
}
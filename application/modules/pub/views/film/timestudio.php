<style>
.time-select .time-select__item::before {
width: 68px;
}
</style>
<?php foreach($studio as $s): 
    foreach($s->studio as $s):?>
        <div class="time-select__group group--first">
            <div class="col-sm-4">
                <p class="time-select__place"><?php echo $s->nama?></p>
            </div>
            <ul class="col-sm-8 items-wrap">
                <?php foreach ($jam as $j) {
                    foreach ($j->jam as $j) {
                        echo '<li class="time-select__item" data-time="'.$j->jam.'">'.$j->jam.'</li>';
                    }
                } ?>
            </ul>
        </div>
<?php   endforeach;
endforeach;?>

<script>
    $(document).ready(function () {
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

        var cinema = $('.choosen-cinema'),
            time = $('.choosen-time'),
            date = $('.choosen-date');
            
        $('.booking-form').submit(function() {
            var bookData = $(this).serialize();
            Pjax.assign(base+'pub/home/book2?'+bookData);
        });
    });
</script>
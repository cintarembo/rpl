<div class="col-sm-8 col-md-9">
    <?php if(!empty($film)):$a=0;?>
    <?php foreach($film as $f): ?>
        <!-- Movie variant with time -->
        <div class="movie movie--test movie--test--<?php $abc = ($a%2==0) ? 'light':'dark'; echo $abc;?> movie--test--left">
            <div class="movie__images">
                <a href="movie-page-left.html" class="movie-beta__link">
                    <img alt='<?php echo $f->judul ?>' src="<?php echo UPLOADPATH.'424x424/'.$f->cover ?>" style="width:424px;height:200px;">
                </a>
            </div>
            <div class="movie__info">
                <a href='movie-page-left.html' class="movie__title"><?php echo $f->judul ?>  </a>
                <p class="movie__time"><?php echo $f->durasi ?> min</p>
                <p class="movie__option">
                    <?php $genre = $this->gfm->with_genre()->where('id_film',$f->id_film)->get_all();
                        $a=count($genre);
                        foreach($genre as $g):
                            foreach($g->genre as $gg): ?>
                        <a href="#"><?php echo $gg->genre?></a>
                        <?php $car = ($a>1) ? '|' : '' ; echo $car;$a=$a-1;?>
                    <?php   endforeach;
                        endforeach;?>
                </p>
                
                <div class="movie__rate">
                    <?php 
                        $studio = $this->studio->get($f->id_hall);
                        echo ' <a href="#">'.$studio->nama.'</a>';
                    ?>
                    <div class="score"></div>
                    <span class="movie__rating">5.0</span>
                </div>               
            </div>
        </div>
        <!-- Movie variant with time -->
    <?php $a++;endforeach;
        else:
            echo 'Maaf data belum tersedia';
        endif;?>

    <div class="row">
        <div class="social-group">
            <div class="col-sm-6 col-md-4 col-sm-push-6 col-md-push-4">
                <div class="social-group__head">Join <br>our social groups</div>
                <div class="social-group__content">A lot of fun, discussions, queezes and contests among members. <br class="hidden-xs"><br>Always be first to know about best offers from cinemas and our partners</div>
            </div>

            <div class="col-sm-6 col-md-4 col-sm-pull-6 col-md-pull-4">
                    <div class="facebook-group">
                    <iframe class="fgroup" src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fthemeforest&amp;width=240&amp;height=330&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:330px;" allowTransparency="true"></iframe>
                </div>
            </div>
            
            <div class="clearfix visible-sm"></div>
            <div class="col-sm-6 col-md-4">
                <div class="twitter-group">
                    <div id="twitter-feed"></div>
                </div>
            </div>
        </div>
    </div>
</div>
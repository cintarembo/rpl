<style>.time-select .time-select__item::before{width: 68px;}</style>
<!-- Main content -->
<section class="container">
    <div class="col-sm-8 col-md-9">
        <div class="movie">
            <h2 class="page-heading"><?php echo $film->judul ?></h2>
            <div class="movie__info">
                <div class="col-sm-6 col-md-4 movie-mobile">
                    <div class="movie__images">
                        <span class="movie__rating">5.0</span>
                        <img alt='' src="<?php echo UPLOADPATH.'526x773/'.$film->cover?>">
                    </div>
                    <div class="movie__rate">Your vote: <div id='score' class="score"></div></div>
                </div>
                <div class="col-sm-6 col-md-8">
                    <p class="movie__time"><?php echo $film->durasi ?> min</p>

                    <p class="movie__option"><strong>Country: </strong><a href="#">New Zeland</a>, <a href="#">USA</a></p>
                    <p class="movie__option"><strong>Year: </strong><a href="#">2012</a></p>
                    <p class="movie__option"><strong>Genre: 
                    <?php 
                        $genre = $this->gfm->with_genre()->where('id_film',$film->id_film)->get_all();
                        $a=count($genre);
                        foreach ($genre as $g) {
                            foreach ($g->genre as $gg) {
                                echo '</strong><a href="#">'.$gg->genre.'</a>';
                                $koma = ($a>1) ? ', ' : '' ;
                                echo $koma;
                            }
                            $a--;
                        }
                    ?>
                    </p>
                    <p class="movie__option"><strong>Release date: </strong>December 12, 2012</p>
                    <p class="movie__option"><strong>Director: </strong><a href="#">Peter Jackson</a></p>
                    <p class="movie__option"><strong>Actors: </strong><a href="#">Martin Freeman</a>, <a href="#">Ian McKellen</a>, <a href="#">Richard Armitage</a>, <a href="#">Ken Stott</a>, <a href="#">Graham McTavish</a>, <a href="#">Cate Blanchett</a>, <a href="#">Hugo Weaving</a>, <a href="#">Ian Holm</a>, <a href="#">Elijah Wood</a> <a href="#">...</a></p>
                    <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>
                    <p class="movie__option"><strong>Box office: </strong><a href="#">$1 017 003 568</a></p>

                    <a href="#" class="comment-link">Comments:  15</a>

                    <div class="movie__btns">
                        <a href="javascript:" class="btn btn-md btn--warning" id="book__ticket__this__film">book a ticket for this movie</a>
                        <a href="#" class="watchlist">Add to watchlist</a>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <h2 class="page-heading">Sinopsis</h2>

            <p class="movie__describe"><?php echo $film->sinopsis ?></p>

            <h2 class="page-heading">photos &amp; videos</h2>
            
            <div class="movie__media">
                <div class="movie__media-switch">
                    <a href="#" class="watchlist list--photo" data-filter='media-photo'>234 photos</a>
                    <a href="#" class="watchlist list--video" data-filter='media-video'>10 videos</a>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--First Slide-->
                        <div class="swiper-slide media-video">
                        <a href='https://www.youtube.com/watch?v=Y5AehBA3IsE' class="movie__media-item ">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                        </a>
                        </div>
                        
                        <!--Second Slide-->
                        <div class="swiper-slide media-video">
                        <a href='https://www.youtube.com/watch?v=Kb3ykVYvT4U' class="movie__media-item">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                        </a>
                        </div>
                        
                        <!--Third Slide-->
                        <div class="swiper-slide media-photo"> 
                            <a href='<?php echo base_url()?>public/assets/vendor/amovie/images/2100x1250.png' class="movie__media-item">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                                </a>
                        </div>

                        <!--Four Slide-->
                        <div class="swiper-slide media-photo"> 
                            <a href='<?php echo base_url()?>public/assets/vendor/amovie/images/2100x1250.png' class="movie__media-item">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                                </a>
                        </div>

                        <!--Slide-->
                        <div class="swiper-slide media-photo"> 
                            <a href='<?php echo base_url()?>public/assets/vendor/amovie/images/2100x1250.png' class="movie__media-item">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                                </a>
                        </div>

                        <!--Slide-->
                        <div class="swiper-slide media-photo"> 
                            <a href='<?php echo base_url()?>public/assets/vendor/amovie/images/2100x1250.png' class="movie__media-item">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                                </a>
                        </div>

                        <!--First Slide-->
                        <div class="swiper-slide media-video">
                        <a href='https://www.youtube.com/watch?v=Y5AehBA3IsE' class="movie__media-item ">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                        </a>
                        </div>
                        
                        <!--Second Slide-->
                        <div class="swiper-slide media-video">
                        <a href='https://www.youtube.com/watch?v=Kb3ykVYvT4U' class="movie__media-item">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                        </a>
                        </div>

                        <!--Slide-->
                        <div class="swiper-slide media-photo"> 
                            <a href='<?php echo base_url()?>public/assets/vendor/amovie/images/2100x1250.png' class="movie__media-item">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                                </a>
                        </div>

                        <!--Slide-->
                        <div class="swiper-slide media-photo"> 
                            <a href='<?php echo base_url()?>public/assets/vendor/amovie/images/2100x1250.png' class="movie__media-item">
                                <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/400x240.png">
                                </a>
                        </div>
                
                    </div>
                </div>

            </div>

        </div>

        <h2 class="page-heading">showtime &amp; tickets</h2>
        <div class="choose-container">
            <form id='select' class="select" method='get'>
                    <select name="select_item" id="select-sort" class="select__sort" tabindex="0">
                    <option value="1">London</option>
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
                <input type="text" id="datepicker" value='03/10/2018' class="datepicker__input">
            </div>

            <div class="clearfix"></div>

            <div class="time-select">
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
            </div>
            
            <!-- hiden maps with multiple locator-->
            <div  class="map">
                <div id='cimenas-map'></div> 
            </div>

            <h2 class="page-heading">comments (15)</h2>

            <div class="comment-wrapper">
                <form id="comment-form" class="comment-form" method='post'>
                    <textarea class="comment-form__text" placeholder='Add you comment here'></textarea>
                    <label class="comment-form__info">250 characters left</label>
                    <button type='submit' class="btn btn-md btn--danger comment-form__btn">add comment</button>
                </form>

                <div class="comment-sets">

                <div class="comment">
                    <div class="comment__images">
                        <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/50x50.png">
                    </div>

                    <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                    <p class="comment__date">today | 03:04</p>
                    <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                    <a href='#' class="comment__reply">Reply</a>
                </div>

                <div class="comment">
                    <div class="comment__images">
                        <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/50x50.png">
                    </div>

                    <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia Gozha</a>
                    <p class="comment__date">22.10.2013 | 14:40</p>
                    <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                    <a href='#' class="comment__reply">Reply</a>
                </div>

                <div class="comment comment--answer">
                    <div class="comment__images">
                        <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/50x50.png">
                    </div>

                    <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Dmitriy Pustovalov</a>
                    <p class="comment__date">today | 10:19</p>
                    <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                    <a href='#' class="comment__reply">Reply</a>
                </div>

                <div class="comment comment--last">
                    <div class="comment__images">
                        <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/50x50.png">
                    </div>

                    <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Sia Andrews</a>
                    <p class="comment__date"> 22.10.2013 | 12:31 </p>
                    <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                    <a href='#' class="comment__reply">Reply</a>
                </div>

                <div id='hide-comments' class="hide-comments">
                    <div class="comment">
                        <div class="comment__images">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/50x50.png">
                        </div>

                        <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                        <p class="comment__date">today | 03:04</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment">
                        <div class="comment__images">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/50x50.png">
                        </div>

                        <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia Gozha</a>
                        <p class="comment__date">22.10.2013 | 14:40</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>
                </div>

                <div class="comment-more">
                    <a href="#" class="watchlist">Show more comments</a>
                </div>

            </div>
            </div>
        </div>
    </div>
    <form id='film-and-time' class="booking-form" method='get' action="javascript:">
        <input type='text' name='film' value="<?php echo $film->judul ?>" class="choosen-movie">
        <input type='text' name='tanggal' class="choosen-date" required>
        
        <input type='text' name='studio' class="choosen-cinema" required>
        <input type='text' name='jam' class="choosen-time" required>
    </form>
    <aside class="col-sm-4 col-md-3">
        <div class="sitebar">
            <div class="banner-wrap">
                <img alt='banner' src="<?php echo base_url()?>public/assets/vendor/amovie/images/500x500.png">
            </div>

                <div class="banner-wrap">
                <img alt='banner' src="<?php echo base_url()?>public/assets/vendor/amovie/images/500x500.png">
            </div>

                <div class="banner-wrap banner-wrap--last">
                <img alt='banner' src="<?php echo base_url()?>public/assets/vendor/amovie/images/500x500.png">
            </div>

            <div class="promo marginb-sm">
                <div class="promo__head">A.Movie app</div>
                <div class="promo__describe">for all smartphones<br> and tablets</div>
                <div class="promo__content">
                    <ul>
                        <li class="store-variant"><a href="#"><img alt='' src="images/apple-store.svg"></a></li>
                        <li class="store-variant"><a href="#"><img alt='' src="images/google-play.svg"></a></li>
                        <li class="store-variant"><a href="#"><img alt='' src="images/windows-store.svg"></a></li>
                    </ul>
                </div>
            </div>

            <div class="category category--discuss category--count marginb-sm mobile-category ls-cat">
                <h3 class="category__title">the Most <br><span class="title-edition">discussed posts</span></h3>
                <ol>
                    <li><a href="#" class="category__item">Gravity</a></li>
                    <li><a href="#" class="category__item">The Counselor</a></li>
                    <li><a href="#" class="category__item">Bad Grandpa</a></li>
                    <li><a href="#" class="category__item">Blue Is the Warmest Color</a></li>
                    <li><a href="#" class="category__item">Rush</a></li>
                    <li><a href="#" class="category__item">Captain Phillips</a></li>
                    <li><a href="#" class="category__item">Escape Plan</a></li>
                    <li><a href="#" class="category__item">Cloudy with a Chance of Meatballs 2</a></li>
                    <li><a href="#" class="category__item">Prisoners</a></li>
                    <li><a href="#" class="category__item">The Fifth Estate</a></li>
                </ol>
            </div>

            <div class="category category--cooming category--count marginb-sm mobile-category rs-cat">
                <h3 class="category__title">coming soon<br><span class="title-edition">movies</span></h3>
                <ol>
                    <li><a href="#" class="category__item">Ender's Game</a></li>
                    <li><a href="#" class="category__item">About Time</a></li>
                    <li><a href="#" class="category__item">Last Vegas</a></li>
                    <li><a href="#" class="category__item">Free Birds</a></li>
                    <li><a href="#" class="category__item">The Wolf of Wall Street</a></li>
                    <li><a href="#" class="category__item">The Best Man Holiday</a></li>
                    <li><a href="#" class="category__item">The Book Thief</a></li>
                    <li><a href="#" class="category__item">The Hunger Games: Catching Fire</a></li>
                    <li><a href="#" class="category__item">Delivery Man</a></li>
                    <li><a href="#" class="category__item">Nebraska</a></li>
                </ol>
            </div>
        </div>
    </aside>

</section>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        init_MoviePage();
    });
</script>
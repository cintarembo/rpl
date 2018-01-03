<?php 
$this->load->view('home/slider');
echo '<main class="container">';
$this->load->view('home/best') ?>
            <div class="col-sm-12">
                <div class="mega-select-present mega-select-top mega-select--full">
                    <div class="mega-select-marker">
                        <div class="marker-indecator location">
                            <p class="select-marker"><span>movie to watch now</span> <br>in your city</p>
                        </div>

                        <div class="marker-indecator cinema">
                            <p class="select-marker"><span>find your </span> <br>cinema</p>
                        </div>

                        <div class="marker-indecator film-category">
                            <p class="select-marker"><span>find movie due to </span> <br> your mood</p>
                        </div>

                        <div class="marker-indecator actors">
                            <p class="select-marker"><span> like particular stars</span> <br>find them</p>
                        </div>

                        <div class="marker-indecator director">
                            <p class="select-marker"><span>admire personalities - find </span> <br>by director</p>
                        </div>

                        <div class="marker-indecator country">
                            <p class="select-marker"><span>search for movie from certain </span> <br>country?</p>
                        </div>
                    </div>

                      <div class="mega-select pull-right">
                          <span class="mega-select__point">Search by</span>
                          <ul class="mega-select__sort">
                              <li class="filter-wrap"><a href="#" class="mega-select__filter filter--active" data-filter='location'>Location</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='cinema'>Cinema</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='film-category'>Category</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='actors'>Actors</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='director'>Director</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='country'>Country</a></li>
                          </ul>

                          <input name="search-input" type='text' class="select__field">
                          
                          <div class="select__btn">
                            <a href="#" class="btn btn-md btn--danger location">find <span class="hidden-exrtasm">your city</span></a>
                            <a href="#" class="btn btn-md btn--danger cinema">find <span class="hidden-exrtasm">suitable cimema</span></a>
                            <a href="#" class="btn btn-md btn--danger film-category">find <span class="hidden-exrtasm">best category</span></a>
                            <a href="#" class="btn btn-md btn--danger actors">find <span class="hidden-exrtasm">talented actors</span></a>
                            <a href="#" class="btn btn-md btn--danger director">find <span class="hidden-exrtasm">favorite director</span></a>
                            <a href="#" class="btn btn-md btn--danger country">find <span class="hidden-exrtasm">produced country</span></a>
                          </div>

                          <div class="select__dropdowns">
                              <ul class="select__group location">
                                <li class="select__variant" data-value='London'>London</li>
                                <li class="select__variant" data-value='New York'>New York</li>
                                <li class="select__variant" data-value='Paris'>Paris</li>
                                <li class="select__variant" data-value='Berlin'>Berlin</li>
                                <li class="select__variant" data-value='Moscow'>Moscow</li>
                                <li class="select__variant" data-value='Minsk'>Minsk</li>
                                <li class="select__variant" data-value='Warsawa'>Warsawa</li>
                              </ul>

                              <ul class="select__group cinema">
                                <li class="select__variant" data-value='Cineworld'>Cineworld</li>
                                <li class="select__variant" data-value='Empire'>Empire</li>
                                <li class="select__variant" data-value='Everyman'>Everyman</li>
                                <li class="select__variant" data-value='Odeon'>Odeon</li>
                                <li class="select__variant" data-value='Picturehouse'>Picturehouse</li>
                              </ul>

                              <ul class="select__group film-category">
                                <li class="select__variant" data-value="Children's">Children's</li>
                                <li class="select__variant" data-value='Comedy'>Comedy</li>
                                <li class="select__variant" data-value='Drama'>Drama</li>
                                <li class="select__variant" data-value='Fantasy'>Fantasy</li>
                                <li class="select__variant" data-value='Horror'>Horror</li>
                                <li class="select__variant" data-value='Thriller'>Thriller</li>
                              </ul>

                              <ul class="select__group actors">
                                <li class="select__variant" data-value='Leonardo DiCaprio'>Leonardo DiCaprio</li>
                                <li class="select__variant" data-value='Johnny Depp'>Johnny Depp</li>
                                <li class="select__variant" data-value='Jack Nicholson'>Jack Nicholson</li>
                                <li class="select__variant" data-value='Robert De Niro'>Robert De Niro</li>
                                <li class="select__variant" data-value='Morgan Freeman'>Morgan Freeman</li>
                                <li class="select__variant" data-value='Jim Carrey'>Jim Carrey</li>
                                <li class="select__variant" data-value='Adam Sandler'>Adam Sandler</li>
                                <li class="select__variant" data-value='Ben Stiller'>Ben Stiller</li>
                              </ul>

                              <ul class="select__group director">
                                <li class="select__variant" data-value='Steven Spielberg'>Steven Spielberg</li>
                                <li class="select__variant" data-value='Martin Scorsese'>Martin Scorsese</li>
                                <li class="select__variant" data-value='Guy Ritchie'>Guy Ritchie</li>
                                <li class="select__variant" data-value='Christopher Nolan'>Christopher Nolan</li>
                                <li class="select__variant" data-value='Tim Burton'>Tim Burton</li>
                              </ul>

                              <ul class="select__group country">
                                <li class="select__variant" data-value='USA'>USA</li>
                                <li class="select__variant" data-value='Germany'>Germany</li>
                                <li class="select__variant" data-value='Australia'>Australia</li>
                                <li class="select__variant" data-value='UK'>UK</li>
                                <li class="select__variant" data-value='Japan'>Japan</li>
                                <li class="select__variant" data-value='Serbia'>Serbia</li>
                              </ul>
                          </div>
                      </div>
                  </div>
            </div>
            
            <div class="clearfix"></div>

            <h2 id='target' class="page-heading heading--outcontainer">Now in the cinema</h2>

            <div class="col-sm-12">
                <div class="row">
                    <!-- Main Content -->
                    <?php $this->load->view('home/listmovie');?>

                    <aside class="col-sm-4 col-md-3">
                        <div class="sitebar first-banner--left">
                            <div class="banner-wrap first-banner--left">
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
                                      <li class="store-variant"><a href="#"><img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/apple-store.svg"></a></li>
                                      <li class="store-variant"><a href="#"><img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/google-play.svg"></a></li>
                                      <li class="store-variant"><a href="#"><img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/windows-store.svg"></a></li>
                                  </ul>
                              </div>
                          </div>
    
                        </div>
                    </aside>
                </div>
            </div>

            <div class="col-sm-12">
                <h2 class="page-heading">Latest news</h2>

                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/270x330.png">
                            <div class="social social--position social--hide">
                                <span class="social__name">Share:</span>
                                <a href='#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">22 October 2013 </p>
                        <a href="single-page-left.html" class="post__title">"Thor: The Dark World" - World Premiere</a>
                        <a href="single-page-left.html" class="btn read-more post--btn">read more</a>
                    </div>
                </div>
                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/270x330.png">
                            <div class="social social--position social--hide">
                                <span class="social__name">Share:</span>
                                <a href='#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">22 October 2013 </p>
                        <a href="single-page-left.html" class="post__title">30th Annual Night Of Stars Presented By The Fashion Group International</a>
                        <a href="single-page-left.html" class="btn read-more post--btn">read more</a>
                    </div>
                </div>
                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="<?php echo base_url()?>public/assets/vendor/amovie/images/270x330.png">
                            <div class="social social--position social--hide">
                                <span class="social__name">Share:</span>
                                <a href='#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">22 October 2013 </p>
                        <a href="single-page-left.html" class="post__title">Hollywood Film Awards 2013</a>
                        <a href="single-page-left.html" class="btn read-more post--btn">read more</a>
                    </div>
                </div>
            </div>                
</main>

 <!-- jQuery REVOLUTION Slider -->
<script type="text/javascript" src="<?php echo base_url()?>public/assets/vendor/amovie/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/assets/vendor/amovie/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

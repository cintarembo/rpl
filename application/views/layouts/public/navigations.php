<!-- Banner -->
<div class="banner-top">
    <img alt='top banner' src="<?php echo base_url()?>public/assets/vendor/amovie/images/1600x90.png">
</div>

<!-- Header section header-wrapper__home-->
<header class="header-wrapper ">
    <div class="container">
        <!-- Logo link-->
        <a href='<?php echo base_url()?>pub/home/' class="logo">
            <img alt='logo' src="<?php echo base_url()?>public/assets/vendor/amovie/images/logo.png">
        </a>
        
        <!-- Main website navigation-->
        <nav id="navigation-box">
            <!-- Toggle for mobile menu mode -->
            <a href="#" id="navigation-toggle">
                <span class="menu-icon">
                    <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                    <span class="lines"></span>
                    </span>
                </span>
            </a>
            
            <!-- Link navigation -->
            <ul id="navigation">
                <!-- 
               <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="page-elements.html">Features</a>
                    <ul>
                        <li class="menu__nav-item"><a href="typography.html">Typography</a></li>
                        <li class="menu__nav-item"><a href="page-elements.html">Shortcodes</a></li>
                        <li class="menu__nav-item"><a href="column.html">Columns</a></li>
                        <li class="menu__nav-item"><a href="icon-font.html">Icons</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="page-elements.html">Booking steps</a>
                    <ul>
                        <li class="menu__nav-item"><a href="book1.html">Booking step 1</a></li>
                        <li class="menu__nav-item"><a href="book2.html">Booking step 2</a></li>
                        <li class="menu__nav-item"><a href="book3-buy.html">Booking step 3 (buy)</a></li>
                        <li class="menu__nav-item"><a href="book3-reserve.html">Booking step 3 (reserve)</a></li>
                        <li class="menu__nav-item"><a href="book-final.html">Final ticket view</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="gallery-four.html">Gallery</a>
                    <ul>
                        <li class="menu__nav-item"><a href="gallery-four.html">4 col gallery</a></li>
                        <li class="menu__nav-item"><a href="gallery-three.html">3 col gallery</a></li>
                        <li class="menu__nav-item"><a href="gallery-two.html">2 col gallery</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="news-left.html">News</a>
                    <ul>
                        <li class="menu__nav-item"><a href="news-left.html">News (rigth sidebar)</a></li>
                        <li class="menu__nav-item"><a href="news-right.html">News (left sidebar)</a></li>
                        <li class="menu__nav-item"><a href="news-full.html">News (full widht)</a></li>
                        <li class="menu__nav-item"><a href="single-page-left.html">Single post (rigth sidebar)</a></li>
                        <li class="menu__nav-item"><a href="single-page-right.html">Single post (left sidebar)</a></li>
                        <li class="menu__nav-item"><a href="single-page-full.html">Single post (full widht)</a></li>
                    </ul>
                </li>
                
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="#">Mega menu</a>
                    <ul class="mega-menu container">
                            <li class="col-md-3 mega-menu__coloum">
                                <h4 class="mega-menu__heading">Now in the cinema</h4>
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">The Counselor</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Bad Grandpa</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Blue Is the Warmest Color</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Capital</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Spinning Plates</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Bastards</a></li>
                                </ul>
                            </li>
                                
                            <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Gravity</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Captain Phillips</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Carrie</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Cloudy with a Chance of Meatballs 2</a></li>
                                </ul>
                            </li>
                            
                            <li class="col-md-3 mega-menu__coloum">
                                <h4 class="mega-menu__heading">Ending soon</h4>
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Escape Plan</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Rush</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Prisoners</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Enough Said</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">The Fifth Estate</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Runner Runner</a></li>
                                </ul>
                            </li>
                            
                            <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Insidious: Chapter 2</a></li>
                                </ul>
                            </li>
                    </ul>
                </li>
                 -->
            </ul>
        </nav>
        
        <!-- Additional header buttons / Auth and direct link to booking-->
        <div class="control-panel">
        
            <?php if ($this->ion_auth->logged_in()) {
    $user = $this->ion_auth->user()->row();
    echo '
                <div class="auth auth--home">
                    <div class="auth__show">
                        <span class="auth__image">
                        <img alt="" src="'.base_url().'public/assets/vendor/amovie/images/31x31.png">
                        </span>
                    </div>
                    <a href="#" class="btn btn--sign btn--singin">
                        '.$user->username.'
                    </a>
                        <ul class="auth__function">
                            <li><a href="'.base_url().'pub/member/bookedtickets" class="auth__function-item">Booked tickets</a></li>
                            <li><a href="'.base_url().'auth/logout" class="auth__function-item" id="logout">Log out</a></li>
                        </ul>

                </div>
                <a href="'.base_url().'pub/home/movielist" class="btn btn-md btn--warning btn--book btn-control--home login-window">Book a ticket</a>
                ';
} else {
    echo '
                    <a href="'.base_url().'pub/home/login" class="btn btn--sign">Sign in</a>
                    <a href="#" class="btn btn-md btn--warning btn--book">Book a ticket</a>
                ';
}?>
        </div>

    </div>
</header>
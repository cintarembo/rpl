<div class="movie-best">
    <div class="col-sm-10 col-sm-offset-1 movie-best__rating">Featured Movie</div>
    <div class="col-sm-12 change--col">
        <?php if(!empty($film)):
            $no=1;
            foreach ($film as $f):
                if($no==1){$class = '';
                }elseif($no==2){$class = 'second--item';
                }elseif($no==3){$class = 'third--item';
                }elseif($no==4){$class = 'hidden-xs';
                }elseif($no==5){$class = 'hidden-xs hidden-sm';
                }else{$class = 'hidden-xs hidden-sm';}
                if (($f->featured==1) && ($f->status==1)):
                    $genre = $this->gfm->with_genre()->where('id_film',$f->id_film)->get_all(); $a=count($genre);?>
                    <div class="movie-beta__item '.$class.'">
                    <img alt="" src="<?php echo UPLOADPATH.'380x600/'.$f->cover ?>" style="height:281px;width:179.95px">
                        <span class="best-rate">5.0</span>
                        <ul class="movie-beta__info">
                            <li>
                            <p class="movie__time"><?php echo $f->durasi ?> min</p>
                            <p>38 comments</p>
                            </li>
                            <p>
                                <?php foreach ($genre as $g):
                                        foreach($g->genre as $gg):?>
                                            <?php echo $gg->genre?>
                                            <?php $car = ($a>1) ? '|' : '' ; echo $car;
                                            $a=$a-1;
                                            ?>
                                            
                                <?php   endforeach;
                                    endforeach;?>
                            </p>
                            <li class="last-block">
                                <a href="<?php echo base_url()?>pub/home/view/<?php echo $f->slug?>" class="slide__link">more</a>
                            </li>
                        </ul>
                    </div>
                    
        <?php
                else:
                endif;
            $no++;
            endforeach;
        else:
        endif;?>
    </div>
    <div class="col-sm-10 col-sm-offset-1 movie-best__check">check all movies now playing</div>
</div>
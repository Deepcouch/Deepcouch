<?php
               query_posts('cat=6,7,8&showposts=5');
               while (have_post_thumbnails()) : the_post_thumbnails();
            ?>
               <li class="home-actu">
                     <span class="date-actu">Le <?php the_date(); ?></span><br />
                     <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                     <strong><?php the_title(); ?></strong><br /></a>

                     <span class="intro-actu"><?php the_excerpt(); ?></span>

                     <span class="suite-actu"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">En savoir plus</a></span>
               </li>   
            <?php 
               $cpt+=1;
               endwhile; 
            ?>
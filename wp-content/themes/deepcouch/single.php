 <?php if ( have_post_thumbnails() ) : while ( have_post_thumbnails() ) : the_post_thumbnails(); ?>

 <?php if (in_category('3')) continue; ?>
 
 <div class="post">
 
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
 
  <small><?php the_time('F jS, Y'); ?></small>
 
  <div class="entry">
    <?php the_content(); ?>
  </div>

  <p class="postmetadata">Posted in <?php the_category(', '); ?></p>
 </div> <!-- fin du premier bloc div -->

 <?php endwhile; else: ?>
 <p>Sorry, no posts matched your criteria.</p>
 <?php endif; ?>
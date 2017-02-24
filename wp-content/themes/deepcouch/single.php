<?php get_header();
while ( have_posts() ) : the_post(); ?>
<br>
<section class="row">
    <article class="col s12 l5 offset-l1">
        <?php the_post_thumbnail('medium', ['class' => 'materialboxed']); ?>
    </article>
</section>
<section class="row">
    <article class="col s12">
        <div class="col s10 offset-s1">
            <div class="card">
                <div class="card-title center">
                    <?php the_title(); ?>
                </div>
                <div class="card-content">
                    <div class="row">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>

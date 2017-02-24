<?php include 'header.php'; ?>
<section class="row">
    <article class="col s12">
<?php if (have_posts()) : ?>
    <div class="col s12">
        <div class="card">
            <div class="card-title">
                Derniers articles
            </div>
            <div class="card-content">
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col s6 m3 l2">
                            <div class="card">
                                <div class="card-image">
                                    <?php the_post_thumbnail([150, 150]); ?>
                                    <span class="card-title"><a href="<?php the_permalink(); ?>" class="orange-text color-hov"><?php the_title(); ?></a></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php else:
    echo _e('Sorry, no posts matched your criteria.');
endif; ?>
    </article>
</section>
<?php include 'footer.php'; ?>

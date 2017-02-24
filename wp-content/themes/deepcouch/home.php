<?php include 'header.php'; ?>
<?php if (have_posts()) : ?>
    <section class="slider">
        <ul class="slides">
            <?php query_posts('category_name=news&posts_per_page=4');
            $pos = 'center';
            while (have_posts()) : the_post(); ?>
            <li>
                <?php the_post_thumbnail(); ?>
                <div class="caption <?php echo $pos; ?>-align">
                    <h3><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>" class="btn orange">Lire l'article</a>
                </div>
            </li>
            <?php switch ($pos) {
                case 'center':
                    $pos = 'left';
                    break;
                case 'left':
                    $pos = 'right';
                    break;
                case 'right':
                    $pos = 'center';
                    break;
                default:
                    $pos = 'center';
                    break;
            }
        endwhile; ?>
    </section>
</ul>
<?php else:
    echo _e('Sorry, no posts matched your criteria.');
endif; ?>
<section class="row">
    <article class="col l12">
        <?php query_posts('posts_per_page=6&category__in=6,2');?>
<?php if (have_posts()) : ?>
    <div class="col s12 m6 l6">
        <div class="card">
            <div class="card-title">
                Derniers films
            </div>
            <div class="card-content">
                <div class="row">
                    <?php
                    while (have_posts()) : the_post();
                        if (in_category('films')) { ?>
                        <div class="col s12 m6 l4">
                            <a href="<?php the_permalink(); ?>">
                            <div class="card">
                                <div class="card-image">
                                    <?php the_post_thumbnail([150, 150]); ?>
                                    <span class="card-title"><?php the_title(); ?></span>
                                </div>
                            </div>
                        </a>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php else:
    echo _e('Sorry, no posts matched your criteria.');
endif;
query_posts('posts_per_page=6&category__in=6,3');;
if (have_posts()) : ?>
    <div class="col s12 m6 l6">
        <div class="card">
            <div class="card-title">
                Dernières séries
            </div>
            <div class="card-content">
                <div class="row">
                    <?php while (have_posts()) : the_post();
                        if (in_category('series')) { ?>
                            <div class="col s12 m6 l4">
                                <a href="<?php the_permalink(); ?>" >
                                <div class="card">
                                    <div class="card-image">
                                        <?php the_post_thumbnail([150, 150]); ?>
                                        <span class="card-title"><?php the_title(); ?></span>
                                    </div>
                                </div>
                                </a>
                            </div>
                        <?php
                        } ?>
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
<section class="row">
    <article class="col l12">
<?php if (have_posts()) : ?>
    <div class="col s12 l8">
        <div class="card">
            <div class="card-title">
                Derniers articles
            </div>
            <div class="card-content">
                <div class="row">
                    <?php query_posts('category_name=news&posts_per_page=4');
                    while (have_posts()) : the_post(); ?>
                        <div class="col s12 m6 l6">
                            <div class="card horizontal">
                                <div class="card-image">
                                    <?php the_post_thumbnail([128.82, 128.82]); ?>
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <p><?php the_title(); ?></p>
                                    </div>
                                    <div class="card-action center">
                                        <a href="<?php the_permalink(); ?>">Lire</a>
                                    </div>
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
<?php if (have_posts()) : ?>
    <div class="col s12 l4">
        <div class="card">
            <div class="card-title">
                Prochainement
            </div>
            <div class="card-content">
                <ul class="collection">
                    <?php query_posts('category_name=soon&posts_per_page=7');
                    while (have_posts()) : the_post(); ?>
                        <li class="collection-item"><a href="<?php the_permalink(); ?>" class="orange-text"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
<?php else:
    echo _e('Sorry, no posts matched your criteria.');
endif; ?>
    </article>
</session>
<section class="row">
    <article class="col s12 l6 offset-l3">

    </article>
</section>
<?php include 'footer.php'; ?>

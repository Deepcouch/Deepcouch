
<?php get_header();

global $post;
$meta = get_post_meta($post->ID);

?>
<main role="main">
    <div class="parallax-container">
        <div class="parallax">

            <img src="<?php echo $meta["bg_image"][0];?>" alt="Responsive image">
        </div>
    </div>
    <section class="section-white row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="center"><?php the_title(); ?></h1>
        <div class="col s12">
            <div class="col s10 offset-s1">
                <ul class="tabs">
                    <li class="tab col s2"><a href="#test1"><i class="material-icons">home</i></a></li>
                    <li class="tab col s2"><a href="#test2"><i class="material-icons">play_arrow</i></a></li>
                    <li class="tab col s2" style="display: none;"><a href="#test4"><i class="material-icons">multiline_chart</i></a></li>

                </ul>
            </div>

            <article  id="test1" class="center">
                <div class="col l6 m12 s12 top">
                    <?php the_post_thumbnail(array(300,9999)); ?>
                </div>
                <div class="col l6 m12 s12 top">
                    <?php the_content(); ?>
                </div>
            </article>

            <div id="test2" class="row">
                <div class="col l12">
                        <?php for($i=0; $i < count($meta['ba']); $i++){?>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image">
                                <?php echo $meta["ba"][0];?>
                                <span class="card-title">Vidéo 1</span>
                                </div>
                                <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                                </div>
                                <div class="card-action center">
                                <a href="#">Voir la bande-annonce</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                </div>
            </div>

        </div>

    </section>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</main>

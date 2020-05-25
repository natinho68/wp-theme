<?php get_header() ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1><?php the_title() ?></h1>
    <?php if (get_post_meta(get_the_ID(), SponsoMetabox::META_KEY, true) === '1'): ?>
    <div class="alert alert-info">
        This article is sponsored
    </div>
    <?php endif; ?>
    <p>
        <img src="<?php the_post_thumbnail_url(); ?>" style="width:100%; height: auto;" />
    </p>
    <?php the_content() ?>
<?php endwhile; endif; ?>
<?php get_footer() ?>

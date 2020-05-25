<?php get_header() ?>
<?php get_template_part('partials/race-filter', 'post') ?>

<?php if (have_posts()): ?>
    <div class="row">

        <?php while (have_posts()): the_post(); ?>
            <div class="col-sm-4 mb-4">
                <?php get_template_part('partials/card', 'post') ?>
            </div>
        <?php endwhile; ?>

    </div>

    <?php manniPagination() ?>

<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>

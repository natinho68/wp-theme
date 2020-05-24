<?php get_header() ?>

<?php if (have_posts()): ?>
    <div class="row">

        <?php while (have_posts()): the_post(); ?>
            <div class="col-sm-4">
                <div class="card">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_author(); ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category(); ?></h6>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Voir l'article</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>

    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>

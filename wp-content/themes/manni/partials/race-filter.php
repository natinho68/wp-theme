<?php $races = get_terms(['taxonomy' => 'race']) ?>
<?php if (is_array($races)): ?>
    <ul class="nav nav-pills my-4">
        <?php foreach ($races as $race): ?>
            <li class="nav-item">
                <a href="<?= get_term_link($race) ?>"
                   class="nav-link <?= is_tax('race', $race->term_id) ? ' active' : '' ?>">
                    <?= $race->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php $pager->setSurroundCount(2) ?>

<nav class="d-inline-block" aria-label="Page navigation">
    <ul class=" pagination mb-0">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
            </li>
        <?php endif ?>


        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>

                    <?= $link['active'] ? '<span class="sr-only">(current)</span></a>' : '' ?>
                </a>
            </li>

        <?php endforeach ?>


        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>"><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>"><i class="fas fa-angle-double-right"></i></a>
            </li>
        <?php endif ?>
    </ul>
</nav>
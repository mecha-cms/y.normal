<?php

$page = $lot['page'];
$view = isset($state->x->view);

?>
<header class="page-header">
  <p class="page-meta">
    <time class="page-time" datetime="<?= eat($page->time->format('c')); ?>">
      <?= $page->time('%A, %B %d, %Y'); ?>
      <?= $view ? ' &#x00b7; ' . i('%d View' . (1 === ($v = $page->view) ? "" : 's'), [$v]) : ""; ?>
    </time>
  </p>
  <h4 class="page-title">
    <?php if ($page->link): ?>
      <a class="page-link" href="<?= eat($page->link); ?>" target="_blank">
        <?= $page->title; ?>
      </a>
    <?php elseif ($page->url): ?>
      <?php $children = $page->children; ?>
      <a class="page-url" href="<?= eat($page->url . ($children && $children->count ? '/1' : "")); ?>">
        <?= $page->title; ?>
      </a>
    <?php else: ?>
      <span class="a">
        <?= $page->title; ?>
      </span>
    <?php endif; ?>
  </h4>
</header>
<div class="page-body">
  <?php if ($excerpt = $page->excerpt): ?>
    <div class="page-excerpt">
      <?= $excerpt; ?>
      <p role="group">
        <a href="<?= eat($page->url . '#next:' . $page->id); ?>">
          <?= i('Continue'); ?>
        </a>
      </p>
    </div>
  <?php else: ?>
  <div class="page-description">
    <p>
      <?= $page->description; ?>
    </p>
  </div>
  <?php endif; ?>
</div>
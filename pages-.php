<?php

$page = $lot['page'];
$view = !empty($state->x->view);

?>
<header class="page-header">
  <p class="page-meta">
    <time class="page-time" datetime="<?= $page->time->ISO8601; ?>">
      <?= $page->time->{r('-', '_', $site->language)}; ?>
      <?= $view ? ' &#x00B7; ' . $page->view : ""; ?>
    </time>
  </p>
  <h4 class="page-title">
    <?php if ($page->link): ?>
    <a class="page-link" href="<?= $page->link; ?>" target="_blank">
      <?= $page->title; ?>
    </a>
    <?php elseif ($page->url): ?>
    <a class="page-url" href="<?= $page->url; ?>">
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
    <p>
      <a href="<?= $page->url; ?>#next:<?= $page->id; ?>">
        <?= i('Read More'); ?>
      </a>
    </p>
  </div>
  <?php else: ?>
  <div class="page-description">
    <p>
      <?= To::excerpt((string) $page->description); ?>
    </p>
  </div>
  <?php endif; ?>
</div>

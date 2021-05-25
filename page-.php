<?php $view = !empty($state->x->view); ?>
<header class="page-header">
  <?php if ($site->has('page') && $site->has('parent')): ?>
    <p class="page-meta">
      <time class="page-time" datetime="<?= $page->time->ISO8601; ?>">
        <?= $page->time->{r('-', '_', $site->language)}; ?>
        <?= $view ? ' &#x00B7; ' . $page->view : ""; ?>
      </time>
    </p>
  <?php endif; ?>
  <h2 class="page-title">
    <span class="a">
      <?= $page->title; ?>
    </span>
  </h2>
</header>
<div class="page-body">
  <div class="page-content">
    <?= $page->content; ?>
  </div>
  <?php if ($page->link): ?>
    <p>
      <a class="button page-link" href="<?= $page->link; ?>">
        <?= i('Direct Link'); ?>
      </a>
    </p>
  <?php endif; ?>
</div>
<?php if ($site->has('page') && $site->has('parent')): ?>
  <footer class="page-footer p">
    <div>
      <?= i('Posted by %s at %s', [self::get('author.page', $lot), '<time datetime="' . $page->time->ISO8601 . '">' . $page->time('%r') . '</time>']); ?>
    </div>
    <div>
      <?= self::get('tags.page', $lot); ?>
    </div>
  </footer>
<?php endif; ?>

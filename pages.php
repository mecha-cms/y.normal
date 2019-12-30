<?= self::before(); ?>
<?php if ($pages->count): ?>
<?php foreach ($pages as $page): ?>
<article class="page type:<?= c2f($page->type); ?>" id="page:<?= $page->id; ?>">
  <?php if (has(['Image', 'Log', 'Quote', 'Video'], $page->type)): ?>
  <?= $page->content; ?>
  <p>
    <?= self::get('page.author', ['author' => $page->author]); ?> &#x00B7; <a href="<?= $page->url; ?>">
      <time datetime="<?= $page->time->ISO8601; ?>">
        <?= $page->time->{r('-', '_', $site->language)}; ?>
      </time>
    </a>
  </p>
  <?php else: ?>
  <?= self::get('-pages', ['page' => $page]); ?>
  <?php endif; ?>
</article>
<?php endforeach; ?>
<?php else: ?>
<article class="page">
  <div class="page-body">
    <div class="page-content">
      <p>
        <?= i('No %s yet.', ['articles']); ?>
      </p>
    </div>
  </div>
</article>
<?php endif; ?>
<?= self::pager(); ?>
<?= self::after(); ?>

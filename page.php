<?= self::before(); ?>
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
<?= self::get('-page', [
    'author' => $page->author,
    'tags' => $page->tags
]); ?>
<?php endif; ?>
</article>
<?php if ($site->has('parent')): ?>
<?= self::pager(); ?>
<?= self::comments(); ?>
<?php endif; ?>
<?= self::after(); ?>

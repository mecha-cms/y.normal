<?= self::enter(); ?>
<article class="page type:<?= c2f($page->type); ?>" id="page:<?= $page->id; ?>">
  <?= self::get('page-', [
      'author' => $page->author,
      'tags' => $page->tags
  ]); ?>
</article>
<?php if ($site->has('parent')): ?>
  <?= self::pager(); ?>
  <?= isset($state->x->comment) ? self::comments() : ""; ?>
<?php endif; ?>
<?= self::exit(); ?>
<?= self::enter(); ?>
<?php if ($page->exist): ?>
  <article class="page type:<?= c2f($page->type); ?>" id="page:<?= eat($page->id); ?>">
    <?= self::get('page-', [
        'author' => $page->author,
        'tags' => $page->tags
    ]); ?>
  </article>
  <?php if ($site->has('parent')): ?>
    <?= isset($state->x->comment) ? self::comments() : ""; ?>
  <?php endif; ?>
<?php else: ?>
  <article class="page">
    <div class="page-body">
      <div class="page-content">
        <p role="status">
          <?= i('%s does not exist.', ['Page']); ?>
        </p>
      </div>
    </div>
  </article>
<?php endif; ?>
<?= self::exit(); ?>
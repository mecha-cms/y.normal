<?= self::before(); ?>
<?php if ($pages->count): ?>
  <?php foreach ($pages as $page): ?>
    <article class="page type:<?= c2f($page->type); ?>" id="page:<?= $page->id; ?>">
      <?= self::get('pages-', ['page' => $page]); ?>
    </article>
  <?php endforeach; ?>
<?php else: ?>
<article class="page">
  <div class="page-body">
    <div class="page-content">
      <p>
        <?= i('No %s yet.', ['posts']); ?>
      </p>
    </div>
  </div>
</article>
<?php endif; ?>
<?= self::pager(); ?>
<?= self::after(); ?>
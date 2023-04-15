<?= self::enter(); ?>
<?php if ($page->exist): ?>
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
          <p role="status">
            <?php if ($site->has('part')): ?>
              <?= i('No more %s to show.', ['posts']); ?>
            <?php else: ?>
              <?= i('No %s yet.', ['posts']); ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </article>
  <?php endif; ?>
<?php else: ?>
<?php endif; ?>
<?= self::pager(); ?>
<?= self::exit(); ?>
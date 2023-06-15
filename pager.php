<?php if ($site->is('pages') && isset($state->x->pager)): ?>
  <?= self::pager('peek'); ?>
<?php else: ?>
  <nav class="pager pager-normal">
    <span class="pager-prev">
      <?php if ($prev = $pager->prev): ?>
        <a href="<?= eat($prev->link); ?>" rel="prev" title="<?= eat($prev->description); ?>">
          <?= i('Newer'); ?>
        </a>
      <?php endif; ?>
    </span>
    <span class="pager-next">
      <?php if ($next = $pager->next): ?>
        <a href="<?= eat($next->link); ?>" rel="next" title="<?= eat($next->description); ?>">
          <?= i('Older'); ?>
        </a>
      <?php endif; ?>
    </span>
  </nav>
<?php endif; ?>
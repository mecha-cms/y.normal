<a class="toggle" href="#toggle">
  <span class="sr">
    <?= i('More'); ?>&#x2026;
  </span>
</a>
<aside class="aside">
  <?= self::widget('form/search'); ?>
  <?= self::widget('tag'); ?>
  <?php if ($site->is('home')): ?>
    <?= self::widget('comment/recent'); ?>
  <?php else: ?>
    <?= self::widget('page/recent'); ?>
    <?= self::widget('page/other'); ?>
  <?php endif; ?>
  <?= self::widget('archive'); ?>
</aside>
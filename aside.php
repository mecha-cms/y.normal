<a href="#toggle" class="toggle">
  <span class="sr"><?= i('More'); ?>&#x2026;</span>
</a>
<aside class="aside">
  <?= self::widget('form/search'); ?>
  <?= self::widget('tag'); ?>
  <?php if (!$site->is('home')): ?>
    <?= self::widget('page/recent'); ?>
    <?= self::widget('page/alike'); ?>
    <?php else: ?>
    <?= self::widget('comment/recent'); ?>
  <?php endif; ?>
</aside>

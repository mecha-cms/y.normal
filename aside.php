<a href="#toggle" class="toggle"></a>
<aside class="aside">
  <?= self::widget('form/search'); ?>
  <?= self::widget('tag'); ?>
  <?php if (!$site->is('home')): ?>
    <?= self::widget('page/recent'); ?>
    <?= self::widget('page/alike'); ?>
  <?php endif; ?>
</aside>

<a href="#toggle" class="aside-toggle"></a>
<aside class="aside">
  <?php static::widget('form/search'); ?>
  <?php static::widget('tag'); ?>
  <?php if ($site->is('pages')): ?>
  <?php static::widget('comment/recent'); ?>
  <?php else: ?>
  <?php static::widget('page/recent'); ?>
  <?php static::widget('page/relate'); ?>
  <?php endif; ?>
</aside>
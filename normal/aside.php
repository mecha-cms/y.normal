<a href="#toggle" class="aside-toggle"></a>
<aside class="aside">
  <?php Shield::get('widget.form.search'); ?>
  <?php Shield::get('widget.tag'); ?>
  <?php if ($site->is('pages')): ?>
  <?php Shield::get('widget.comment.recent'); ?>
  <?php else: ?>
  <?php Shield::get('widget.page.recent'); ?>
  <?php Shield::get('widget.page.connect'); ?>
  <?php endif; ?>
</aside>
<a href="#toggle" class="blog-aside-toggle"></a>
<aside class="blog-aside widgets">
  <?php Shield::get('-widget.form.search'); ?>
  <?php Shield::get('-widget.tag'); ?>
  <?php if ($site->is !== ""): ?>
  <?php Shield::get('-widget.page.recent'); ?>
  <?php endif; ?>
  <?php Shield::get('-widget.page.connect'); ?>
</aside>
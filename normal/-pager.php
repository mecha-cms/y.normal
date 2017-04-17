<nav class="blog-pager">
  <?php if ($pager->previous): ?>
  <span class="blog-pager-previous">
    <?php echo $pager->previous($language->newer); ?>
  </span>
  <?php endif; ?>
  <?php if ($pager->next): ?>
  <span class="blog-pager-next">
    <?php echo $pager->next($language->older); ?>
  </span>
  <?php endif; ?>
</nav>
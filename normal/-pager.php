<nav class="pager">
  <?php if ($pager->previous): ?>
  <span class="pager-previous">
    <?php echo $pager->previous($language->newer); ?>
  </span>
  <?php endif; ?>
  <?php if ($pager->next): ?>
  <span class="pager-next">
    <?php echo $pager->next($language->older); ?>
  </span>
  <?php endif; ?>
</nav>
<nav class="pager">
  <?php if ($pager->prev): ?>
  <span class="pager-prev">
    <?php echo $pager->prev(i('Newer')); ?>
  </span>
  <?php endif; ?>
  <?php if ($pager->next): ?>
  <span class="pager-next">
    <?php echo $pager->next(i('Older')); ?>
  </span>
  <?php endif; ?>
</nav>
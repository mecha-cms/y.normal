<?php extract($lot); ?>
<?php if (!empty($title) || !empty($content)): ?>
<section class="widget <?php echo implode(' ', array_reverse(Anemon::step($id ?? 'default', '-'))); ?>">
  <?php if (!empty($title)): ?>
  <header class="widget-header">
    <h4 class="widget-title"><?php echo $title; ?></h4>
  </header>
  <?php endif; ?>
  <?php if (!empty($content)): ?>
  <div class="widget-body">
    <div class="widget-content"><?php echo $content; ?></div>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>
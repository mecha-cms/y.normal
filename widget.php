<?php if (!empty($title) || !empty($content)): ?>
<section class="<?= implode(' ', array_reverse(step('widget-' . ($id ?? 'default'), '-'))); ?>">
  <?php if (!empty($title)): ?>
  <header class="widget-header">
    <h4 class="widget-title">
      <?= $title; ?>
    </h4>
  </header>
  <?php endif; ?>
  <?php if (!empty($content)): ?>
  <div class="widget-body">
    <div class="widget-content">
      <?= $content; ?>
    </div>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>
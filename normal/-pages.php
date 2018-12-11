<?php extract($lot); ?>
<header class="post-header">
  <p class="post-property">
    <time class="post-time" datetime="<?php echo $page->time->W3C; ?>">
      <?php echo $page->time->{strtr($site->language, '-', '_')}; ?>
      <?php echo $page->view ? ' &#x00B7; ' . $page->view : ""; ?>
    </time>
  </p>
  <h4 class="post-title">
    <?php if ($page->link): ?>
    <a class="post-link" href="<?php echo $page->link; ?>" target="_blank"><?php echo $page->title; ?></a>
    <?php elseif ($page->url): ?>
    <a class="post-url" href="<?php echo $page->url; ?>"><?php echo $page->title; ?></a>
    <?php else: ?>
    <span class="a"><?php echo $page->title; ?></span>
    <?php endif; ?>
  </h4>
</header>
<div class="post-body">
  <?php if ($page->excerpt): ?>
  <div class="post-excerpt"><?php echo $page->excerpt; ?></div>
  <?php else: ?>
  <div class="post-description">
    <p><?php echo To::snippet((string) $page->description); ?></p>
  </div>
  <?php endif; ?>
</div>
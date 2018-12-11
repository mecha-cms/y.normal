<?php extract($lot); ?>
<header class="post-header">
  <?php if ($site->has('parent')): ?>
  <p class="post-property">
    <time class="post-time" datetime="<?php echo $page->time->W3C; ?>">
      <?php echo $page->time->{strtr($site->language, '-', '_')}; ?>
      <?php echo $page->view ? ' &#x00B7; ' . $page->view : ""; ?>
    </time>
  </p>
  <?php endif; ?>
  <h2 class="post-title">
    <span class="a"><?php echo $page->title; ?></span>
  </h2>
</header>
<div class="post-body">
  <div class="post-content"><?php echo $page->content; ?></div>
  <?php if ($page->link): ?>
  <p><a class="button action post-link" href="<?php echo $page->link; ?>"><?php echo $language->article_continue; ?></a></p>
  <?php endif; ?>
</div>
<?php if ($site->has('parent')): ?>
<footer class="post-footer">
  <div><?php echo $language->posted_by__([Shield::get('page.author', [], false), '<time datetime="' . $page->time->W3C . '">' . $page->time('%h%:%m% %N%') . '</time>'], true); ?></div>
  <div><?php Shield::get('tags'); ?></div>
</footer>
<?php endif; ?>
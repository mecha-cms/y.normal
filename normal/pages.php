<?php static::header(); ?>
<?php if ($pages->count): ?>
<?php foreach ($pages as $page): ?>
<article class="post post-type:<?php echo c2f($page->type); ?>" id="post-<?php echo $page->id; ?>">
  <?php if (has(['Image', 'Log', 'Quote', 'Video'], $page->type)): ?>
  <?php echo $page->content; ?>
  <p><?php static::get('page.author', ['page' => $page]); ?> &#x00B7; <?php echo HTML::a('<time datetime="' . $page->time->ISO8601 . '">' . $page->time->{strtr($site->language, '-', '_')} . '</time>', $page->url); ?></p>
  <?php else: ?>
  <?php static::_pages(['page' => $page]); ?>
  <?php endif; ?>
</article>
<?php endforeach; ?>
<?php else: ?>
<article class="post">
  <div class="post-body">
    <div class="post-content">
      <p><?php echo $language->message_info_void($language->articles); ?></p>
    </div>
  </div>
</article>
<?php endif; ?>
<?php static::pager(); ?>
<?php static::footer(); ?>
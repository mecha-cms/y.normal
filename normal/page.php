<?php Shield::get('header'); ?>
<article class="post post-type:<?php echo c2f($page->type); ?>" id="post-<?php echo $page->id; ?>">
<?php if (has(['Image', 'Log', 'Quote', 'Video'], $page->type)): ?>
<?php echo $page->content; ?>
<p><?php Shield::get('page.author'); ?> &#x00B7; <?php echo HTML::a('<time datetime="' . $page->time->W3C . '">' . $page->time->{strtr($site->language, '-', '_')} . '</time>', $page->url); ?></p>
<?php else: ?>
<?php Shield::get('-page', ['page' => $page]); ?>
<?php endif; ?>
</article>
<?php if ($site->has('parent')): ?>
<?php Shield::get('pager'); ?>
<?php Shield::get('comments'); ?>
<?php endif; ?>
<?php Shield::get('footer'); ?>
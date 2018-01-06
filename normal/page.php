<?php Shield::get('header'); ?>
<?php

if (Extend::exist('user') && $page->author instanceof User) {
    $author = HTML::a($page->author . "", $page->author->link, false);
} else {
    $author = HTML::span($page->author . "", ['classes' => ['a']]);
}

?>
<article class="post post-format:<?php echo __c2f__($page->type . ""); ?>" id="post-<?php echo $page->id; ?>">
  <?php $content = str_replace(["\n\n", "\n", '<p></p>'], ['</p><p>', '<br>', ""], n(To::text($page->content, HTML_WISE_I, true))); ?>
  <?php if ($page->type === 'Log'): ?>
  <p><?php echo $content; ?></p>
  <p><?php echo $author; ?> &#x00B7; <time datetime="<?php echo $page->date->W3C; ?>"><?php echo $page->date->{str_replace('-', '_', $site->language)}; ?></time></p>
  <?php elseif ($page->type === 'Quote'): ?>
  <blockquote>
    <p>&#x201C;<?php echo $content; ?>&#x201D;</p>
  </blockquote>
  <p><?php echo $author; ?> &#x00B7; <time datetime="<?php echo $page->date->W3C; ?>"><?php echo $page->date->{str_replace('-', '_', $site->language)}; ?></time></p>
  <?php else: ?>
  <header class="post-header">
    <?php if (strpos($url->path, '/') !== false): ?>
    <p class="post-property">
      <time class="post-time" datetime="<?php echo $page->date->W3C; ?>">
        <?php echo $page->date->{str_replace('-', '_', $site->language)}; ?>
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
  <?php if (strpos($url->path, '/') !== false): ?>
  <footer class="post-footer">
    <div><?php echo $language->posted_by__([$author, '<time datetime="' . $page->date->W3C . '">' . $page->date->F4 . '</time>'], true); ?></div>
    <?php if (Extend::exist('tag')): ?>
    <div><?php Shield::get('tags'); ?></div>
    <?php endif; ?>
  </footer>
  <?php endif; ?>
  <?php endif; ?>
</article>
<?php if (strpos($url->path, '/') !== false): ?>
<?php Shield::get('pager'); ?>
<?php Shield::get('comments'); ?>
<?php endif; ?>
<?php Shield::get('footer'); ?>
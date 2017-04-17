<?php Shield::get('header'); ?>
<main class="blog-main posts">
  <?php if ($pages): ?>
  <?php foreach ($pages as $page): ?>
  <?php
 
  if ($page->author instanceof User) {
      $author = HTML::a($page->author . "", $page->author->link, false);
  } else {
      $author = HTML::span($page->author . "", ['classes' => ['a']]);
  }

  ?>
  <article class="post post-index post-format-<?php echo __c2f__($page->type . ""); ?>" id="post-<?php echo $page->id; ?>">
    <?php if ($page->type ==='Quote'): ?>
    <blockquote>
      <p>&#x201C;<?php echo str_replace(["\n\n", "\n", '<p></p>'], ['</p><p>', '<br>', ""], n(To::text($page->content, HTML_WISE, true))); ?>&#x201D;</p>
    </blockquote>
    <p><?php echo $author; ?> &#x00B7; <?php echo HTML::a('<time datetime="' . $page->date->W3C . '">' . $page->date->{str_replace('-', '_', $site->language)} . '</time>', $page->url); ?></p>
    <?php else: ?>
    <header class="post-header">
      <p class="post-time">
        <time datetime="<?php echo $page->date->W3C; ?>">
          <?php echo $page->date->{str_replace('-', '_', $site->language)}; ?>
          <?php echo $page->view ? ' &#x00B7; ' . $page->view : ""; ?>
        </time>
      </p>
      <h4 class="post-title">
        <?php if ($page->link): ?>
        <a href="<?php echo $page->link; ?>" target="_blank"><?php echo $page->title; ?></a>
        <?php elseif ($page->url): ?>
        <a href="<?php echo $page->url; ?>"><?php echo $page->title; ?></a>
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
        <p><?php echo To::snippet($page->description); ?></p>
      </div>
      <?php endif; ?>
    </div>
    <footer class="post-footer"></footer>
    <?php endif; ?>
  </article>
  <?php endforeach; ?>
  <?php else: ?>
  <article class="post">
    <div class="post-body">
      <p><?php echo $language->message_info_void($language->articles); ?></p>
    </div>
  </article>
  <?php endif; ?>
  <?php Shield::get('-pager'); ?>
</main>
<?php Shield::get('footer'); ?>
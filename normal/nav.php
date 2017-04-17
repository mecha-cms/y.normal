<nav class="blog-nav menus">
<ul><!--
  --><li<?php echo !$url->path || $url->path === $site->path ? ' class="current"' : ""; ?>>
    <a href="<?php echo $url; ?>"><?php echo $language->home; ?></a>
  </li><!--
  <?php if ($menus = Get::pages(PAGE, 'page', [1, 'slug'], 'slug')): ?>
    <?php foreach ($menus as $menu): ?>
    <?php if ($menu === $site->path) continue; ?>
    <?php

    $p = Page::open(PAGE . DS . $menu . '.page')->get([
        'url' => null,
        'title' => To::title($menu),
        'link' => null
    ]);

    ?>
    --><li<?php echo $url->path === $menu || strpos($url->path . '/', $menu . '/') === 0 ? ' class="current"' : ""; ?>>
      <a href="<?php echo $p['link'] ?: $p['url']; ?>"><?php echo $p['title']; ?></a>
    </li><!--
    <?php endforeach; ?>
  <?php endif; ?>
--></ul>
</nav>
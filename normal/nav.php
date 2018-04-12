<nav class="nav">
  <ul><!--
    --><li class="nav-<?php echo $site->is('home') ? ' current' : ""; ?>">
      <a href="<?php echo $url; ?>"> <?php echo $language->home; ?></a>
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
      --><li class="nav-<?php echo $menu . ($url->path === $menu || strpos($url->path . '/', $menu . '/') === 0 ? ' current' : ""); ?>">
        <a href="<?php echo $p['link'] ?: $p['url']; ?>"><?php echo $p['title']; ?></a>
      </li><!--
      <?php endforeach; ?>
    <?php endif; ?>
  --></ul>
</nav>
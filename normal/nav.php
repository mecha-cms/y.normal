<nav class="nav">
  <ul><!--
    --><li class="nav-<?php echo $site->path . ($site->is('home') ? ' current' : ""); ?>">
      <a href="<?php echo $url; ?>"> <?php echo $language->home; ?></a>
    </li><!--
    <?php if ($menus = Get::pages(PAGE, 'page', [1, 'slug'])->vomit()): ?>
      <?php foreach ($menus as $menu): ?>
      <?php if ($menu === $site->path) continue; ?>
      <?php

      $m = Page::open(PAGE . DS . $menu . '.page')->get([
          'link' => null,
          'title' => To::title($menu),
          'url' => null
      ]);

      ?>
      --><li class="nav-<?php echo $menu . ($url->path === $menu || strpos($url->path . '/', $menu . '/') === 0 ? ' current' : ""); ?>">
        <a href="<?php echo $m['link'] ?: $m['url']; ?>"><?php echo $m['title']; ?></a>
      </li><!--
      <?php endforeach; ?>
    <?php endif; ?>
  --></ul>
</nav>
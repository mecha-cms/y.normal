<nav class="nav">
  <ul>
    <li<?= $site->is('home') ? ' class="current"' : ""; ?>>
      <a href="<?= eat($url); ?>">
        <?= i('Home'); ?>
      </a>
    </li>
    <?php foreach ($links as $link): ?>
      <?php $children = $link->children ?? false; ?>
      <li<?= $link->current ? ' class="current"' : ""; ?>>
        <a href="<?= eat($link->link ?? ($link->url . ($children && $children->count ? '/1' : ""))); ?>">
          <?= $link->title; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
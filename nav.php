<nav class="nav">
  <ul>
    <li<?= $site->is('home') ? ' class="current"' : ""; ?>>
      <a href="<?= $url; ?>">
        <?= i('Home'); ?>
      </a>
    </li>
    <?php foreach ($links as $link): ?>
    <li<?= $link->active ? ' class="current"' : ""; ?>>
      <a href="<?= $link->link ?? $link->url; ?>">
        <?= $link->title; ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>

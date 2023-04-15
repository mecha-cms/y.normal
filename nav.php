<nav class="nav">
  <ul>
    <li<?= $site->is('home') ? ' class="current"' : ""; ?>>
      <a href="<?= eat($url); ?>">
        <?= i('Home'); ?>
      </a>
    </li>
    <?php foreach ($links as $link): ?>
      <li<?= $link->current ? ' class="current"' : ""; ?>>
        <a href="<?= eat($link->link ?? $link->url); ?>">
          <?= $link->title; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
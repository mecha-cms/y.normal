<nav class="nav">
  <ul><!--
    --><li class="<?= $site->is('home') ? 'current' : ""; ?>">
      <a href="<?= $url; ?>">
        <?= i('Home'); ?>
      </a>
    </li><!--
    <?php foreach ($links as $link): ?>
    --><li class="<?= $link->active ? 'current' : ""; ?>">
      <a href="<?= $link->link ?? $link->url; ?>">
        <?= $link->title; ?>
      </a>
    </li><!--
    <?php endforeach; ?>
  --></ul>
</nav>

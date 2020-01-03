<header class="header">
  <h1 class="title">
    <?php if ($site->is('home')): ?>
    <span class="a">
      <?= $site->title; ?>
    </span>
    <?php else: ?>
    <a href="<?= $url; ?>">
      <?= $site->title; ?>
    </a>
    <?php endif; ?>
  </h1>
  <p class="description">
    <?= $site->description; ?>
  </p>
</header>
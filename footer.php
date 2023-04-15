<footer class="footer">
  <div class="footer-left">
    &#x00a9; <?= $date->year; ?> <a href="<?= eat($url); ?>">
      <?= $site->title; ?>
      <!-- You have to maintain this back link to support me, or make a proper donation to remove it. -->
    </a> &#x00b7; <?= i('Powered by %s', ['<a href="https://mecha-cms.com" target="_blank">Mecha ' . VERSION . '</a>']); ?>
  </div>
  <div class="footer-right">
    <?php if ($route = $state->x->user->route ?? ""): ?>
      <?php if (!empty($state->x->user->guard->route)): ?>
        <span class="a" title="<?= eat(i('Log-in link has been disabled by the author.')); ?>">
          <?= i('Log In'); ?>
        </span>
      <?php else: ?>
        <?php if ($site->has('grant')): ?>
          <a href="<?= eat($url . $route . '/' . $user->name . '?exit=' . $user->token); ?>">
            <?= i('Log Out'); ?>
          </a>
        <?php else: ?>
          <a href="<?= eat($url . $route); ?>">
            <?= i('Log In'); ?>
          </a>
        <?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</footer>
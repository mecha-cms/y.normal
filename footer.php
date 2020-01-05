<footer class="footer">
  <div class="footer-left">
    &#x00A9; <?= $time->year; ?> <a href="<?= $url; ?>"><?= $site->title; ?></a> &#x00B7; <?= i('Powered by %s', ['<a href="https://mecha-cms.com" target="_blank">Mecha ' . VERSION . '</a>']); ?>
  </div>
  <div class="footer-right">
    <?php $path = State::get('x.user.path'); ?>
    <?php if (State::get('x.user.guard.path')): ?>
      <span class="a" title="<?= i('Log-in link has been disabled by the author.'); ?>"><?= i('Log In'); ?></span>
    <?php else: ?>
      <?php if ($u = Is::user()): ?>
      <a href="<?= $url . $path; ?>/<?= $user->name; ?>?exit=<?= $user->token; ?>"><?= i('Log Out'); ?></a>
      <?php else: ?>
      <a href="<?= $url . $path; ?>"><?= i('Log In'); ?></a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</footer>

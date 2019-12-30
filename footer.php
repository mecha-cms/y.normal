<footer class="footer">
  <div class="footer-left">
    &#x00A9; <?= $time->year; ?> <a href="<?= $url; ?>"><?= $site->title; ?></a> &#x00B7; <?= i('Powered by %s', ['<a href="https://mecha-cms.com" target="_blank">Mecha ' . VERSION . '</a>']); ?>
  </div>
  <div class="footer-right">
    <?= self::trace([' / ']); ?>
  </div>
</footer>

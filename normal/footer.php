        </main> <!-- .main -->
      </div> <!-- .content -->
      <footer class="footer">
        <div class="footer-left">&#x00A9; <?php echo $date->year; ?> <a href="<?php echo $url; ?>"><?php echo $site->title; ?></a> &#x00B7; <?php echo $language->powered_by__(Mecha::version(), true); ?></div>
        <div class="footer-right"><?php Shield::get('path'); ?></div>
      </footer>
    </div> <!-- .wrapper -->
  </body>
</html>
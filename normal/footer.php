      </div> <!-- .blog-content -->
      <footer class="blog-footer">
        <div class="blog-footer-left">&#x00A9; <?php echo $date->year; ?> <a href="<?php echo $url; ?>"><?php echo $site->title; ?></a> &#x00B7; <?php echo $language->powered_by__(Mecha::version(), true); ?></div>
        <div class="blog-footer-right"><?php Shield::get('path'); ?></div>
      </footer>
    </div> <!-- .blog-wrapper -->
  </body>
</html>
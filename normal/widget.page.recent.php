<section class="widget widget-page widget-page-recent">
  <header class="widget-header">
    <h4 class="widget-title"><?php echo $language->widget->page->recent; ?></h4>
  </header>
  <div class="widget-body">
    <div class="widget-content">
    <?php

    $_path = PAGE . DS . $state->widget['page']['path'];
    $_chunk = $state->widget['page']['chunk'];

    if ($_pages = Get::pages($_path, 'page', [-1, 'time'])) {
        echo '<ul>';
        foreach (Anemon::eat($_pages)->chunk($_chunk, 0) as $_page) {
            $_page = new Page($_page['path']);
            echo '<li' . ($page->slug === $_page->slug ? ' class="current"' : "") . '>' . HTML::a($_page->title, $_page->url) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>' . $language->message_info_void($language->articles) . '</p>';
    }

    ?>
    </div>
  </div>
</section>
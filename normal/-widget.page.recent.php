<div class="widget-wrapper">
  <h4 class="widget-title"><?php echo $language->widget->page->recent; ?></h4>
  <div class="widget-content">
    <div class="widget widget-page widget-page-recent">
    <?php

    $_path = PAGE . DS . $state->widget['path'];
    $_chunk = $state->widget['chunk'];

    if ($_pages = Get::pages($_path, 'page', [-1, 'time'])) {
        echo '<ul>';
        foreach (Anemon::eat($_pages)->chunk($_chunk, 0) as $_page) {
            $_page = new Page($_page['path']);
            echo '<li' . ($page->slug === $_page->slug ? ' class="current"' : "") . '>' . HTML::a($_page->title, $_page->url) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No posts yet.</p>';
    }

    ?>
    </div>
  </div>
</div>
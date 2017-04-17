<div class="widget-wrapper">
  <?php $_type = $site->is === 'page' ? 'connect' : 'random'; ?>
  <h4 class="widget-title"><?php echo $language->widget->page->{$_type}; ?></h4>
  <div class="widget-content">
    <div class="widget widget-page widget-page-<?php echo $_type; ?>">
    <?php

    $_path = PAGE . DS . (Path::D($url->path) ?: $state->widget['path']);
    $_chunk = $state->widget['chunk'];
    $_pages = $_relates = [];

    if ($_current = Lot::get('page')) {
        if ($_pages = Get::pages($_path, 'page')) {
            $_slug = $_current->slug;
            $_query = explode('-', $_slug);
            foreach ($_pages as $_page) {
                $_n = Path::N($_page['path']);
                if ($_n === $_slug) continue; // Is the same page, skip…
                foreach ($_query as $_v) {
                    if ($_v && strpos($_n, $_v) !== false) {
                        $_relates[] = $_page['path'];
                    }
                }
            }
        }
        echo '<ul>';
        $_relates = array_unique($_relates);
        if (!empty($_relates)) {
            foreach (Anemon::eat($_relates)->shake()->chunk($_chunk, 0) as $_relate) {
                $_relate = new Page($_relate);
                echo '<li>' . HTML::a($_relate->title, $_relate->url) . '</li>';
            }
        } else if (!empty($_pages)) { // random page(s)…
            foreach (Anemon::eat($_pages)->shake()->chunk($_chunk, 0) as $_page) {
                $_page = new Page($_page['path']);
                echo '<li' . ($page->slug === $_page->slug ? ' class="current"' : "") . '>' . HTML::a($_page->title, $_page->url) . '</li>';
            }
        } else {
            echo '<p>' . $language->none . '.</p>';
        }
        echo '</ul>';
    }

    ?>
    </div>
  </div>
</div>
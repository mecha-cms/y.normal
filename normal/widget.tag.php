<?php if (Extend::exist('tag')): ?>
<section class="widget widget-tag widget-tag-list">
  <header class="widget-header">
    <h4 class="widget-title"><?php echo $language->widget->tag; ?></h4>
  </header>
  <div class="widget-body">
    <div class="widget-content">
    <?php

    $_base = $state->widget['page']['path'];

    if ($_kinds = glob(PAGE . DS . $_base . DS . '*' . DS . 'kind.data', GLOB_NOSORT)) {
        echo '<ul>';
        $_data = [];
        foreach ($_kinds as $_kind) {
            $_kind = e(file_get_contents($_kind));
            if (!is_array($_kind)) continue;
            foreach ($_kind as $_k) {
                $_data[] = $_k;
            }
        }
        foreach (array_count_values($_data) as $_k => $_v) {
            if (($_slug = To::tag($_k)) === false) continue;
            $_tag = new Tag(TAG . DS . $_slug . '.page');
            $_t = $url . '/' . To::URL($_base) . '/' . Extend::state('tag', 'path');
            echo '<li' . ($site->is('tags') && $page->tag->slug === $_slug ? ' class="current"' : "") . '>' . HTML::a($_tag->title, $_t . '/' . $_tag->slug) . ' <span class="counter">' . $_v . '</span></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>' . $language->message_info_void($language->tags) . '</p>';
    }

    ?>
    </div>
  </div>
</section>
<?php endif; ?>
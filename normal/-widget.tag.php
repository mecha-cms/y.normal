<?php if (Extend::exist('tag')): ?>
<div class="widget-wrapper">
  <h4 class="widget-title"><?php echo $language->widget->tag; ?></h4>
  <div class="widget-content">
    <div class="widget widget-tag">
    <?php

    $_base = $state->widget['path'];

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
            $_tag = new Page(TAG . DS . $_slug . '.page', [], 'tag');
            $_t = $url . '/' . To::url($_base) . '/' . Extend::state('tag', 'path', 'tag');
            echo '<li' . ($site->tag && $site->tag->slug === $_slug ? ' class="current"' : "") . '>' . HTML::a($_tag->title, $_t . '/' . $_tag->slug) . ' <span class="counter">' . $_v . '</span></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>' . $language->message_info_void($language->tags) . '</p>';
    }

    ?>
    </div>
  </div>
</div>
<?php endif; ?>
<?php if (Extend::exist('comment')): ?>
<section class="widget widget-comment widget-comment-recent">
  <header class="widget-header">
    <h4 class="widget-title"><?php echo $language->widget->comment->recent; ?></h4>
  </header>
  <section class="widget-body">
    <div class="widget-content">
    <?php

    $_path = COMMENT;
    $_chunk = $state->widget['comment']['chunk'];
    $_snippet = $state->widget['comment']['snippet'];

    $_comments = [];
    if ($_pages = File::explore($_path, true, true)) {
        echo '<ul class="recent-comments">';
        foreach ($_pages as $_k => $_v) {
            if ($_v === 0) continue; // Is a folder, skip…
            $_s = explode('.', Path::B($_k)); // `[$name, $x]`
            if ($_s[1] !== 'page') continue; // Is not published, skip…
            $_comments[$_s[0]] = $_k;
        }
        if (!empty($_comments)) {
            krsort($_comments);
            foreach (Anemon::eat($_comments)->chunk($_chunk, 0) as $_comment) {
                $_comment = new Comment($_comment);
                echo '<li class="recent-comment recent-comment-status:' . $_comment->state . '">';
                echo '<figure class="recent-comment-figure">';
                echo '<img class="recent-comment-avatar" alt="" src="' . $_comment->avatar($url->protocol . 'www.gravatar.com/avatar/' . md5($_comment->email) . '?s=50&amp;d=monsterid') . '" width="50" height="50">';
                echo '</figure>';
                echo '<header class="recent-comment-header">';
                echo '<h5 class="recent-comment-author">';
                echo HTML::a($_comment->author . "", $_comment->url, false, ['classes' => ['recent-comment-url'], 'rel' => 'nofollow']);
                echo '</h5>';
                echo '</header>';
                echo '<section class="recent-comment-body">';
                echo '<p>' . To::snippet($_comment->content, true, $_snippet) . '</p>';
                echo '</section>';
                echo '<footer class="recent-comment-footer">';
                echo '<p class="recent-comment-property">';
                echo '<time class="recent-comment-time" datetime="' . $_comment->date->W3C . '">' . $_comment->date->F2 . '</time>';
                echo '</p>';
                echo '</footer>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>' . $language->message_info_void($language->comments) . '</p>';
        }
    } else {
        echo '<p>' . $language->message_info_void($language->comments) . '</p>';
    }

    ?>
    </div>
  </section>
</section>
<?php endif; ?>
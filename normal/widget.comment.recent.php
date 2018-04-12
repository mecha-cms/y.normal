<?php if (Extend::exist('comment')): ?>
<section class="widget widget-comment widget-comment-recent">
  <header class="widget-header">
    <h4 class="widget-title"><?php echo $language->widget->comment->recent; ?></h4>
  </header>
  <div class="widget-body">
    <div class="widget-content">
    <?php

    $_path = COMMENT;
    $_chunk = $state->widget['comment']['chunk'];
    $_snippet = $state->widget['comment']['snippet'];

    $_comments = [];
    if ($_pages = File::explore([$_path, 'page'], true)) {
        echo '<ul class="recent-comments">';
        foreach ($_pages as $_k => $_v) {
            $_comments[Path::B($_k)] = $_k;
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
                echo HTML::a($_comment->author . "", $_comment->url, false, ['class[]' => ['recent-comment-url'], 'rel' => 'nofollow']);
                echo '</h5>';
                echo '</header>';
                echo '<div class="recent-comment-body">';
                echo '<p>' . To::snippet($_comment->content, true, $_snippet) . '</p>';
                echo '</div>';
                echo '<footer class="recent-comment-footer">';
                echo '<p class="recent-comment-property">';
                echo '<time class="recent-comment-time" datetime="' . $_comment->time->W3C . '">' . $_comment->time->F2 . '</time>';
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
  </div>
</section>
<?php endif; ?>
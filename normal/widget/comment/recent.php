<?php

if (Extend::exist('comment')) {
    call_user_func(function() {
        extract(Lot::get());
        $path = COMMENT;
        $chunk = $widget->comment['chunk'];
        $snippet = $widget->comment['snippet'];
        $content = "";
        if ($comments = File::explore([$path, 'page'], true)) {
            $comments = array_keys($comments);
            $content .= '<ul class="recent-comments">';
            if (!empty($comments)) {
                foreach (Anemon::eat($comments)->sort(function($a, $b) {
                    return Path::B($b) <=> Path::B($a);
                })->chunk($chunk, 0) as $comment) {
                    $comment = new Comment($comment);
                    $content .= '<li class="recent-comment recent-comment-status:' . $comment->state . '">';
                    $content .= '<figure class="recent-comment-figure">';
                    $content .= '<img class="recent-comment-avatar" alt="" src="' . $comment->avatar(50, 50) . '" width="50" height="50">';
                    $content .= '</figure>';
                    $content .= '<header class="recent-comment-header">';
                    $content .= '<h5 class="recent-comment-author">';
                    $content .= HTML::a($comment->author . "", $comment->url, false, ['class[]' => ['recent-comment-url'], 'rel' => 'nofollow']);
                    $content .= '</h5>';
                    $content .= '</header>';
                    $content .= '<div class="recent-comment-body">';
                    $content .= '<p>' . To::snippet($comment->content, true, $snippet) . '</p>';
                    $content .= '</div>';
                    $content .= '<footer class="recent-comment-footer">';
                    $content .= '<p class="recent-comment-property">';
                    $content .= '<time class="recent-comment-time" datetime="' . $comment->time->W3C . '">' . $comment->time('%Y%/%M%/%D% %h%:%m% %N%') . '</time>';
                    $content .= '</p>';
                    $content .= '</footer>';
                    $content .= '</li>';
                }
                $content .= '</ul>';
            } else {
                $content = '<p>' . $language->message_info_void($language->comments) . '</p>';
            }
        } else {
            $content = '<p>' . $language->message_info_void($language->comments) . '</p>';
        }
        static::widget([
            'id' => 'comment-recent',
            'title' => $language->widget_comment->recent,
            'content' => $content
        ]);
    });
}
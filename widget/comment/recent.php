<?php

$content = "";

if (isset($state->x->comment)) {
    $chunk = $state->widget->comment->chunk;
    $excerpt = $state->widget->comment->excerpt;
    foreach (Comments::from(LOT . D . 'comment' . ($route ?? $state->routeBlog), 'page', true)->sort([-1, 'time'])->chunk($chunk, 0) as $comment) {
        $content .= '<li class="recent-comment" data-status="' . eat($comment->status ?? 2) . '">';
        if ($avatar = $comment->avatar(50)) {
            $content .= '<figure class="recent-comment-figure">';
            $content .= '<img alt="" class="recent-comment-avatar" height="50" src="' . eat($avatar) . '" width="50">';
            $content .= '</figure>';
        } else if ($image = $comment->image(50)) {
            $content .= '<figure class="recent-comment-figure">';
            $content .= '<img alt="" class="recent-comment-avatar" height="50" src="' . eat($image) . '" width="50">';
            $content .= '</figure>';
        }
        $content .= '<header class="recent-comment-header">';
        $content .= '<h5 class="recent-comment-author">';
        $content .= '<a class="recent-comment-url" href="' . eat($comment->url) . '" rel="nofollow">' . $comment->author . '</a>';
        $content .= '</h5>';
        $content .= '</header>';
        $content .= '<div class="recent-comment-body">';
        $content .= '<p>' . To::description((string) $comment->content, $excerpt) . '</p>';
        $content .= '</div>';
        $content .= '<footer class="recent-comment-footer">';
        $content .= '<p class="recent-comment-meta">';
        $content .= '<time class="recent-comment-time" datetime="' . eat($comment->time->format('c')) . '">' . $comment->time('%Y/%m/%d %T') . '</time>';
        $content .= '</p>';
        $content .= '</footer>';
        $content .= '</li>';
    }
    $content = $content ? '<ul class="recent-comments">' . $content . '</ul>' : '<p role="status">' . i('No %s yet.', ['comments']) . '</p>';
} else {
    $content .= '<p role="status">' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/comment" target="_blank">comment</a>']) . '</p>';
}

echo self::widget([
    'id' => 'comment-recent',
    'title' => $title ?? i('Recent %s', ['Comments']),
    'content' => $content
]);
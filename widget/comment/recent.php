<?php

$content = "";

if (isset($state->x->comment)) {
    $chunk = $state->widget->comment->chunk;
    $excerpt = $state->widget->comment->excerpt;
    $comments = [];
    foreach (g(LOT . D . 'comment' . ($route ?? $state->routeBlog), 'page', true) as $k => $v) {
        $comments[$k] = basename($k);
    }
    arsort($comments);
    foreach (array_chunk($comments, $chunk, true)[0] ?? [] as $k => $v) {
        $comment = new Comment($k);
        $content .= '<li class="recent-comment recent-comment-status:' . eat($comment->status) . '">';
        if (isset($comment['avatar'])) {
            $content .= '<figure class="recent-comment-figure">';
            $content .= '<img alt="" class="recent-comment-avatar" height="50" src="' . eat($comment->avatar(50)) . '" width="50">';
            $content .= '</figure>';
        } else if (isset($comment['image'])) {
            $content .= '<figure class="recent-comment-figure">';
            $content .= '<img alt="" class="recent-comment-avatar" height="50" src="' . eat($comment->image(50)) . '" width="50">';
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
    $content = $content ? '<ul class="recent-comments">' . $content . '</ul>' : '<p>' . i('No %s yet.', ['comments']) . '</p>';
} else {
    $content .= '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/comment" target="_blank">comment</a>']) . '</p>';
}

echo self::widget([
    'id' => 'comment-recent',
    'title' => $title ?? i('Recent %s', ['Comments']),
    'content' => $content
]);
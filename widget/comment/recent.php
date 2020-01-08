<?php

$c = State::get('x.comment');
if (null !== $c) {
    $chunk = $widget->comment['chunk'];
    $excerpt = $widget->comment['excerpt'];
    $content = "";
    $comments = [];
    foreach (g(LOT . DS . 'comment', 'page', true) as $k => $v) {
        $comments[$k] = basename($k);
    }
    arsort($comments);
    foreach (array_chunk($comments, $chunk, true)[0] ?? [] as $k => $v) {
        $comment = new Comment($k);
        $content .= '<li class="recent-comment recent-comment-status:' . $comment->status . '">';
        $content .= '<figure class="recent-comment-figure">';
        $content .= '<img alt="" class="recent-comment-avatar" height="50" src="' . strtr($comment->avatar(50), ['&' => '&amp;']) . '" width="50">';
        $content .= '</figure>';
        $content .= '<header class="recent-comment-header">';
        $content .= '<h5 class="recent-comment-author">';
        $content .= '<a class="recent-comment-url" href="' . $comment->url . '#' . sprintf($c->anchor[0], $comment->id) . '" rel="nofollow">' . $comment->author . '</a>';
        $content .= '</h5>';
        $content .= '</header>';
        $content .= '<div class="recent-comment-body">';
        $content .= '<p>' . To::excerpt((string) $comment->content, $excerpt) . '</p>';
        $content .= '</div>';
        $content .= '<footer class="recent-comment-footer">';
        $content .= '<p class="recent-comment-meta">';
        $content .= '<time class="recent-comment-time" datetime="' . $comment->time->ISO8601 . '">' . $comment->time('%Y/%m/%d %T') . '</time>';
        $content .= '</p>';
        $content .= '</footer>';
        $content .= '</li>';
    }
    $content = $content ? '<ul class="recent-comments">' . $content . '</ul>' : '<p>' . i('No %s yet.', ['comments']) . '</p>';
    echo self::widget([
        'id' => 'comment-recent',
        'title' => i('Recent %s', ['Comments']),
        'content' => $content
    ]);
}

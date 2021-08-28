<?php

$chunk = $widget->page['chunk'];
$content = "";
$c = $page ?? 0; // Store current page instance if any
$pages = Pages::from(LOT . DS . 'page' . $state->pathBlog)->sort([-1, 'time']);

if ($pages->count) {
    $content .= '<ul>';
    foreach ($pages->chunk($chunk, 0) as $page) {
        $content .= '<li' . ($c && $c->name === $page->name ? ' class="current"' : "") . '>';
        $content .= '<a href="' . $page->url . '">' . $page->title . '</a>';
        $content .= '</li>';
    }
    $content .= '</ul>';
} else {
    $content .= '<p>' . i('No %s yet.', ['posts']) . '</p>';
}

echo self::widget([
    'id' => 'page-recent',
    'title' => $title ?? i('Recent %s', ['Posts']),
    'content' => $content
]);
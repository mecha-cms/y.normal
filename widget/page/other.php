<?php

$route = $route ?? $state->routeBlog;
$chunk = $state->widget->page->chunk;
$content = "";
$c = $page ?? 0; // Store current page instance if any
$query = explode('-', (string) ($c ? $c->name : ""));

$relates = [];
foreach (g(LOT . D . 'page' . $route, 'page') as $k => $v) {
    foreach ($query as $q) {
        if ("" === $q || $c && $c->path === $k) {
            continue; // Skip current page path
        }
        if (false !== strpos(basename($k, '.page'), $q)) {
            $relates[$k] = 1;
        }
    }
}

if ($relate = count($relates) > 1) {
    // Related post(s)
    $content .= '<ul>';
    foreach ((new Pages(array_keys($relates)))->shake->chunk($chunk, 0) as $page) {
        $content .= '<li>';
        $content .= '<a href="' . eat($page->url) . '">' . $page->title . '</a>';
        $content .= '</li>';
    }
    $content .= '</ul>';
    $title_default = i('Related %s', ['Posts']);
} else {
    // Random post(s)
    $pages = Pages::from(LOT . D . 'page' . $route);
    if ($pages->count) {
        $content .= '<ul>';
        foreach ($pages->shake->chunk($chunk, 0) as $page) {
            $content .= '<li' . ($c && $c->name === $page->name ? ' class="current"' : "") . '>';
            $content .= '<a href="' . eat($page->url) . '">' . $page->title . '</a>';
            $content .= '</li>';
        }
        $content .= '</ul>';
    } else {
        $content .= '<p role="status">' . i('No %s yet.', ['posts']) . '</p>';
    }
    $title_default = i('Random %s', ['Posts']);
}

echo self::widget([
    'id' => 'page-' . ($relate ? 'relate' : 'random'),
    'title' => $title ?? $title_default,
    'content' => $content
]);
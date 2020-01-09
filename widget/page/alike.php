<?php

$path = DS . trim(strtr(Path::D($url->path ?? "") ?? $widget->page['path'], '/', DS), DS);
$chunk = $widget->page['chunk'];
$content = "";
$c = $page ?? 0; // Store current page instance if any
$query = explode('-', $c ? $c->name : "");

$alikes = [];
foreach (g(LOT . DS . 'page' . $path, 'page') as $k => $v) {
    foreach ($query as $q) {
        if ("" === $q || $c && $c->path === $k) {
            continue; // Skip current page path
        }
        if (false !== strpos(Path::N($k), $q)) {
            $alikes[$k] = 1;
        }
    }
}

if ($alike = count($alikes) > 1) {
    // Related post(s)
    $content .= '<ul>';
    foreach ((new Pages(array_keys($alikes)))->shake->chunk($chunk, 0) as $page) {
        $content .= '<li>';
        $content .= '<a href="' . $page->url . '">' . $page->title . '</a>';
        $content .= '</li>';
    }
    $content .= '</ul>';
    $title = i('Related %s', ['Posts']);
} else {
    // Random post(s)
    $pages = Pages::from(LOT . DS . 'page' . $path);
    if ($pages->count) {
        $content .= '<ul>';
        foreach ($pages->shake->chunk($chunk, 0) as $page) {
            $content .= '<li' . ($c && $c->name === $page->name ? ' class="current"' : "") . '>';
            $content .= '<a href="' . $page->url . '">' . $page->title . '</a>';
            $content .= '</li>';
        }
        $content .= '</ul>';
    } else {
        $content .= '<p>' . i('No %s yet.', ['posts']) . '</p>';
    }
    $title = i('Random %s', ['Posts']);
}

echo self::widget([
    'id' => 'page-' . ($alike ? 'alike' : 'random'),
    'title' => $title,
    'content' => $content
]);

<?php

$content = "";

if (isset($state->x->search)) {
    $content .= self::form('search', ['route' => $route ?? $state->routeBlog]);
} else {
    $content .= '<p role="status">' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/search" target="_blank">search</a>']) . '</p>';
}

echo self::widget([
    'id' => 'form-search',
    'title' => $title ?? "",
    'content' => $content
]);
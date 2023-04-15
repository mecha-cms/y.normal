<?php

$content = "";

if (isset($state->x->search)) {
    $value = $_GET[$query = $state->x->search->key ?? 'query'] ?? null;
    $content .= '<form class="form-search" action="' . eat($url . ($route ?? $state->routeBlog)) . '" method="get">';
    $content .= '<p>';
    $content .= '<input class="input" name="' . eat($query) . '" placeholder="' . eat(i('Search')) . '…" type="text"' . ($value ? ' value="' . eat($value) . '"' : "") . '>';
    $content .= ' ';
    $content .= '<button class="button" type="submit">';
    $content .= '<span class="sr">' . i('Submit') . '</span>';
    $content .= '</button>';
    $content .= '</p>';
    $content .= '</form>';
} else {
    $content .= '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/search" target="_blank">search</a>']) . '</p>';
}

echo self::widget([
    'id' => 'form-search',
    'title' => $title ?? "",
    'content' => $content
]);
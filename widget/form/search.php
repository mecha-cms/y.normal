<?php

$content = "";

if ($c = $state->x->search ?? 0) {
    $query = Get::get($q = $c->key ?? 'q');
    $content .= '<form class="form-search" action="' . $url . $state->pathBlog . '" method="get">';
    $content .= '<p>';
    $content .= '<input class="input" name="' . $q . '" placeholder="' . i('Search') . '…" type="text"' . ($query ? ' value="' . From::HTML($query) . '"' : "") . '>';
    $content .= ' <button class="button" type="submit"><span class="sr">' . i('Submit') . '</span></button>';
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

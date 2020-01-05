<?php

$search = State::get('x.search');
if (null !== $search) {
    $query = Get::get($q = $search->key) ?? null;
    $content = '<form class="form-search" action="' . $url . $widget->page['path'] . '" method="get">';
    $content .= '<p>';
    $content .= '<input class="input" name="' . $q . '" placeholder="' . i('Search...') . '" type="text"' . (isset($query) ? ' value="' . From::HTML($query) . '"' : "") . '>';
    $content .= ' <button class="button" type="submit"><span class="sr">' . i('Submit') . '</span></button>';
    $content .= '</p>';
    $content .= '</form>';
    echo self::widget([
        'id' => 'form-search',
        'content' => $content
    ]);
}

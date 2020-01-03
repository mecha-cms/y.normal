<?php

$search = State::get('x.search');
if (null !== $search) {
    echo (function($search, $state, $url, $widget) {
        $query = $_GET[$q = $search->key] ?? null;
        $content = '<form class="form-search" action="' . $url . $widget->page['path'] . '" method="get">';
        $content .= '<input class="input" name="' . $q . '" placeholder="' . i('Search...') . '" type="text"' . (isset($query) ? ' value="' . htmlspecialchars($query) . '"' : "") . '>';
        $content .= '<button class="button" type="submit"><span class="sr">' . i('Submit') . '</span></button>';
        $content .= '</form>';
        $id = To::kebab(Path::N(__FILE__));
        return self::widget([
            'id' => 'form-search',
            'content' => $content
        ]);
    })($search, $state, $url, $widget);
}

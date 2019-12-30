<?php

if (null !== State::get('x.search')) {
    echo (function($state, $url, $widget) {
        $q = $state->q;
        $query = $_GET[$q] ?? null;
        $content = '<form class="form-search" action="' . $url . $widget->page['path'] . '" method="get">';
        $content .= '<input class="input" name="' . $q . '" placeholder="' . i('Search...') . '" type="text"' . (isset($query) ? ' value="' . htmlspecialchars($query) . '"' : "") . '>';
        $content .= '<button class="button" type="submit"></button>';
        $content .= '</form>';
        $id = To::kebab(Path::N(__FILE__));
        return self::widget([
            'id' => 'form-search',
            'content' => $content
        ]);
    })($state, $url, $widget);
}

?>

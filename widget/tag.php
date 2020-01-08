<?php

if (null !== State::get('x.tag')) {
    $path = $widget->page['path'];
    $p = State::get('x.tag.path');
    $a = [];
    $c = $tag ?? 0; // Store current tag instance if any
    $content = "";
    $pages = Pages::from(LOT . DS . 'page' . $path, 'page');
    if ($pages->count) {
        foreach ($pages as $page) {
            $a = concat($a, (array) $page['kind']);
        }
        if ($a) {
            $content .= '<ul>';
            $tags = [];
            foreach (array_count_values($a) as $k => $v) {
                if (false === ($n = To::tag($k))) {
                    continue;
                }
                $tag = new Tag(LOT . DS . 'tag' . DS . $n . '.page');
                $tags[$t = $tag->title] = '<li' . ($site->is('tags') && $c && $n === $c->name ? ' class="current"' : "") . '><a href="' . $url . $path . $p . '/' . $n . '" rel="tag">' . $t . '</a> <span class="count">' . $v . '</span></li>';
            }
            ksort($tags); // Sort by `title`
            $content .= implode("", $tags);
            $content .= '</ul>';
        }
    }
    $content = $content ?: '<p>' . i('No %s yet.', ['tags']) . '</p>';
    echo self::widget([
        'id' => 'tag',
        'title' => i('Tags'),
        'content' => $content
    ]);
}

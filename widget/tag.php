<?php

if (null !== State::get('x.tag')) {
    echo (function($page, $site, $tag, $url, $widget) {
        $r = $widget->page['path'];
        $path = State::get('x.tag.path');
        $data = [];
        $content = "";
        if ($kinds = glob(LOT . DS . 'page' . $r . DS . '*' . DS . 'kind.data', GLOB_NOSORT)) {
            foreach ($kinds as $kind) {
                $kind = e(trim(file_get_contents($kind))); // TODO
                $data = concat($data, (array) $kind);
            }
            if ($data) {
                $content .= '<ul>';
                $tags = [];
                foreach (array_count_values($data) as $k => $v) {
                    if (($slug = To::tag($k)) === false) {
                        continue;
                    }
                    $tag = new Tag(LOT . DS . 'tag' . DS . $slug . '.page');
                    $tags[$tag->title] = '<li' . ($site->is('tags') && $page->name === $slug ? ' class="current"' : "") . '><a href="' . $tag->url . '">' . $tag->title . '</a> <span class="counter">' . $v . '</span></li>';
                }
                ksort($tags); // Sort by `title`
                $content .= implode("", $tags) . '</ul>';
            }
        }
        $content = $content ?: '<p>' . i('No %s yet.', ['tags']) . '</p>';
        return self::widget([
            'id' => 'tag',
            'title' => i('Tags'),
            'content' => $content
        ]);
    })($page, $site, $tag, $url, $widget);
}

<?php

if (Extend::exist('tag')) {
    call_user_func(function() {
        extract(Lot::get());
        $r = $widget->page['path'];
        $path = Extend::state('tag', 'path');
        $data = [];
        $content = "";
        if ($kinds = glob(PAGE . DS . $r . DS . '*' . DS . 'kind.data', GLOB_NOSORT)) {
            foreach ($kinds as $kind) {
                $kind = e(file_get_contents($kind));
                $data = concat($data, (array) $kind);
            }
            if ($data) {
                $content .= '<ul>';
                $tags = [];
                foreach (array_count_values($data) as $k => $v) {
                    if (($slug = To::tag($k)) === false) {
                        continue;
                    }
                    $tag = new Tag(TAG . DS . $slug . '.page');
                    $u = $url . '/' . To::URL($r) . '/' . $path;
                    $tags[$tag->title] = '<li' . ($site->is('tags') && $page->slug === $slug ? ' class="current"' : "") . '>' . HTML::a($tag->title, $u . '/' . $tag->slug) . ' <span class="counter">' . $v . '</span></li>';
                }
                ksort($tags); // Sort by `title`
                $content .= implode("", $tags) . '</ul>';
            }
        }
        $content = $content ?: '<p>' . $language->message_info_void($language->tags) . '</p>';
        Shield::get('widget', [
            'id' => 'tag',
            'title' => $language->widget_tag->explore,
            'content' => $content
        ]);
    });
}
<?php

$content = "";

if ($cc = $state->x->tag ?? 0) {
    $a = [];
    $c = $tag ?? 0; // Store current tag instance if any
    $pages = Pages::from($folder = LOT . DS . 'page' . $state->pathBlog, 'page');
    if ($pages->count) {
        foreach ($pages as $page) {
            $a = array_merge($a, (array) $page->kind);
        }
        if ($a) {
            $content .= '<ul>';
            $tags = [];
            foreach (array_count_values($a) as $k => $v) {
                if (false === ($n = To::tag($k))) {
                    continue;
                }
                $tag = new Tag(LOT . DS . 'tag' . DS . $n . '.page');
                if ($page = File::exist([
                    $folder . '.archive',
                    $folder . '.page'
                ])) {
                    $tag->parent = new Page($page);
                }
                $tags[$t = $tag->title] = '<li' . ($site->is('tags') && $c && $n === $c->name ? ' class="current"' : "") . '><a href="' . $tag->link . '" rel="tag">' . $t . '</a> <span class="count">' . $v . '</span></li>';
            }
            ksort($tags); // Sort by `title`
            $content .= implode("", $tags);
            $content .= '</ul>';
        }
    }
    $content = $content ?: '<p>' . i('No %s yet.', ['tags']) . '</p>';
} else {
    $content = '<p>' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/tag" target="_blank">tag</a>']) . '</p>';
}

echo self::widget([
    'id' => 'tag',
    'title' => $title ?? i('Tags'),
    'content' => $content
]);
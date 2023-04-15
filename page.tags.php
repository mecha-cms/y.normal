<?php

if (isset($state->x->tag)) {
    $out = [];
    foreach ($tags as $tag) {
        $out[$title = $tag->title] = '<a href="' . eat($tag->link) . '" rel="tag">' . $title . '</a>';
    }
    ksort($out);
    echo $tags->count ? i('Tagged in %s', [implode(', ', $out)]) : "";
}
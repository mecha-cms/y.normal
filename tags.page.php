<?php

if (!empty($state->x->tag)) {
    $out = [];
    foreach ($tags as $tag) {
        $out[$title = $tag->title] = '<a href="' . $tag->link . '" rel="tag">' . $title . '</a>';
    }
    ksort($out);
    echo $tags->count ? i('Tagged in %s', [implode(', ', $out)]) : "";
}

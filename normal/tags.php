<?php

if ($page->tags) {
    $tags = [];
    foreach ($page->tags as $tag) {
        if ($tag && $tag->id !== 0) {
            $tags[] = HTML::a($tag->title, $tag->url, false, ['rel' => 'tag']);
        }
    }
    $s = $language->{count($tags) === 1 ? 'tag' : 'tags'};
    echo !empty($tags) ? $s . ': ' . implode(', ', $tags) : "";
}
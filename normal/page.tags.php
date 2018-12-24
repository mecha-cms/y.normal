<?php

if (Extend::exist('tag')) {
    call_user_func(function() use($lot) {
        extract(Lot::get(), EXTR_SKIP);
        $page = $lot['page'] ?? null;
        $tags = $page->tags->map(function($tag) {
            return HTML::a($tag->title, $tag->url, false, ['rel' => 'tag']);
        });
        $title = $language->{$tags->count === 1 ? 'tag' : 'tags'};
        echo $tags->count ? $title . ': ' . $tags : "";
    });
}
<?php

if (null !== State::get('x.tag')) {
    (function($tags) {
        $tags = $tags->map(function($tag) {
            return '<a href="' . $tag->url . '" rel="tag">' . $tag->title . '</a>';
        });
        echo $tags->count ? ('Tag' . (1 === $tags->count ? "" : 's')) . ': ' . $tags : "";
    })($tags);
}

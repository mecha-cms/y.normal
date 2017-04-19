<?php

return [
    'path' => 'article', // Your home page path
    'sort' => [-1, 'time'], // Default post(s) order
    'chunk' => 14, // Post(s) per page
    'widget' => [ // Widget setting(s)
        'comment' => [
            'path' => COMMENT,
            'chunk' => 5,
            'snippet' => [100, '&#x2026;']
        ],
        'page' => [
            'path' => 'article', // Your article’s folder relative to `lot\page`
            'chunk' => 7
        ]
    ]
];
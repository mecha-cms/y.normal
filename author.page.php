<?php

if (!empty($state->x->user) && $author instanceof User) {
    echo '<a href="' . ($author->link ?? $author->url) . '" rel="author">' . $author . '</a>';
} else {
    echo '<span class="a">' . $author . '</span>';
}

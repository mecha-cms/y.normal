<?php

call_user_func(function() {
    extract(Lot::get());
    $path = PAGE . DS . (Path::D($url->path) ?: $widget->page['path']);
    $chunk = $widget->page['chunk'];
    $relates = [];
    $content = "";
    if ($current = Lot::get('page')) {
        $slug = $current->slug;
        if ($pages = Get::pages($path, 'page', [1, 'path'])) {
            $query = explode('-', $slug);
            foreach ($pages as $page) {
                $name = Path::N($page);
                if ($name === $slug) {
                    continue; // Is the same page, skip!
                }
                foreach ($query as $q) {
                    if ($q && strpos($name, $q) !== false) {
                        $relates[] = $page;
                    }
                }
            }
        }
        $relates = array_unique($relates); // Remove duplicate(s)…
        if (!empty($relates)) {
            $relates = Anemon::eat($relates)->shake->chunk($chunk, 0);
        } else {
            $relates = $pages->shake->chunk($chunk, 0); // Random page(s)…
        }
        if ($relates->count) {
            $content .= '<ul>';
            foreach ($relates as $relate) {
                $relate = new Page($relate);
                $content .= '<li>' . HTML::a($relate->title, $relate->url) . '</li>';
            }
            $content .= '</ul>';
        }
    }
    if ($content) {
        Shield::get('widget', [
            'id' => 'page-relate',
            'title' => $language->widget_page->connect,
            'content' => $content
        ]);
    }
});
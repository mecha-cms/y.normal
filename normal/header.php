<!DOCTYPE html>
<html dir="<?php echo $site->direction; ?>" class="page-<?php echo $site->is ?: 'home'; ?>">
  <head>
    <meta charset="<?php echo $site->charset; ?>">
    <meta name="viewport" content="width=device-width">
    <?php if ($s = To::text($page->description($site->description))): ?>
    <meta name="description" content="<?php echo $s; ?>">
    <?php endif; ?>
    <?php if ($page->state === 'archive'): ?>
    <!-- Prevent search engines from indexing a page with `archive` state -->
    <meta name="robots" content="noindex">
    <?php endif; ?>
    <meta name="author" content="<?php echo $page->author; ?>">
    <title><?php echo To::text($site->page->title); ?></title>
    <link href="<?php echo $url; ?>/favicon.ico" rel="shortcut icon">
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <h1 class="title">
          <?php if ($url->path !== ""): ?>
          <a href="<?php echo $url; ?>"><?php echo $site->title; ?></a>
          <?php else: ?>
          <span class="a"><?php echo $site->title; ?></span>
          <?php endif; ?>
        </h1>
        <p class="description"><?php echo $site->description; ?></p>
      </header>
      <?php Shield::get('nav'); ?>
      <div class="content">
        <?php Shield::get('aside'); ?>
        <main class="main">
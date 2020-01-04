<!DOCTYPE html>
<html class dir="<?= $site->direction; ?>">
  <head>
    <meta charset="<?= $site->charset; ?>">
    <meta name="viewport" content="width=device-width">
    <?php if ($w = w($page->description($site->description))): ?>
    <meta name="description" content="<?= $w; ?>">
    <?php endif; ?>
    <?php if ('archive' === $page->x): ?>
    <!-- Prevent search engines from indexing pages with `archive` state -->
    <meta name="robots" content="noindex">
    <?php endif; ?>
    <meta name="author" content="<?= $page->author; ?>">
    <title><?= w($t->reverse); ?></title>
    <link href="<?= $url; ?>/favicon.ico" rel="shortcut icon">
    <link href="<?= $url->clean; ?>" rel="canonical">
  </head>
  <body>
    <div class="outer">
      <?= self::header(); ?>
      <?= self::nav(); ?>
      <div class="content">
        <?= self::aside(); ?>
        <main class="main">

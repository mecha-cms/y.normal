<!DOCTYPE html>
<html class dir="<?= $site->direction; ?>">
  <head>
    <meta charset="<?= $site->charset; ?>">
    <meta content="Mecha <?= VERSION; ?>" name="generator">
    <meta content="width=device-width" name="viewport">
    <?php if ($w = w($page->description($site->description))): ?>
    <meta content="<?= $w; ?>" name="description">
    <?php endif; ?>
    <?php if ('archive' === $page->x): ?>
    <!-- Prevent search engines from indexing pages with `archive` state -->
    <meta content="noindex" name="robots">
    <?php endif; ?>
    <meta content="<?= $page->author; ?>" name="author">
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

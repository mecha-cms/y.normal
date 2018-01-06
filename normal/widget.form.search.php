<section class="widget widget-form widget-form-search">
  <div class="widget-body">
    <div class="widget-content">
      <form class="form-search" action="<?php echo $url . '/' . $state->widget['page']['path']; ?>" method="get">
        <?php echo Form::text($config->q, Request::get($config->q), $language->search . '…', ['class[]' => ['input']]) . ' ' . Form::submit(null, null, "", ['class[]' => ['button']]); ?>
      </form>
    </div>
  </div>
</section>
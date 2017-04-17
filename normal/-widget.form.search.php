<div class="widget-wrapper">
  <div class="widget-content">
    <div class="widget widget-search widget-search-form">
      <form class="form-search" action="<?php echo $url . '/' . $state->widget['path']; ?>" method="get">
        <?php echo Form::text($config->q, Request::get($config->q), $language->search . '…', ['classes' => ['input']]) . ' ' . Form::submit(null, null, "", ['classes' => ['button']]); ?>
      </form>
	</div>
  </div>
</div>
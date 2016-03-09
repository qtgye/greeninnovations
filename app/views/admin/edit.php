<?php use \helpers\session; ?>
<div class="col-sm-12">

  <?php if ( $errors->has('any') ): ?>
    <ul class="alert alert-block alert-danger fade in">
      <?php foreach ($errors->all() as $key => $error): ?>
        <li><?= $error ?></li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>

  <?php if ( session::has_flash('success') ): ?>
    <div class="alert alert-block alert-success fade in">
      <?= session::get_flash('success') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif ?>

  <section class="panel form-panel">
      <header class="panel-heading form-panel-heading">
        Edit <?= $page_title ?>
      </header>
      <div class="form-panel-body">
          <form action="/admin/<?= $model_name ?>/<?= $$model_name->id ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <!-- @include('admin/_partials/form_'.$page) -->
              <?php $view::rendertemplate('forms/form-'.$page) ?>
              
              <?php if ( !is_null($submit_text) ): ?>
                <div class="form-group submit-block">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-primary"><?= $submit_text ?></button>
                  </div>
                </div>
              <?php endif ?>
              
          </form>
      </div>
  </section>

</div>
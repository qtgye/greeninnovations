<?php use \helpers\session; ?>
<div class="col-sm-12">

      <?php if ( $errors->has('any') ): ?>
        <ul class="alert alert-block alert-danger fade in">
          <?php foreach ($errors->all() as $key => $error): ?>
            <li><?= $error ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>

      <section class="panel form-panel">
          <header class="panel-heading form-panel-heading">
            New <?= $page_title ?>
          </header>
          <div class="form-panel-body">
              <form action="<?= '/admin/' . $model_name ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                  <!-- @include('admin/_partials/form_'.$page) -->
                  <?php $view::rendertemplate('forms/form-'.$page) ?>

                  <?php if (!is_null($submit_text)): ?>
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
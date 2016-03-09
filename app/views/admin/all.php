<?php use \helpers\session; ?>
<div class="col-lg-12 c-list js-list" data-model="<?= $model_name ?>">
        
  <?php if ( session::has_flash('success') ): ?>
    <div class="alert alert-block alert-success fade in">
      <?= session::get_flash('success') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif ?>   
  
    <?php if ( $items ): ?>

        <section class="panel form-panel">

          <header class="panel-heading form-panel-heading">
              All <?=$model_plural?>
          </header>
          
          <div class="form-panel-body">
            <table class="table table-advance list-table">
                 <tbody>      
                    <!-- @include('admin._partials.all_'.$model_name) -->
                    <?php $view->renderTemplate( 'lists/all-'.$model_name, $data ) ?>
                 </tbody>
              </table>          
          </div>
          
        </section>

    <?php else : ?>

        <blockquote>
          <p>
            You have no entry here yet.
          </p>
          <p>
            <a class="btn btn-primary" href="/admin/<?= $model_name ?>/new">Add your first <?=$page_title?> </a>
          </p>
        </blockquote>

    <?php endif ?>

  
</div>
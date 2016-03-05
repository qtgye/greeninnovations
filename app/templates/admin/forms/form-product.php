<?php use \helpers\form; ?>

<!-- NAME -->
<div class="form-group <?= $errors->has('name') ? 'has-error' : '' ?>">
  <label class="col-sm-2 control-label" for="products_name">Product Name <span class="required">*</span></label>
  <div class="col-sm-10">
      <?= Form::input([
          'type' => 'text',
          'name' => 'name',
          'class' => 'form-control',
          'id' => 'products_name',
          'value' => $input->get('name')
      ]) ?>
      <!-- {!! Form::text('name', null, [
            'class' => 'form-control',
            'id' => 'products_name'
      ]) !!} -->
  </div>
</div>

<?php

$category = $input->get('category');

if ( isset($category ) ) {
  if ( !is_array($category ) ) {
    $category = explode(',', $category);
  }
} else {
  $category = [];
}

?>
<!-- CATEGORY -->
<div class="form-group <?= $errors->has('category') ? 'has-error' : '' ?>">
    <label class="control-label col-lg-2" for="">Category <span class="required">*</span></label>
    <div class="col-lg-10">
        <!-- Residential -->
        <div class="form-group">
          <div class="col-md-3">
            <label class="control-label col-sm-12" for="">Residential :</label>
          </div>
          <div class="col-md-9">
            <?php
              $cats = [
                'residential-small'        => 'Small',
                'residential-multifamily'  => 'Multi Family',
                'residential-other'        => '<em>Other</em>'
              ];
              foreach ($cats as $key => $label):
            ?>
              <label class="text-left control-label col-lg-3" for="category-<?= $key ?>">
                <?= Form::checkbox([[
                    'name'    => 'category[]',
                    'id'      => 'category-' . $key,
                    'value'   => $key,
                    'checked' => in_array($key,$category) ? true : null
                ]]) ?>
              <?= $label ?>
            </label>
            <?php endforeach ?>
          </div>    
          <hr>      
        </div>
        <!-- Commercial -->
        <div class="form-group">
          <div class="col-md-3">
            <label class="control-label col-sm-12" for="">Commercial :</label>
          </div>
          <div class="col-md-9">
            <?php
              $cats = [
                'commercial-default'        => 'Commercial',
                'commercial-other'        => '<em>Other</em>'
              ];
              foreach ($cats as $key => $label):
            ?>
              <label class="text-left control-label col-lg-3" for="category-<?= $key ?>">
                <?= Form::checkbox([[
                    'name'    => 'category[]',
                    'id'      => 'category-' . $key,
                    'value'   => $key,
                    'checked' => in_array($key,$category) ? true : null
                ]]) ?>
              <?= $label ?>
            </label>
            <?php endforeach ?>
          </div>        
          <hr>  
        </div>
        <!-- Industrial -->
        <div class="form-group">
          <div class="col-md-3">
            <label class="control-label col-sm-12" for="">Industrial :</label>
          </div>
          <div class="col-md-9">
            <?php
              $cats = [
                'industrial-default'        => 'Industrial',
                'industrial-other'        => '<em>Other</em>'
              ];
              foreach ($cats as $key => $label):
            ?>
              <label class="text-left control-label col-lg-3" for="category-<?= $key ?>">
                <?= Form::checkbox([[
                    'name'    => 'category[]',
                    'id'      => 'category-' . $key,
                    'value'   => $key,
                    'checked' => in_array($key,$category) ? true : null
                ]]) ?>
                <?= $label ?>
            </label>
            <?php endforeach ?>
          </div>          
        </div>
        
    </div>
</div>

<!-- DESCRIPTION -->
<div class="form-group">
    <label class="control-label col-lg-2" for="description_products">Description</label>
    <div class="col-lg-10">
        <?= Form::textbox([
            'name' => 'description',
            'id' => "description_products",
            'class'=> "form-control ckeditor",
            'rows' => "6",
            'value' => $input->get('description')
        ]) ?>
        <!-- {!! Form::textarea('description', isset($product) ? $product->description : '', [
            'id' => "description_products",
            'class'=> "form-control ckeditor",
            'rows' => "6"
        ]) !!} -->
    </div>
</div>

<!-- IMAGE SRC -->
<div class="form-group form-image-input js-image-input">
    <label class="control-label col-lg-2" for="product_image">Image (product/logo)</label>
    <div class="col-lg-10">
      <div class="input-thumbnail">
        <img src="" alt="" class="input-image">
        <br><br>
      </div>
      <?= Form::input([
          'type' => 'text',
          'name' => 'image',
          'id' => 'product_image',
          'class' => 'hidden',
          'value' => $input->get('image')
      ]) ?>
      <div>
        <div class="btn btn-default js-image-input-btn" data-toggle="modal">
          <span class="select">
            Select Image
          </span>
          <span class="replace">
            Replace Image
          </span>
        </div>
      </div>      
    </div>    
</div>

<!-- pdf select -->
<div class="form-group <?= $errors->has('info_file') ? 'has-error' : '' ?> form-pdf-input js-pdf-input">
    <label class="control-label col-lg-2" for="product_info-file">Product Info File</label>
    <div class="col-lg-10">
      <p class="input-text"><?= $input->get('info_file') ?></p>
      <?= Form::input([
          'type' => 'text',
          'name' => 'info_file',
          'class' => 'hidden js-filename-holder',
          'value' => $input->get('info_file')
      ]) ?>
      <p class="show-on-error alert alert-danger">
        Please select a valid pdf file.
      </p>
      <label for="product_info_file" class="btn btn-default">
          <span class="select">
            Select File
          </span>
          <span class="replace">
            Replace File
          </span>
      </label>
      <?= Form::input([
          'type' => 'file',
          'name' => 'info_file',
          'id' => 'product_info-file',
          'class' => 'hidden',
          'id' => 'product_info_file'
      ]) ?>
      <p class="help-block">Accepted file type is PDF.</p>
    </div>    
</div>
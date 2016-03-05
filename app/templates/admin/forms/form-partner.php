<?php use \helpers\form; ?>

<!-- NAME -->
<div class="form-group <?= $errors->has('name') ? 'has-error' : '' ?>">
  <label class="col-sm-2 control-label" for="partners_name">Name <span class="required">*</span></label>
  <div class="col-sm-10">
      <?= Form::input([
            'type' => 'text',
            'name' => 'name',
            'class' => 'form-control',
            'id' => 'partners_name',
            'value' => $input->get('name')
      ]) ?>
      <!-- {!! Form::text('name', null, [
            'class' => 'form-control',
            'id' => 'partners_name'
      ]) !!} -->
  </div>
</div>

<!-- DESCRIPTION -->
<div class="form-group <?= $errors->has('description') ? 'has-error' : '' ?>">
    <label class="control-label col-lg-2" for="description_partners">Description <span class="required">*</span></label>
    <div class="col-lg-10">
        <?= Form::textbox([
            'name' => 'description',
            'id' => "description_partners",
            'class'=> "form-control ckeditor",
            'rows' => "6",
            'value' => $input->get('description')
        ]) ?>
        <!-- {!! Form::textarea('description', isset($partner) ? $partner->description : '', [
            'id' => "description_partners",
            'class'=> "form-control ckeditor",
            'rows' => "6"
        ]) !!} -->
    </div>
</div>

<!-- VIDEO -->
<div class="form-group <?= $errors->has('video_link') ? 'has-error' : '' ?>">
  <label class="col-sm-2 control-label" for="video_link_partners">Video URL</label>
  <div class="col-sm-10">
      <?= Form::input([
          'type' => 'text',
          'name' => 'video_link',
          'class' => 'form-control',
          'id' => 'video_link_partners',
          'value' => $input->get('video_link')
      ]) ?>
      <!-- {!! Form::text('video_link', null, [
            'class' => 'form-control',
            'id' => 'video_link_partners'
      ]) !!} -->
  </div>
</div>

<!-- WEBSITE -->
<div class="form-group <?= $errors->has('url') ? 'has-error' : '' ?>">
  <label class="col-sm-2 control-label" for="url_parners">Website</label>
  <div class="col-sm-10">
      <?= Form::input([
          'type' => 'text',
          'name' => 'url',
          'class' => 'form-control',
          'id' => 'url_parners',
          'value' => $input->get('url')
      ]) ?>
      <!-- {!! Form::text('url', null, [
            'class' => 'form-control',
            'id' => 'url_parners'
      ]) !!} -->
  </div>
</div>

<!-- IMAGE SRC -->
<div class="form-group <?= $errors->has('image') ? 'has-error' : '' ?> form-image-input js-image-input">
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
      <!-- {!! Form::text('image', null,[
          'id' => 'product_image',
          'class' => 'hidden',
      ]) !!}    -->
      <div>
        <div class="btn btn-default js-image-input-btn" data-toggle="modal" data-target="#imageSelectModal">
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
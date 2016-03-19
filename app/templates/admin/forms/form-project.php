<?php use \helpers\form; ?>

<!-- TITLE -->
<div class="form-group <?= $errors->has('title') ? 'has-error' : '' ?>">
  <label class="col-sm-2 control-label" for="project_title">Title <span class="required">*</span></label>
  <div class="col-sm-10">
      <?= Form::input([
          'type'    => 'text',
          'name'    => 'title',
          'value'   => $input->get('title'),
          'class' => 'form-control',
            'id' => 'project_title'
      ]) ?>
      <!-- {!! Form::text('title', isset($project) ? $project->title : '', [
            'class' => 'form-control',
            'id' => 'project_title'
      ]) !!} -->
  </div>
</div>

<!-- IMAGE SRC -->
<div class="form-group <?= $errors->has('image') ? 'has-error' : '' ?> form-image-input js-image-input">
    <label class="control-label col-lg-2" for="project_image">Image (product/logo)</label>
    <div class="col-lg-10">
      <div class="input-thumbnail">
        <img src="" alt="" class="input-image">
        <br><br>
      </div>
      <?= Form::input([
          'type'    => 'text',
          'name'    => 'image',
          'value'   => $input->get('image'),
          'id' => 'project_image',
          'class' => 'hidden',
      ]) ?>
      <!-- {!! Form::text('image', null,[
          'id' => 'project_image',
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

<!-- DETAILS -->
<div class="form-group <?= $errors->has('details') ? 'has-error' : '' ?>">
    <label class="control-label col-lg-2" for="project_details">Project Details:</label>
    <div class="col-lg-10">
        <?= Form::textbox([
            'name' => 'details',
            'id' => "project_details",
            'class'=> "form-control ckeditor",
            'rows' => "3",
            'value' => $input->get('details')
        ]) ?>
    </div>
</div>

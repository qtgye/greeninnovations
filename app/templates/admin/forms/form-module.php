<?php use \helpers\form; ?>

<section class="panel">

  <header class="panel-heading tab-bg-primary">
      <ul class="nav nav-tabs">
          <li class="active">
              <a data-toggle="tab" href="#home">Home</a>
          </li>
      </ul>
  </header>
  <div class="panel-body">
      <div class="tab-content">

          <div id="home" class="tab-pane active">
            
            <!-- HOMEPAGE CAROUSEL -->
            <div class="form-group <?= $errors->has('home-hero-carousel') ? 'has-error' : '' ?>">
              <label class="col-sm-12 control-label text-left" for="home-hero-carousel">Homepage Carousel</label>
              <div class="col-sm-12 js-sortable" data-sortable-name="home-hero-carousel">
                  <input 
                    type="text"
                    name = 'home-hero-carousel'
                    class = 'form-control js-sortable-input hide'
                    data-sortable-container = '#home_carousel_sortable'
                    id = 'home-hero-carousel'
                    hidden
                    value='<?= htmlentities($input->get("home-hero-carousel"),ENT_QUOTES) ?>'
                    >

                  <div class="panel panel-default">
                    <div id="home_carousel_sortable" class="js-sortable-container panel-body">
                    </div>
                    <div class="panel-footer clearfix">
                      <div class="btn btn-small btn-default pull-right js-add-sortable">
                        <div class="fa fa-plus"></div>
                        Add Carousel Item
                      </div>
                    </div>
                  </div>
              </div>

              <!-- homepage sortable item template -->
              <div class="template hide" id="sortable-item-template">
                <div class="sortable-item panel panel-default">
                  <div class="panel-heading clearfix">
                    <div class="row">
                      <h5 class="sortable-item-heading col-xs-10"></h5>
                      <div class="btn btn-small pull-right sortable-item-remove">
                        <div class="fa fa-times"></div>
                      </div>
                    </div>                   
                  </div>
                  <div class="panel-body">
                    <!-- small title -->
                    <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Large Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control sortable-item-title" data-bind="large-title">
                      </div>
                    </div>
                    <!-- large title -->
                    <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Small Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control sortable-item-small-title" data-bind="small-title">
                      </div>
                    </div>
                    <!-- description -->
                    <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-9">
                        <textarea type="text" class="form-control sortable-item-description" data-bind="description"></textarea>
                      </div>
                    </div>
                    <!-- image -->
                    <div class="form-group form-image-input js-image-input">
                      <label class="control-label col-lg-3" for="product_image">Image (product/logo)</label>
                      <div class="col-lg-9">
                        <div class="input-thumbnail">
                          <img src="" alt="" class="input-image">
                          <br><br>
                        </div>
                        <input type="text" class="hide sortable-item-image" data-bind="image" hidden>
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
                  </div>
                </div> 
              </div>

            </div>

          </div>

      </div>
  </div>
</section>
<?php use \helpers\Form; ?>
<!-- Navigation -->
<!-- /.nav-wrp --><!-- Call to action-section -->
<!-- /.calltoaction-section --><!-- Testimonials -->
<!-- /.testimonial-section --><!-- Navigation -->
<!-- /.nav-wrp --><!-- Call to action-section -->
<!-- /.calltoaction-section --><!-- product-section -->
<!-- /.product-section --><!-- Navigation -->
<!-- /.nav-wrp --><!-- Call to action-section -->
<!-- /.calltoaction-section --><!-- Features -->
<!-- /.feature-section --><!-- Navigation -->
<nav class="nav-wrp nav-4">
    <div class="container">
        
        <div class="nav-header">
            <a class="navbar-brand" href="/">
                <?php if (isset( $info['logo'] )): ?>
                    <img src="/uploads/<?= $info['logo'] ?>" alt="<?= $info['site-title'] ?>">
                <?php else: ?>
                    <h3><?= $info['site-title'] ?></h3>
                <?php endif ?>
            </a>
            <a class="nav-handle fs-touch-element" data-nav=".nav"><i class="fa fa-bars"></i></a>   
        </div>
        
        <div class="nav vm-item">
            <ul class="nav-links">
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/technologies">Technologies</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/news">News</a></li>
                <li><a id="request_quote" class="btn btn-success" href="#requestModal" data-toggle="modal" data-target="#requestModal">Request A Quote</a></li>
            </ul>
            <div class="nav-other">
                <span class="text-success"><a href="javascript:;"><i class="fa fa-phone"></i> <?= $info['phone'] ?></a></span>
                <span class="text-success"><a href="mailto:<?= $info['email'] ?>"><i class="fa fa-envelope-o"></i> Email us</a></span>
            </div>
        </div><!-- /.nav --> 
        
    </div><!-- /.container --> 
</nav><!-- /.nav-wrp -->

<!-- request a quote modal -->
<div class="modal fade" style="display:none" id="requestModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <button class="modal-corner-button top-right" data-dismiss="modal">
                <span class="modal-corner-triangle"></span>
                <i class="fa fa-times fa-lg"></i>
            </button>

            <div class="modal-header">
                <h3 class="modal-title font-title">REQUEST A QUOTE</h3>
                <p class="modal-subtitle font-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="modal-body">
              <form action="" class="form-horizontal clearfix" id="request-form" method="POST">
                  
                <div class="row">
                    <!-- FULL NAME -->
                    <div class="form-group col-xs-6">
                        <label class="col-xs-12 control-label text-left" for="products_name">Full Name</label>
                        <div class="col-xs-12">
                          <?= Form::input([
                              'type' => 'text',
                              'name' => 'first_name',
                              'class' => 'form-control',
                              'placeholder' => 'First Name'
                          ]) ?>
                        </div>
                    </div>
                    <div class="form-group col-xs-6">
                        <label class="col-xs-12 control-label text-left" for="products_name">&nbsp;</label>
                        <div class="col-xs-12">
                          <?= Form::input([
                              'type' => 'text',
                              'name' => 'last_name',
                              'class' => 'form-control',
                              'placeholder' => 'Last Name'
                          ]) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <!-- EMAIL -->
                    <div class="form-group col-xs-6">
                        <label class="col-xs-12 control-label text-left" for="">Email</label>
                        <div class="col-xs-12">
                          <?= Form::input([
                              'type' => 'text',
                              'name' => 'email',
                              'class' => 'form-control',
                              'placeholder' => 'Enter valid email address'
                          ]) ?>
                        </div>
                    </div>

                    <!-- PHONE NUMBER -->
                    <div class="form-group col-xs-6">
                        <label class="col-xs-12 control-label text-left" for="">Phone</label>
                        <div class="col-xs-12">
                          <?= Form::input([
                              'type' => 'text',
                              'name' => 'phone',
                              'class' => 'form-control',
                              'placeholder' => '091-000-0000'
                          ]) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- TYPE -->
                    <div class="form-group radio-group col-xs-12">
                        <div class="row radio-group-border">
                            <div class="col-xs-3">
                              <em class="radio-group-label">Project type</em>
                            </div>
                            <div class="col-xs-3">
                              <label for="type-residential" class="radio-label">
                                  <input id="type-residential" type="radio" name="project_type">
                                  Residential
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label for="type-commercial" class="radio-label">
                                  <input id="type-commercial" type="radio" name="project_type">
                                  Commercial
                              </label>
                            </div>
                            <div class="col-xs-3">
                              <label for="type-industrial" class="radio-label">
                                  <input id="type-industrial" type="radio" name="project_type">
                                  Industrial
                              </label>
                            </div>
                        </div>                    
                    </div>
                </div>

                <div class="row">
                    <!-- PROJECT BRIEF -->
                    <div class="form-group col-xs-12 textbox-group">
                        <label class="control-label text-left col-xs-12">Project brief</label>
                        <div class="col-xs-12">
                            <?= Form::textbox([
                                'name' => 'project_brief',
                                'class'=> "form-control",
                                'rows' => "5",
                                'placeholder' => 'Briefly describe your project specs.'
                            ]) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="modal-form-actions">
                    <button type="submit" class="btn btn-success" data-dismiss="modal">SUBMIT REQUEST</button>
                    <div class="btn btn-outline btn-success" data-dismiss="modal">CANCEL</div>       
                  </div>
                </div>

              </form>
            </div>

        </div>
    </div>
</div>
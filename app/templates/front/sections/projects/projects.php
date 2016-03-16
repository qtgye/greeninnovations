<?php if (isset( $projects ) && count($projects) > 0): ?>
    <!-- product-section -->
    <section class="product-section align-c product-section-2">
        <div class="container">

            <div class="js-flickity projects-carousel" data-flickity-options='{"imagesLoaded":true}'>
                <?php foreach ($projects as $project): ?>
                
                <div class="projects-carousel-item">
                    <div class="card-wide">
                        <div class="card-image col-sm-6">
                            <?php if (isset( $project->image )): ?>
                                <img src="/uploads/<?= $project->image ?>" alt="">
                            <?php endif ?>                            
                        </div>
                        <div class="card-content col-sm-6">
                            <h4 class="card-title">
                                <?= $project->title ?>
                            </h4>
                            <hr class="hr-left">
                            <p class="card-info">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium quo ducimus ut nihil ratione harum! Similique magni ipsum placeat et, ratione sit velit! Omnis doloremque nisi, possimus deserunt odio dolorum.
                            </p>
                            <div class="btn btn-small btn-outline btn-success">COMPLETE DETAILS</div>
                            <div class="btn btn-small btn-success" data-toggle="modal" data-target="#requestModal">START A PROJECT WITH US</div>  
                        </div>
                    </div>
                </div>

                <?php endforeach ?>
            </div>                

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.product-section -->
<?php endif ?>
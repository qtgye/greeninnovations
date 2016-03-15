<!-- product-section -->
<section class="product-section product-section-2 bg-gray home-projects-section">
    <!-- carousel-widget -->
    <div class="carousel-widget ctrl-2" id="carousel-widget" data-itemrange="" data-autoplay="false" data-loop="true" data-nav="true">
        <div class="carousel js-flickity" data-flickity-options='{"pageDots":false,"setGallerySize":true,"imagesLoaded":false}'>

            <?php foreach ($projects as $project): ?>
                <!-- Item -->
                <div class="item">
                    <img src="/uploads/<?= $project->image ?>" alt="" class="bg-image">

                    <!-- product-box2 -->
                    <div class="product-box2">
                        <!-- Image -->
                        <?php if ($project->image): ?>
                            <div class="img">
                                <a href="javascript://void" target="_blank">
                                    <img src="/uploads/<?= $project->image ?>" alt="<?= $project->title ?>" title="<?= $project->title ?>">
                                </a>
                            </div>
                        <?php endif ?>
                        <!-- Info -->
                        <div class="info">
                            <!-- <small class="tag-text">NEW YORK CITY</small> -->
                            <!-- <h2 class="hd">
                                <a href="javascript://void" target="_blank"><?= $project->title ?></a>
                            </h2> -->
                            <p class="font-title small-heading">COMPLETED PROJECTS</p>
                            <h2 class="title text-left">
                                <a href="javascript://void" target="_blank"><?= $project->title ?></a>
                            </h2>
                            <hr class="hr-left">
                            <p>
                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi sit, molestiae aut maiores ipsa. Aspernatur, ratione sequi non, ab autem minus voluptate voluptas, incidunt magnam inventore maiores? Sunt, commodi ipsa. -->
                            </p>
                        </div>
                        
                    </div>
                    <!-- /.product-box2 -->
                </div><!-- /.Item -->
            <?php endforeach ?>

        </div><!-- /.owl-carousel -->
    </div><!-- /.carousel-widget -->
</section><!-- /.product-section -->
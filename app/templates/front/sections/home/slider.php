<?php 

// SETUP CAROUSEL ITEMS
$carousel_items = [];
try {
    $carousel_items = json_decode($carousel->value)->items;
} catch (Exception $err) {
    $carousel_items = [];
}

if ( !empty($carousel_items) ) : ?>
    
<!-- Slider -->
<section id="homepage_carousel" class="slider-section slider-section-1">
    
    <div class="carousel-widget ctrl-1" id="carousel-widget" data-items="1" data-itemrange="false" data-tdrag="false" data-mdrag="false" data-pdrag="false" data-autoplay="true" data-loop="true" data-nav="true">

        <div class="owl-carousel">

            <?php foreach ($carousel_items as $key => $item): ?>
                <div class="item">
                    <div class="overlay full-wh bg-cover" data-bg="/uploads/<?= $item->image ?>"></div>
                    <div class="container">
                        <div class="info-wrp">
                            <h2 class="main-text">
                                <small><?= $item->{'small-title'} ?></small>
                                <?= $item->{'large-title'} ?>
                            </h2>
                            <hr>
                            <p class="sub-text">
                                <?= $item->description ?>
                            </p>
                            <!-- <a href="#" class="btn btn-success">Learn more</a> -->
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.item -->
            <?php endforeach ?>

        </div><!-- /.owl-carousel -->
    </div><!-- /.carousel-widget -->
</section><!-- /.slider-section -->

<?php endif; ?>

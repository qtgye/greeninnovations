<section id="services" class="content-section align-c content-section-9" style="outline-offset: -3px;">
    <div class="container">
        <h2 class="title">Wastewater Treatment Services</h2>
        
        <hr>

        <p class="title-sub text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>

        <div class="row gallery clearfix">
            
            <?php foreach ([ 'RESIDENTIAL', 'COMMERCIAL', 'INDUSTRIAL' ] as $key => $value): ?>
                <div class="col-md-4 gallery-item">                        
                    <div class="service-card">
                        <div class="card-icon">
                            <img class="service-card-icon" src="/app/templates/front/icons/service_icon_<?= strtolower($value) ?>.jpg" alt="">
                        </div>
                        <div class="card-content">
                            <div class="card-content-center">
                                <p class="strong"><strong><?= $value ?></strong></p>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>                            
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div><!-- /.container -->
</section><!-- /.content-section -->
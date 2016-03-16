<!-- Content -->
<section class="content-section content-section-12">
    <div class="container">
        <div class="row about-cards-container">

            <?php
            $titles = [
                'description' => 'Our Company',
                'mission' => 'Our Mission',
                'vision' => 'Our Vision'
            ];
            foreach ([ 'description','mission','vision' ] as $info_name ):
                ?>
                <div class="card-wide">
                    <div class="card-image col-sm-6">
                        <img src="/app/templates/front/images/about_card_<?= $info_name ?>.jpg" alt="">
                    </div>
                    <div class="card-content col-sm-6">
                        <h2 class="card-title">
                            <?= $titles[$info_name] ?>
                        </h2>
                        <hr class="hr-left">
                        <p class="card-info">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium quo ducimus ut nihil ratione harum! Similique magni ipsum placeat et, ratione sit velit! Omnis doloremque nisi, possimus deserunt odio dolorum.
                        </p>
                        <?php if ( $info_name == 'description' ): ?>
                            <div class="btn btn-outline btn-success" data-toggle="modal" data-target="#requestModal">Start a project with us</div>
                        <?php endif ?>                        
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
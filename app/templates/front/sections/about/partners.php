<div class="content-section content-section-12">
    <div class="container">

        <br>
        
        <div class="row eqh gt40 fs-equalize-element partners-card-container">

            <?php if (isset($partners)): ?>
                <h4 class="title">Our Partners</h3>        
                <?php foreach ($partners as $partner): ?>
                    <div class="col-md-3 partner-card" style="height: 246px;">
                        <div class="info-box info-box6">
                            <?php if (isset( $partner->image )): ?>
                                <img src="/uploads/<?= $partner->image ?>" alt="">
                            <?php endif ?>
                            <hr class="mr-b-40">
                            <div class="info">
                                <h2 class="hd"><?= $partner->name ?></h2>
                                <p class="sub-txt"><?= $partner->description ?></p>                                
                            </div>
                            <a class="text-primary" href="<?= $partner->url ?>"><?= str_replace('http://','',trim($partner->url,'/')) ?></a>
                        </div>  
                    </div>
                <?php endforeach ?>   
            <?php endif ?>

        </div>

    </div>
</div>
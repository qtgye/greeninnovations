<?php if ( !empty($news) ): ?>

<section id="news" class="content-section align-c content-section-9" style="outline-offset: -3px;">
    <div class="container">
        <h2 class="title">News and Updates</h2>
        
        <hr>

        <p class="title-sub text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>

        <div class="row gallery clearfix">
            
            <?php
            foreach ($news as $key => $item):
                $date = new DateTime($item->created_at);
            ?>
                <div class="col-md-4 gallery-item">                        
                    <div class="article-card">
                        <div class="card-thumbnail">
                            <a href="#">
                                <?php if ( !empty($item->image) ): ?>
                                    <img class="card-thumbnail-image" src="/uploads/<?= $item->image ?>" alt="">
                                <?php endif ?>         
                            </a>                                               
                        </div>
                        <div class="card-content">
                            <div class="badge flex-center">
                                <div class="flex-content">
                                    <p><small><?= strtoupper(date_format($date,'M')) ?></small></p>
                                    <p class="badge-date"><strong><?= strtoupper(date_format($date,'d')) ?></strong></p>
                                </div>
                            </div>
                            <div class="card-content-body">
                                <p class="strong card-title">
                                    <strong><a href="#"><?= $item->title ?></a></strong>
                                </p>
                                <p class="text-muted card-excerpt"><?= substr($item->content, 0,200) ?>...</p>
                            </div>                            
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div><!-- /.container -->
</section><!-- /.content-section -->

<?php endif ?>


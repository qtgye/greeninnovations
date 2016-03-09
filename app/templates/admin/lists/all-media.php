<div class="list-row col-xs-6 col-sm-4 image-select-item panel"data-item-id="<?= $item->id ?>" >
    <div class="panel-body">
        <div class="image-select-thumbnail">

            <?php if ($item->file_type == 'image'): ?>
                <img class="image-select-image" src="/uploads/<?= $item->file_name ?>" title="<?= $item->title ?>" alt="">
            <?php elseif ( ! $item->file_type ): ?>
                <img class="image-select-image" src="/app/templates/admin/images/other.png" title="<?= $item->title ?>" alt="">
            <?php else: ?>
                <img class="image-select-image"src="/app/templates/admin/images/<?= $item->file_type ?>.png" title="<?= $item->title ?>" alt="">
            <?php endif ?>    

            <div class="btn-group form-actions form-actions-media">
                <a class="btn btn-danger js-item-delete" data-toggle="modal" href="#confirmModal"><i class="fa fa-times"></i></a>
            </div> 

        </div>               
    </div>    
</div>

<?php endforeach ?>
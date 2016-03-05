<thead>
    <tr class="list-header">
        <th class=""><!-- Thumnbnail --></th>
        <th class="">Title</th>
        <th class="">Type</th>
        <th class=""></th>
    </tr>    
</thead>

<?php foreach ($items as $key => $item): ?>
<tr class="list-row" data-item-id="<?= $item->id ?>">
    <td class="center-text">        
        <?php if ($item->file_type == 'image'): ?>
            <img class="list-thumbnail js-zoomable" src="/uploads/<?= $item->file_name ?>" title="<?= $item->title ?>" alt="">
        <?php elseif ( ! $item->file_type ): ?>
            <img class="list-thumbnail thumbnail-small" src="/app/templates/admin/images/other.png" title="<?= $item->title ?>" alt="">
        <?php else: ?>
            <img class="list-thumbnail thumbnail-small"src="/app/templates/admin/images/<?= $item->file_type ?>.png" title="<?= $item->title ?>" alt="">
        <?php endif ?>
    </td>
    <td class="text-overflow center-text"><?= $item->title ?></td>
    <td class=""><?= $item->file_type ?></td>
    <td class="">
        <div class="btn-group form-actions">
            <a class="btn btn-danger js-item-delete" data-toggle="modal" href="#confirmModal"><i class="fa fa-times"></i></a>
        </div>
    </td>                            
</tr>  
<?php endforeach ?>
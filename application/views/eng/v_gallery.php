<div class="col-lg-10 col-md-10 col-xs-10 col-lg-offset-1 col-md-offset-1">
    <?php foreach($articles as $r):?>
        <h1 style="font-family: Open"><?= $r->article_title ?></h1>
        <?= $r->article_content; ?>
    <?php endforeach; ?>

        <h1 style="font-family: Open"><?= $this->lang->line('our-jobs'); ?></h1>
        <div class="row">
            <?php foreach($gallery as $r):?>
            <div class="col-lg-3 col-sm-4"><a href="#" title="<?= $r->img_title; ?>"><img src="<?= base_url(); ?>gallery/<?= $r->img_gallery;?>" class="thumbnail img-responsive" data-toggle="modal" data-target="#ModalPhoto_<?= $r->id_img ;?>"></a></div>
        </div>

            <!-- Modal -->
            <div class="modal fade" id="ModalPhoto_<?= $r->id_img; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><?= $r->img_title;?></h4>
                        </div>
                        <div class="modal-body text-center">
                            <img src="<?= base_url();?>gallery/<?= $r->img_gallery;?>" style="max-width: 750px;"> <br>
                            <?php if($r->img_caption!="") :?>
                                <br><strong><?= $this->lang->line('caption'); ?> :</strong><br>
                                <?= $r->img_caption;?>
                            <?php endif;?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('close'); ?></button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php endforeach; ?>
</div>




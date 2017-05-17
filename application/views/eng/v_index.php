<div class="col-lg-12 col-md-12 col-xs-12">
<br>
    <div class="col-lg-7 newsHome">
                <h2><?= $this->lang->line('title-news');?></h2>
                <p><?= $this->lang->line('news-description');?></p>
                <a class="readmoreNews" href="<?= site_url('/Home_c/news');?>"><?= $this->lang->line('read-more');?> &raquo;</a>

    </div>

    <div class="col-lg-5 imgTooth">
        <img id="toothbrushes" src="<?php echo base_url();?>assets/images/toothbrushes.jpg">
    </div>

    <!-- Link -->
    <div class="col-lg-4 col-md-4 col-xs-12 news1">
        <div class="col-sm-4">
            <img src="<?php echo base_url();?>assets/images/facilitiesimages.jpg" alt="" />
        </div>

        <div class="col-sm-8" style="padding-left: 3.5em;">
            <h2><?= $this->lang->line('facilities');?></h2>
            <p><?= $this->lang->line('facilities-description');?></p>
            <a href="<?= site_url('/Home_c/facilities');?>" class="readmore"><?= $this->lang->line('read-more');?> &raquo;</a>
            <br><br>

        </div>

    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 news2">
                <!-- Link -->
         <div class="col-sm-4">
             <img src="<?php echo base_url();?>assets/images/pricingimage.jpg" alt="" />
        </div>
        <div class="col-sm-8" style="padding-left: 3.3em;">
            <h2><?= $this->lang->line('pricing');?></h2>
            <p><?= $this->lang->line('pricing-description');?></p>
            <a href="<?= site_url('/Home_c/pricing');?>" class="readmore"><?= $this->lang->line('read-more');?> &raquo;</a>
            <br><br>

        </div>

    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 news3">
                <!-- Link -->
        <div class="col-sm-4">
            <img src="<?php echo base_url();?>assets/images/couple_smiling.jpg" alt="" />
        </div>

        <div class="col-sm-8" style="padding-left: 3.5em;">
            <h2><?= $this->lang->line('gallery');?></h2>
            <p><?= $this->lang->line('gallery-description');?></p>
            <a href="<?= site_url('/Home_c/gallery');?>" class="readmore"><?= $this->lang->line('read-more');?> &raquo;</a>
            <br><br>
        </div>
    </div>
</div>

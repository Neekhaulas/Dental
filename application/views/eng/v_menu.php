<div class="menu">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?= site_url('/Home_c/index');?>"><?= $this->lang->line('home');?></a></li>
                    <li><a href="<?= site_url('/Home_c/pricing');?>"><?= $this->lang->line('pricing');?></a></li>
                    <li><a href="<?= site_url('/Home_c/gallery');?>"><?= $this->lang->line('gallery');?></a></li>
                    <li><a href="<?= site_url('/Home_c/facilities');?>"><?= $this->lang->line('facilities');?></a></li>
                    <li><a href="<?= site_url('/Home_c/news');?>"><?= $this->lang->line('news');?></a></li>
                    <li><a href="<?= site_url('/Home_c/contact');?>"><?= $this->lang->line('contact');?></a></li>
                    <li><a href="<?= site_url('/Language_c/switchLanguage/english');?>"><img class="flag" src="<?php echo base_url();?>assets/images/england.png"></a></li>
                    <li><a href="<?= site_url('/Language_c/switchLanguage/french');?>"><img class="flag" src="<?php echo base_url();?>assets/images/france.png"></a></li>
                    <li><a href="<?= site_url('/Users_c/ConnectionViewPatient');?>"><span class="glyphicon glyphicon-off"></span></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

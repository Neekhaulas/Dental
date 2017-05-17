<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->lang->line('patients'); ?>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-clock-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php date_default_timezone_set('Europe/London');?>
                                <div class="huge hour" id="hour"></div>
                                <div class="day" id="day"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-lg-offset-6">
                 <a href="<?=site_url('/Staff_c/newPatient/')?>">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $this->lang->line('new'); ?></div>
                                </div>
                            </div>
                          </div>
                    </div>
                 </a>
            </div>
        </div>
        <!-- /.row -->


        <!-- TABLE PATIENTS -->
        <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i> <?= $this->lang->line('patient'); ?>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs" onclick="location.reload();">
                                <i class="fa fa-fw fa-refresh"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-hover table-striped table-bordered" id="dataTables">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?= $this->lang->line('surname'); ?></th>
                        <th><?= $this->lang->line('first-name'); ?></th>
                        <th><?= $this->lang->line('date-of-birth'); ?></th>
                        <th><?= $this->lang->line('phone'); ?></th>
                        <th><?= $this->lang->line('email'); ?></th>
                        <?php if($this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3 || $this->session->userdata('post_right')==4) :?>
                            <th class="text-center"><?= $this->lang->line('patient-file'); ?></th>
                        <?php endif;?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($patients as $r): ?>
                        <tr>
                            <td><?= $r->id_patient; ?></td>
                            <td><?= $r->patient_name; ?></td>
                            <td><?= $r->patient_surname; ?></td>
                            <td><?= date("d-m-Y",strtotime($r->patient_DofB)); ?></td>
                            <td><?= $r->patient_phone; ?></td>
                            <td><?= $r->patient_email; ?></td>
                            <?php if($this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3 || $this->session->userdata('post_right')==4) :?>
                                <td class="text-center"><a href="#" onclick="openWindow('<?=site_url('/Staff_c/patientFile/'.$r->id_patient);?>','<?php echo $r->patient_name;?>','width=1000,height=700');return false" ><i class="fa fa-file-text-o fa-2x"></i></a></td>
                            <?php endif;?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <a href="<?= site_url('/Staff_c/patientOldAdmin');?>"><?= $this->lang->line('view-old-patients'); ?> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
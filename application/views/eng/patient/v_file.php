<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Your file
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
        </div>
        <!-- /.row -->

        <!-- TABLE PATIENTS -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar fa-fw"></i> <?= $this->lang->line('old-appointment'); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-hover table-striped table-bordered" id="dataTables">
                            <thead>
                            <tr>
                                <th><?= $this->lang->line('date'); ?></th>
                                <th><?= $this->lang->line('hour'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($appointments as $r): ?>
                                <tr>
                                    <td><?= date("d-m-Y",strtotime($r->appointment_date)); ?></td>
                                    <td><?= date("H:i", strtotime($r->appointment_hour_start)); ?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-heartbeat fa-fw"></i> Your dental file
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $this->lang->line('click-tooth'); ?>
                    </div>
                    <div class="col-xs-4 col-xs-offset-2">
                        <img class="jaw" src="<?= base_url();?>assets/images/systeme_de_numerotation_dentaire_universelle.jpg" usemap="#jaw" >
                        <map id="jaw" name="jaw">
                            <?php foreach($tooth_file as $r):?>
                                <area <?php if($r->tooth_extracted==1):?>
                                    data-maphilight='{"stroke":false,"fillColor":"ff0000","alwaysOn":true ,"fillOpacity":0.6}'
                                    <?php elseif(isset($job_done[$r->id_tooth]) && $job_done[$r->id_tooth] != 0): ?>
                                    data-maphilight='{"stroke":false,"fillColor":"ffff00","alwaysOn":true ,"fillOpacity":0.6}'
                                <?php endif; ?> shape="poly"  title="Tooth <?= $r->id_tooth?>" coords="<?= $r->tooth_coordinates?>" onclick="load_job_done(<?= $this->session->userdata('id_patient');?>,<?= $r->id_tooth ?>)"/>
                            <?php endforeach;?>
                        </map>
                    </div>
                    <div class="col-xs-12" id="table_job_done"></div>

                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
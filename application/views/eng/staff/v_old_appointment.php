<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Appointments
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i> Old Appointments
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
                                <th>Date</th>
                                <th>Hour</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <?php if($this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3 || $this->session->userdata('post_right')==4) :?>
                                    <th class="text-center">Patient File</th>
                                <?php endif;?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($appointments as $r): ?>
                                <tr>
                                    <td><?= date("d-m-Y",strtotime($r->appointment_date)); ?></td>
                                    <td><?= date("H:i", strtotime($r->appointment_hour_start)); ?></td>
                                    <td><?= $r->patient_surname; ?> <?= strtoupper($r->patient_name); ?></td>
                                    <td><?= $r->patient_phone; ?></td>
                                    <?php if($this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3 || $this->session->userdata('post_right')==4) :?>
                                        <td class="text-center"><a href="#" onclick="openWindow('<?=site_url('/Staff_c/patientFile/'.$r->id_patient);?>','<?php echo $r->patient_name;?>','width=1000,height=700');return false" ><i class="fa fa-file-text-o fa-2x"></i></a></td>
                                    <?php endif;?>

                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?= site_url('/Staff_c/appointment');?>">View Appointments <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>

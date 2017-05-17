<!-- #page-wrapper -->
<div id="page-wrapper">

    <!-- .row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $this->lang->line('your-account'); ?></h1>
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

    <!-- .row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p style="font-size: 1.5em"><strong><?= $this->lang->line('welcome'); ?></strong></p>
                <p style="font-size: 1em"><?= $this->lang->line('welcome-p'); ?></p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar fa-fw"></i> <?= $this->lang->line('next-appointment'); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php if($appointment!=null):?>
                        <?php foreach($appointment as $r):?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                We would remind you that an appointment must be cancel at least 48 hours before this, please to call our secretariat to cancel.
                            </div>
                            <p style="margin-left: 1.5em;"><strong><?= date("l d F Y",strtotime($r->appointment_date)) ?> at <?= date("H:i",strtotime($r->appointment_hour_start)) ?> with Dr <?= $r->staff_surname; ?> <?= $r->staff_name; ?></strong></p>
                        <?php endforeach;?>
                    <?php else :?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $this->lang->line('make-appointment'); ?> <?= $info_phone; ?>.
                        </div>
                        <?= $this->lang->line('no-appointments-patient'); ?>
                    <?php endif;?>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar fa-fw"></i> <?= $this->lang->line('five-invoices'); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php if($invoice!=null):?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?= $this->lang->line('date'); ?></th>
                                    <th><?= $this->lang->line('amount'); ?></th>
                                    <th><?= $this->lang->line('print'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($invoice as $r): ?>
                                    <tr>
                                        <td><?= $r->id_invoice; ?></td>
                                        <td><?= date("d-m-Y",strtotime($r->invoice_date)); ?></td>
                                        <td><?= $r->invoice_amount; ?></td>
                                        <td class="text-center"><a href="#" onclick="window.open('<?=site_url('/Staff_c/PDFInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>')"><i class="fa fa-2x fa-print"></i></a></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php else :?>
                        <?= $this->lang->line('no-invoices'); ?>
                    <?php endif;?>
                    <div class="text-right">
                        <a href="<?= site_url('/Patient_c/invoice');?>"><?= $this->lang->line('view-all-invoices'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa-fw fa fa-map-marker"></i> <?= $this->lang->line('address'); ?>
                </div>
                <div class="panel-body">
                    <ul style="list-style: none">
                        <li><?=$info_address; ?></li>
                        <li><?= $info_city; ?></li>
                        <li><?= $info_code; ?></li>
                        <li><?= $info_country; ?></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa-fw fa fa-info-circle"></i> <?= $this->lang->line('secretariat'); ?>
                </div>
                <div class="panel-body">
                    <ul style="list-style: none">
                        <li><strong><?= $this->lang->line('phone'); ?></strong></li>
                        <li><?= $info_phone; ?></li>
                        <li><strong><?= $this->lang->line('email'); ?></strong></li>
                        <li><?= $info_email; ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa-fw fa fa-ambulance"></i> <?= $this->lang->line('emergency'); ?>
                </div>
                <div class="panel-body" >
                    <ul style="list-style: none">
                        <li><strong><?= $this->lang->line('phone'); ?></strong></li>
                        <li><?= $info_phone_emergency; ?></li>
                        <li><strong><?= $this->lang->line('email'); ?></strong></li>
                        <li><?= $info_email_emergency; ?></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->lang->line('invoices'); ?>
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

        <!-- TABLE INVOICE -->
        <div class="text-left col-lg-4">
            <?php
            $date->modify("-24 hours");
            ?>
            <a href="<?= site_url('/Staff_c/invoicesDay/'.date_format($date, "d/m/Y"));?>"><h4><i class="fa fa-arrow-circle-left"></i> <?= date_format($date, "d/m/Y"); ?></h4></a>
        </div>
        <div class="text-center col-lg-4">
            <h4><?= date_format($date->modify("+24 hours"), "d/m/Y"); ?></h4>
        </div>
        <div class="text-right col-lg-4">
            <?php
            $date->modify("+24 hours");
            ?>
            <a href="<?= site_url('/Staff_c/invoicesDay/'.date_format($date, "d/m/Y"));?>"><h4><?= date_format($date, "d/m/Y"); ?> <i class="fa fa-arrow-circle-right"></i></h4></a>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i> <?= $this->lang->line('invoices'); ?>
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
                               <?php if($this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3 || $this->session->userdata('post_right')==4) :?>
                                <th>#</th>
                                <th><?= $this->lang->line('date'); ?></th>
                                <th><?= $this->lang->line('name'); ?></th>
                                <th><?= $this->lang->line('amount'); ?></th>
                                <th><?= $this->lang->line('paid'); ?></th>
                                <th class="text-center"><?= $this->lang->line('print'); ?></th>
                                <th class="text-center"><?= $this->lang->line('patient-file'); ?></th>
                                <th class="text-center"><?= $this->lang->line('pay'); ?></th>
                                <th class="text-center"><?= $this->lang->line('delete'); ?></th>
                                <?php endif;?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($invoices as $r): ?>
                                <tr>
                                    <td><?= $r->id_invoice; ?></td>
                                    <td><?= date("d-m-Y",strtotime($r->invoice_date)); ?></td>
                                    <td><?= $r->patient_surname; ?> <?= strtoupper($r->patient_name); ?></td>
                                    <td><?= $r->invoice_amount; ?></td>
                                    <td><?= $r->invoice_paid; ?></td>
                                    <?php if($this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3 || $this->session->userdata('post_right')==4) :?>
                                        <td class="text-center"><a href="#" onclick="window.open('<?=site_url('/Staff_c/PDFInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>')" ><i class="fa fa-print fa-2x"></i></a></td>
                                        <td class="text-center"><a href="#" onclick="openWindow('<?=site_url('/Staff_c/patientFile/'.$r->id_patient);?>','<?php echo $r->patient_name;?>','width=1000,height=700');return false" ><i class="fa fa-file-text-o fa-2x"></i></a></td>
                                        <td class="text-center"><a href="<?= site_url("Staff_c/payInvoice/".$r->id_invoice); ?>"><i class="fa fa-money fa-2x"></i></a></td>
                                        <td class="text-center"><a href="<?=site_url('/Staff_c/deleteInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>" onclick="return confirm('<?= $this->lang->line('delete-invoice'); ?>')"><i class="fa fa-trash fa-2x"></i></a></td>
                                    <?php endif;?>

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

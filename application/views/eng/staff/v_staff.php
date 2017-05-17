<!-- #page-wrapper -->
<div id="page-wrapper">

    <!-- .row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $this->lang->line('dashboard');?></h1>
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
            <!-- .panel -->
            <?php
            $date=(new \DateTime())->modify('-24 hours');
            ?>
            <a href="<?= site_url('/Staff_c/invoicesDay/'.date_format($date,"d/m/Y"));?>"><i class="fa fa-arrow-circle-left"></i> <?= $this->lang->line('yesterday-invoices'); ?></a>
            <div class="panel panel-default">
                <!-- .panel-heading -->
                <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> <?= $this->lang->line('invoices'); ?></h3>
                </div>
                <!-- /.panel-heading -->

                <!-- .panel-body -->
                <div class="panel-body">
                    <?php if($invoices==null): ?>
                        <?= $this->lang->line('no-invoices'); ?>
                    <?php else : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?= $this->lang->line('date'); ?></th>
                                        <th><?= $this->lang->line('name'); ?></th>
                                        <th><?= $this->lang->line('amount'); ?></th>
                                        <th><?= $this->lang->line('paid'); ?></th>
                                        <th><?= $this->lang->line('amount-due'); ?></th>
                                        <th><?= $this->lang->line('print'); ?></th>
                                        <th><?= $this->lang->line('pay'); ?></th>
                                        <th><?= $this->lang->line('delete'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($invoices as $r): ?>
                                    <tr>
                                        <td><?= $r->id_invoice; ?></td>
                                        <td><?= date("d-m-Y",strtotime($r->invoice_date)); ?></td>
                                        <td><?= $r->patient_surname.' '.strtoupper($r->patient_name); ?></td>
                                        <td><?= $r->invoice_amount; ?></td>
                                        <td><?= $r->invoice_paid; ?></td>
                                        <td><?= ($r->invoice_amount - $r->invoice_paid); ?></td>
                                        <td class="text-center"><a href="#" onclick="window.open('<?=site_url('/Staff_c/PDFInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>')"><i class="fa fa-2x fa-print"></i></a></td>
                                        <td class="text-center"><a href="<?= site_url("Staff_c/payInvoice/".$r->id_invoice); ?>"><i class="fa fa-money fa-2x"></i></a></td>
                                        <td class="text-center"><a href="<?=site_url('/Staff_c/deleteInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>" onclick="return confirm('<?= $this->lang->line('delete-invoice'); ?>')"><i class="fa fa-trash fa-2x"></i></a></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif;?>
                    <div class="text-right">
                        <a href="<?= site_url('/Staff_c/invoiceStaff');?>"><?= $this->lang->line('view-all-invoices'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
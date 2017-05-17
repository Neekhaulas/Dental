<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->lang->line('pay-invoice'); ?> #<?= $invoice['id_invoice']; ?>
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
                <a href="<?= site_url('/Staff_c/invoiceStaff');?>">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-reply fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $this->lang->line('back'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- .row -->

        <!-- /.row -->

        <!-- FORM -->
        <?php echo form_open('Staff_c/confirmPayInvoice') ?>
        <div class="col-xs-6 col-xs-offset-3">
            <input type="hidden" name="id_invoice" value="<?= $invoice['id_invoice']; ?>">

            <strong><?= $this->lang->line('total-due'); ?> :<br />
                <?= $invoice['invoice_amount']; ?></strong>
            <br/>
            <br/>
            <strong><?= $this->lang->line('remaining-to-pay'); ?> :<br/>
                <?= ($invoice['invoice_amount']- $invoice['invoice_paid']); ?></strong>
            <br/>
            <br/>

            <div class="form-group">
                <label for="paid" ><?= $this->lang->line('pay'); ?></label>
                <input type="number" max="<?= ($invoice['invoice_amount']- $invoice['invoice_paid']); ?>" class="form-control" name="paid" value="0">
            </div>
            <?php echo form_error('paid','<small style="color: red;"><i>',"</i></small>");?>

        </div>

        <div class="col-xs-4 col-xs-offset-3">
            <input type="submit" class="btn btn-xs btn-success" style="padding: 10px 55px;" name="sub_new" value="<?= $this->lang->line('validate'); ?>">
        </div>
        <?php echo form_close() ?>
        <div class="col-xs-6 col-xs-offset-3">
        <!-- FORM -->
            <h2 class="page-header"><?= $this->lang->line('payments-done'); ?></h2>
        <table class="table table-hover table-striped table-bordered" id="dataTables-clean">
            <thead>
            <tr>
                <th><?= $this->lang->line('date-of-payment'); ?></th>
                <th><?= $this->lang->line('amount'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($payment_history as $r): ?>
                <tr>
                    <td><?= $r->payment_date; ?></td>
                    <td><?= $r->payment_amount; ?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
            </div>
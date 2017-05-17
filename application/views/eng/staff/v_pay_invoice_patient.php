

        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- .row -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        <?= $patient_surname ?> <?= strtoupper($patient_name); ?>
                    </h1>

                </div>
            </div>

            <!-- Page Heading -->

            <!-- .row -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        <?= $this->lang->line('pay-invoice'); ?> <?= $this->lang->line('invoice'); ?> #<?= $invoice["id_invoice"]; ?>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <!-- FORM -->
            <?php echo form_open('Staff_c/confirmPayInvoicePatient') ?>
            <div class="col-xs-6 col-xs-offset-3">
                <input type="hidden" name="id_invoice" value="<?= $invoice['id_invoice']; ?>">
                <input type="hidden" name="id_patient" value="<?= $patient['id_patient']; ?>">

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
            <div class="col-xs-3">
                <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient);?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new"><?= $this->lang->line('cancel'); ?></a>
            </div>
            <?php echo form_close() ?>
            <!-- FORM -->
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
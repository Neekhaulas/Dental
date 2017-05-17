<div class="container-fluid">

    <!-- Page Heading -->

    <!-- .row -->
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                <?= $patient_surname ?> <?= strtoupper($patient_name); ?>

            </h1>

        </div>

        <div class="col-xs-10 col-xs-offset-1">
            <h2 class="page-header"><?= $this->lang->line('edit-invoice'); ?> n° <?= $invoice['id_invoice']; ?></h2>
                <form method="post" action="">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><input type="checkbox" onClick="checkAll(this,'Job_done[]')" /></th>
                            <th><?= $this->lang->line('treatment'); ?></th>
                            <th><?= $this->lang->line('date'); ?></th>
                            <th><?= $this->lang->line('price-excl'); ?></th>
                            <th><?= $this->lang->line('price-incl'); ?></th>
                            <th><?= $this->lang->line('vat'); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($job as $r) :?>
                            <tr>
                                <td><input type="checkbox" class="JobDone" name="Job_done[]" value="<?= $r->id_job_done?>" <?php if($r->id_invoice==$invoice['id_invoice']) echo 'checked';?> /></td>
                                <td><?= $r->treatment_name; ?></td>
                                <td><?= date("d-m-Y",strtotime($r->appointment_date)); ?></td>
                                <td><?= $r->job_price_incl_tax; ?></td>
                                <td><?php  $vat=100/(100+$r->job_vat);
                                    $price_excl_tax=$vat*$r->job_price_incl_tax;
                                    echo round($price_excl_tax,2);?></td>
                                <td><?= $r->job_vat ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="col-xs-12 col-xs-offset-3" >
                        <div id="error"><br></div>
                        <button class="btn btn-xs btn-success"  onclick="edit_invoice(<?= $invoice['id_invoice']; ?>,<?= $id_patient; ?>);return false;" style="padding: 10px 55px;margin-right:9.7em; " >Validate</button>
                        <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient.'/#invoice');?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new">Cancel</a>
                    </div>
                </form>
        </div>
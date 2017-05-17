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
            <h2 class="page-header"><?= $this->lang->line('generate-invoice'); ?></h2>
            <?php if($job==null):?>
                <div class="alert alert-warning"><?= $this->lang->line('no-job-billable'); ?></div>

                <div class="col-xs-4 col-xs-offset-4">
                    <br>
                    <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient.'/#invoice');?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new"><?= $this->lang->line('cancel'); ?></a>
                </div>
            <?php else: ?>
                <form method="post" action="<?=site_url('/Staff_c/addNewInvoice/'.$id_patient)?>">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" onClick="checkAll(this,'Job[]')" /></th>
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
                                <td><input type="checkbox" name="Job[]" value="<?= $r->id_job_done?>"/></td>
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
                    <?php
                    if(isset($error)){
                        echo "<span style='color: red;'>".$error."</span>";
                    }
                    ?>
                    <div class="col-xs-12 col-xs-offset-3" >
                        <input type="submit" class="btn btn-xs btn-success" style="padding: 10px 55px;margin-right:9.7em; " name="sub_new" value="<?= $this->lang->line('validate'); ?>">
                        <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient.'/#invoice');?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new"><?= $this->lang->line('cancel'); ?></a>
                    </div>
                </form>
            <?php endif;?>
        </div>
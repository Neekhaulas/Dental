
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
    <!-- /.row -->

    <!-- FORM -->

<form method="post" action="<?= site_url('Staff_c/confirmAddNewJobDone')?>" oninput="job_price_excl_tax.value=((100/(100+vat.valueAsNumber))*price.valueAsNumber).toFixed(2)">
    <div class="col-xs-6 col-xs-offset-3">

        <?php if($appointment==null && $today==null):?>
            <div class="alert alert-warning"><?= $this->lang->line('no-appointment-elligible'); ?></div>

            <div class="col-xs-4 col-xs-offset-4">
                <br>
                <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient);?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new"><?= $this->lang->line('cancel'); ?></a>
            </div>
        <?php else: ?>
            <h2 class="page-header">Tooth <?= $id_tooth." - <br>".$tooth_area." ".$tooth_name; ?></h2>

            <input type="hidden" name="id_tooth" value="<?= $id_tooth; ?>">
            <input type="hidden" name="id_patient" value="<?= $id_patient; ?>">


            <div class="form-group">
                <label><?= $this->lang->line('appointment'); ?></label>
                <select class="form-control" name="appointment_job">
                    <?php if($today !== null) : ?>
                        <!-- TODO -->
                        <?php foreach ($today as $key=>$value) : ?>
                        <optgroup label="Today">
                            <option value="<?php echo $key; ?>" <?php if($key==set_value('appointment_job')) echo 'selected'; ?>>
                                <?= $value ?>
                            </option>
                        </optgroup>
                        <?php endforeach; ?>
                    <?php endif;?>

                    <?php if($appointment!== null):?>
                        <optgroup label="Old appointments">
                            <?php foreach ($appointment as $key=>$value) : ?>
                                <option value="<?php echo $key; ?>" <?php if($key==set_value('appointment_job')) echo 'selected'; ?>>
                                    <?= $value ?>

                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endif;?>

                </select>
                <?php echo form_error('appointment_job','<small style="color: red;"><i>',"</i></small>");?>

                <br>
            <div class="form-group">
                <label><?= $this->lang->line('treatment'); ?></label>
                <select class="form-control" name="treatment_job">
                    <?php foreach ($treatments as $key=>$value) : ?>
                        <option value="<?php echo $key; ?>" <?php if($key==set_value('treatment_job')) echo 'selected'; ?>>
                            <?= $value ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('treatment_job','<small style="color: red;"><i>',"</i></small>");?>

                <br>
                <div class="form-group">
                    <label><?= $this->lang->line('information'); ?></label>
                    <textarea class="form-control" name="job_info" rows="3"></textarea>
                </div>

                <br>
                <input type="checkbox" name="job_completed" id="job_completed" value="1" <?php if(set_value('job_completed')==1) echo 'checked' ;?> onchange="priceTreatment();"> <?= $this->lang->line('complete'); ?><br>
                <br>


                    <input type="number" name="vat" id="vat" value="<?= $vat->rate ?>" style="display: none;">


</div>
        <div class="col-xs-12">
            <input type="submit" class="btn btn-xs btn-success" style="padding: 10px 55px;margin-right: 9.7em" name="sub_new" value="<?= $this->lang->line('validate'); ?>">

            <a href="<?= site_url('/Staff_c/newTreatment/'.$id_patient);?>" class="btn btn-xs btn-info" style="padding: 10px 55px;" name="sub_new"><?= $this->lang->line('back'); ?></a>
        </div>
</form>

        <!-- FORM -->
    <?php endif;?>

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

    <form method="post" action="<?= site_url('Staff_c/confirmEditJobDone')?>" oninput="job_price_excl_tax.value=((100/(100+vat.valueAsNumber))*price.valueAsNumber).toFixed(2)">
        <div class="col-xs-6 col-xs-offset-3">

            <?php if($appointment==null && $today==null):?>
                <div class="alert alert-warning"><?= $this->lang->line('no-appointment-elligible'); ?></div>

                <div class="col-xs-4 col-xs-offset-4">
                    <br>
                    <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient);?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new">Cancel</a>
                </div>
            <?php else: ?>
            <h2 class="page-header"><?= $this->lang->line('tooth'); ?> <?= $id_tooth." - <br>".$tooth_area." ".$tooth_name; ?></h2>

            <input type="hidden" name="id_job_done" value="<?= $job_done['id_job_done'] ?>">
            <input type="hidden" name="id_tooth" value="<?= $id_tooth; ?>">
            <input type="hidden" name="id_patient" value="<?= $id_patient; ?>">


            <div class="form-group">
                <label><?= $this->lang->line('appointment'); ?></label>
                <!--TODO -->
                <select class="form-control" name="appointment_job">
                    <?php if($today !== null) : ?>
                        <?php foreach ($today as $key=>$value) : ?>
                            <optgroup label="Today">
                                <option value="<?php echo $key; ?>" <?php if($key==$job_done['id_appointment']) echo 'selected'; ?>>
                                    <?= $value ?>
                                </option>
                            </optgroup>
                        <?php endforeach; ?>
                    <?php endif;?>
                    <optgroup label="Old appointments">
                        <?php foreach ($appointment as $key=>$value) : ?>
                            <option value="<?php echo $key; ?>" <?php if($key==$job_done['id_appointment']) echo 'selected'; ?>>
                                <?= $value ?>
                            </option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
                <?php echo form_error('appointment_job','<small style="color: red;"><i>',"</i></small>");?>

                <br>
                <div class="form-group">
                    <label><?= $this->lang->line('treatment'); ?></label>
                    <select class="form-control" name="treatment_job">
                        <?php foreach ($treatments as $key=>$value) : ?>
                            <option value="<?php echo $key; ?>" <?php if($key==$job_done['id_treatment']) echo 'selected'; ?>>
                                <?= $value ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('treatment_job','<small style="color: red;"><i>',"</i></small>");?>

                    <br>
                    <div class="form-group">
                        <label><?= $this->lang->line('information'); ?></label>
                        <textarea class="form-control" name="job_info" rows="3"><?= $job_done['job_info']; ?></textarea>
                    </div>

                    <br>
                    <input type="checkbox" name="job_completed" id="job_completed" value="1" <?php if(set_value('job_completed',$job_done['job_complete'])==1) echo 'checked' ;?> onchange="priceTreatment();"> <?= $this->lang->line('complete'); ?><br>
                    <br>
    </form>
</div>
</div>

<div class="col-xs-12">
    <input type="submit" class="btn btn-xs btn-success" style="padding: 10px 55px;margin-right:9.7em; " name="sub_new" value="<?= $this->lang->line('validate'); ?>">
        <a href="<?= site_url('/Staff_c/patientFile/'.$id_patient.'/#jobs');?>" class="btn btn-xs btn-danger" style="padding: 10px 55px;" name="sub_new">Cancel</a>
</div>

</form>


    <!-- FORM -->
<?php endif;?>
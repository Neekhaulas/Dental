<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->lang->line('settings'); ?>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= $this->lang->line('settings'); ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#information" data-toggle="tab"><?= $this->lang->line('information'); ?></a>
                            </li>
                            <li><a href="#times" data-toggle="tab"><?= $this->lang->line('opening-times'); ?></a>
                            </li>
                            <li><a href="#treatment" data-toggle="tab"><?= $this->lang->line('treatments'); ?></a>
                            </li>
                            <li><a href="#vat" data-toggle="tab"><?= $this->lang->line('vat'); ?></a>
                            </li>
                            <li><a href="#backup" data-toggle="tab"><?= $this->lang->line('backup'); ?></a>
                            </li>
                            <?php if($this->session->userdata('post_right')==1):?>
                                <li><a href="#staff" data-toggle="tab"><?= $this->lang->line('staff'); ?></a>
                                </li>
                            <?php endif;?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <!-- INFORMATION -->
                            <div class="tab-pane fade in active" id="information">
                                <div class="col-lg-12">
                                    <?php echo form_open('Staff_c/confirmEditInformation')?>
                                    <div class="col-lg-4">
                                        <h2 class="page-header"><?= $this->lang->line('address'); ?></h2>

                                        <div class="form-group">
                                            <label for="address_info"><?= $this->lang->line('address'); ?></label>
                                            <input type="text" class="form-control" name="address_info" value="<?= set_value('address_info',$info_address);?>">
                                        </div>
                                        <?php echo form_error('address_info','<small style="color: red;"><i>',"</i></small>");?>

                                        <div class="form-group">
                                            <label for=city_info"><?= $this->lang->line('city'); ?></label>
                                            <input type="text" class="form-control" name="city_info" value="<?= set_value('city_info',$info_city);?>">
                                        </div>
                                        <?php echo form_error('city_info','<small style="color: red;"><i>',"</i></small>");?>

                                        <div class="form-group">
                                            <label for=code_info"><?= $this->lang->line('postcode'); ?></label>
                                            <input type="text" class="form-control" name="code_info" value="<?= set_value('code_info',$info_code);?>">
                                        </div>
                                        <?php echo form_error('code_info','<small style="color: red;"><i>',"</i></small>");?>

                                        <div class="form-group">
                                            <label for=country_info"><?= $this->lang->line('country'); ?></label>
                                            <input type="text" class="form-control" name="country_info" value="<?= set_value('country_info',$info_country);?>">
                                        </div>
                                        <?php echo form_error('country_info','<small style="color: red;"><i>',"</i></small>");?>
                                    </div>

                                    <div class="col-lg-4">
                                        <h2 class="page-header"><?= $this->lang->line('phone'); ?></h2>

                                        <div class="form-group">
                                            <label for="phone_info"><?= $this->lang->line('information'); ?></label>
                                            <input type="text" class="form-control" name="phone_info" value="<?= set_value('phone_info',$info_phone);?>">
                                        </div>
                                        <?php echo form_error('phone_info','<small style="color: red;"><i>',"</i></small>");?>

                                        <div class="form-group">
                                            <label for="phone_emergency_info"><?= $this->lang->line('emergency'); ?></label>
                                            <input type="text" class="form-control" name="phone_emergency_info" value="<?= set_value('phone_emergency_info',$info_phone_emergency);?>">
                                        </div>
                                        <?php echo form_error('phone_emergency_info','<small style="color: red;"><i>',"</i></small>");?>
                                    </div>
                                    <div class="col-lg-4">

                                        <h2 class="page-header"><?= $this->lang->line('email'); ?></h2>

                                        <div class="form-group">
                                            <label for="email_info"><?= $this->lang->line('information'); ?></label>
                                            <input type="text" class="form-control" name="email_info" value="<?= set_value('email_info',$info_email);?>">
                                        </div>
                                        <?php echo form_error('email_info','<small style="color: red;"><i>',"</i></small>");?>

                                        <div class="form-group">
                                            <label for="email_emergency_info"><?= $this->lang->line('emergency'); ?></label>
                                            <input type="text" class="form-control" name="email_emergency_info" value="<?= set_value('email_emergency_info',$info_email_emergency);?>">
                                        </div>
                                        <?php echo form_error('email_emergency_info','<small style="color: red;"><i>',"</i></small>");?>
                                    </div>

                                    <div class="col-lg-5 col-lg-offset-5">

                                        <input type="submit" class="btn btn-lg btn-success" style="padding: 10px 55px;" name="sub_new" value="<?= $this->lang->line('validate'); ?>">
                                        <br><br>
                                    </div>
                                    <?php echo form_close()?>

                                </div>
                            </div>

                            <!-- OPENING HOURS -->
                            <div class="tab-pane fade" id="times">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <br>
                                    <?php echo form_open('Staff_c/confirmEditOpening');?>
                                    <h2 class="page-header">Schedule</h2>

                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php foreach($day as $r) :?>
                                                <tr>
                                                    <th><?= $this->lang->line('cal_'.$r->day);?></th>
                                                    <th><input type="time" class="form-control" min="01:00" max="12:59" name="beginning_<?= $r->id_day?>" value="<?= set_value('beginning_'.$r->day,$r->beginning_day) ?>"></th>
                                                    <th><select name="beginning<?= $r->id_day?>" class="form-control">
                                                            <option value="am" <?php if($r->beginning=="am")echo 'selected' ?>>AM</option>
                                                            <option value="pm" <?php if($r->beginning=="pm")echo 'selected' ?>>PM</option>
                                                        </select></th>
                                                    <th><input type="time" min="01:00" max="12:59" class="form-control" name="end_<?= $r->id_day?>" value="<?= set_value('end_'.$r->day,$r->end_day) ?>"></th>
                                                    <th><select class="form-control" name="end<?= $r->id_day?>">
                                                            <option value="am" <?php if($r->end=="am")echo 'selected' ?>>AM</option>
                                                            <option value="pm" <?php if($r->end=="pm")echo 'selected' ?>>PM</option>
                                                        </select></th>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <small><i><strong>N.B : </strong>if close do not write schedule</i></small>

                                    <div class="col-lg-5 col-lg-offset-4">

                                        <input type="submit" class="btn btn-lg btn-success" style="padding: 10px 55px;" name="sub_new" value="<?= $this->lang->line('validate'); ?>">
                                        <br><br>
                                    </div>
                                    <?php echo form_close();?>


                                </div>
                            </div>

                            <!-- TREATMENTS -->
                            <div class="tab-pane fade" id="treatment">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="pull-right">
                                        <div class="btn-group tooltip_action">
                                            <a href="<?=site_url('Staff_c/newTreatmentStaff');?>"><button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('add-new-treatment'); ?>">
                                                    <i class="fa fa-4x fa-plus" style="padding: 0.33em;"></i>
                                                </button></a>
                                        </div>
                                    </div>
                                    <h2 class="page-header"><?= $this->lang->line('treatments'); ?></h2>
                                    <div class="dataTable_wrapper" >

                                        <table class="table table-bordered" id="dataTables-clean">
                                            <thead>
                                            <tr>
                                                <th><?= $this->lang->line('treatment'); ?></th>
                                                <th><?= $this->lang->line('price'); ?></th>
                                                <th><?= $this->lang->line('edit'); ?></th>
                                                <th><?= $this->lang->line('delete'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($treatment as $r) :?>
                                                <tr>
                                                    <td><?= $r->treatment_name ?></td>
                                                    <td><?= $r->treatment_price ?></td>
                                                    <td class="text-center"><a href="<?=site_url('/Staff_c/editTreatmentStaff/'.$r->id_treatment);?>"><i class="fa fa-2x fa-pencil"></i></a></td>
                                                    <td class="text-center"><a href="<?=site_url('/Staff_c/deleteTreatment/'.$r->id_treatment);?>" onclick="return confirm('<?= $this->lang->line('delete-treatment'); ?>');"><i style="color: red;" class="fa fa-2x fa-times"></i></a></td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- VAT -->
                            <div class="tab-pane fade" id="vat">
                                <div class="col-lg-4 col-lg-offset-4">
                                    <h2 class="page-header"><?= $this->lang->line('vat'); ?></h2>
                                    <?= form_open('Staff_c/confirmEditVAT');?>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="vat" value="<?= set_value('vat',$vat->rate) ?>">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                </div>
                                <div class="col-lg-4 col-lg-offset-5">
                                    <input type="submit" class="btn btn-lg btn-success" style="padding: 10px 55px;" value="<?= $this->lang->line('validate'); ?>">
                                    <br><br>
                                </div>

                                <?= form_close(); ?>
                            </div>

                            <!-- BACKUP -->
                            <div class="tab-pane fade" id="backup">
                                <div class="col-lg-4 col-lg-offset-4">
                                    <h2 class="page-header"><?= $this->lang->line('backup-title'); ?></h2>
                                </div>
                                <div class="col-lg-4 col-lg-offset-5">
                                    <a href="<?=site_url('Staff_c/backupDatabase');?>"><button class="btn btn-lg btn-success" style="padding: 10px 55px;"><?= $this->lang->line('validate'); ?></button></a>
                                    <br><br>
                                </div>

                                <div class="col-lg-4 col-lg-offset-4">
                                    <h2 class="page-header"><?= $this->lang->line('backup-import'); ?></h2>
                                </div>
                            </div>

                            <!-- STAFF -->
                            <?php if($this->session->userdata('post_right')==1):?>
                                <div class="tab-pane fade" id="staff">
                                    <div class="col-lg-12">
                                        <div class="pull-right">
                                            <div class="btn-group tooltip_action">
                                                <a href="<?=site_url('Staff_c/newEmployee');?>"><button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('add-new-employee'); ?>">
                                                        <i class="fa fa-4x fa-user-plus" style="padding: 0.33em;"></i>
                                                    </button></a>
                                            </div>
                                        </div>

                                        <h2 class="page-header">Staff</h2>

                                        <div class="dataTable_wrapper" >
                                            <table class="table table-bordered" id="dataTables-clean">
                                                <thead>
                                                <th><?= $this->lang->line('surname'); ?></th>
                                                <th><?= $this->lang->line('first-name'); ?></th>
                                                <th><?= $this->lang->line('into-the-firm'); ?></th>
                                                <th><?= $this->lang->line('post'); ?></th>
                                                <th><?= $this->lang->line('phone'); ?></th>
                                                <th><?= $this->lang->line('email'); ?></th>
                                                <th><?= $this->lang->line('file'); ?></th>
                                                </thead>
                                                <tbody>
                                                <?php foreach($staff as $r) :?>
                                                    <tr>
                                                        <td><?= $r->staff_name ?></td>
                                                        <td><?= $r->staff_surname ?></td>
                                                        <td><?php if($r->staff_fire==1){echo "No";}elseif($r->staff_fire==0){echo "Yes";} ?></td>
                                                        <td><?= $r->post_name ?></td>
                                                        <td><?= $r->staff_phone ?></td>
                                                        <td><?= $r->staff_email ?></td>
                                                        <td class="text-center"><a href="<?=site_url('/Staff_c/staffFile/'.$r->id_staff);?>"><i class="fa fa-2x fa-file-text-o"></i></a></td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

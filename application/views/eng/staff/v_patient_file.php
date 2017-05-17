<div class="container-fluid">

    <div class="row">
        <div class="col-xs-10">
            <div class="panel panel-primary" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">#<?= $id_patient;?></h3>
                </div>
                <div class="panel-body">
                   <div class="text-center" style="font-size: 2rem"><?= $this->lang->line('surname'); ?> : <strong><?= strtoupper($patient_name);?></strong>  <?= $this->lang->line('first-name'); ?> : <strong><?= $patient_surname; ?></strong></div>
                </div>
            </div>
        </div>
        <a href="#" class="col-xs-2 btn btn-danger btn-lg" onclick="window.close();"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</a>

        <!-- INFORMATION -->
        <div class="col-xs-12" id="inforamations">
                <div class="panel panel-info" style="box-shadow: 3px 3px 2px lightgray;">
                    <div class="panel-heading">
                        <?= $this->lang->line('information'); ?>
                        <?php if($old_patient==0): ?>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-fw fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="<?= site_url('/Staff_c/editPatient/'.$id_patient);?>"><?= $this->lang->line('edit'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <div class="col-sm-4">
                                <li style="list-style-type: none"><?= $this->lang->line('gender'); ?> : </li>
                                <li style="list-style-type: none"><strong><?= $gender; ?></strong></li>
                                <br>
                                <li style="list-style-type: none"><?= $this->lang->line('date-of-birth'); ?> : </li>
                                <li style="list-style-type: none"><strong><?= date("d-m-Y",strtotime($patient_DofB)); ?></strong></li>
                            </div>
                            <div class="col-sm-4">
                                <li style="list-style-type: none"><?= $this->lang->line('phone'); ?> : </li>
                                <li style="list-style-type: none"><strong><?= $patient_phone; ?></strong></li>
                                <br>
                                <li style="list-style-type: none"><?= $this->lang->line('email'); ?> : </li>
                                <li style="list-style-type: none"><strong><?= $patient_email; ?></strong></li>
                            </div>

                            <div class="col-sm-4">
                                <li style="list-style-type: none"><?= $this->lang->line('address'); ?> : </li>
                                <li style="list-style-type: none"><strong><?= $patient_address; ?></strong></li>
                                <li style="list-style-type: none"><strong><?= $patient_code; ?></strong></li>
                                <li style="list-style-type: none"><strong><?= $patient_city; ?></strong></li>
                                <li style="list-style-type: none"><strong><?= $patient_country; ?></strong></li>
                            </div>
                        </ul>
                    </div>
                </div>
        </div>

        <!-- LOGIN -->
        <div class="col-xs-5" id="login">
            <div class="panel panel-info" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading">
                    <?= $this->lang->line('login'); ?>
                    <?php if($old_patient==0): ?>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="<?= site_url('/Staff_c/editLogPatient/'.$id_patient);?>" ><?= $this->lang->line('change-username'); ?></a></li>
                                    <li><a href="<?= site_url('/Staff_c/editPasswordPatient/'.$id_patient);?>"><?= $this->lang->line('change-password'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="panel-body">
                    <ul>
                            <li style="list-style-type: none"><?= $this->lang->line('username'); ?> : </li>
                            <li style="list-style-type: none"><strong><?= $patient_login; ?></strong></li>
                            <br><br>
                            <li style="list-style-type: none"><?= $this->lang->line('password'); ?> : </li>
                            <li style="list-style-type: none; padding-bottom: 1.3px;"><strong>•••••</strong></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ALLERGIES -->
        <div class="col-xs-7" id="allergies" >
            <div class="panel panel-danger" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading">
                    <?= $this->lang->line('allergies'); ?>

                </div>
                <div class="panel-body" style="padding-left: 4em;">
                    <?php if($patient_allergies!=null):?>
                            <strong><?=$patient_allergies; ?></strong>
                    <?php else :?>
                            <?= $this->lang->line('nothing-to-report'); ?>
                    <?php endif;?>


                </div>
            </div>
        </div>

        <!-- NEXT APPOINTMENT -->
        <div class="col-xs-7" id="next_appointment">
            <div class="panel panel-info" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading">
                    <?= $this->lang->line('next-appointment'); ?>
                </div>
                <div class="panel-body" style="padding-left: 4em;">
                    <?php if($appointment!=null):?>
                        <?php foreach($appointment as $r):?>
                            <strong><?= date("l d F Y",strtotime($r->appointment_date)) ?> at <?= date("H:i",strtotime($r->appointment_hour_start)) ?></strong>
                        <?php endforeach;?>
                    <?php else :?>
                        <?= $this->lang->line('no-next-appointment'); ?>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <!-- JOB -->
        <div class="col-xs-12" id="job">
            <div class="panel panel-info" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading">
                    <?= $this->lang->line('teeth'); ?>
                    <?php if($old_patient==0): ?>
                        <div class="pull-right">
                            <div class="btn-group tooltip_action">
                                <a href="<?= site_url('/Staff_c/newTreatment/'.$id_patient);?>"><button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('add-new-treatment'); ?>">
                                    <i class="fa fa-fw fa-plus-circle"></i>
                                </button></a>
                            </div>
                        </div>
                    <?php endif;?>

                </div>
                <div class="panel-body">
                    <div class="col-xs-6">
                        <img class="jaw" src="<?= base_url();?>assets/images/systeme_de_numerotation_dentaire_universelle.jpg" usemap="#jaw" >
                        <map id="jaw" name="jaw">
                            <?php foreach($tooth_file as $r):?>
                                <area <?php if($r->tooth_extracted==1):?>
                                    data-maphilight='{"stroke":false,"fillColor":"ff0000","alwaysOn":true ,"fillOpacity":0.6}'
                                    <?php elseif(isset($job_done[$r->id_tooth]) && $job_done[$r->id_tooth] != 0): ?>
                                    data-maphilight='{"stroke":false,"fillColor":"ffff00","alwaysOn":true ,"fillOpacity":0.6}'
                                <?php endif; ?> shape="poly"  title="Tooth <?= $r->id_tooth?>" coords="<?= $r->tooth_coordinates?>" onclick="load_job_done(<?= $id_patient?>,<?= $r->id_tooth ?>)"/>
                            <?php endforeach;?>
                        </map>
                    </div>

                    <div class="col-xs-6">
                        <div class="btn-group-xs">
                            <button class="btn btn-default btn-xs" onclick="load_unfinished_job('<?= $id_patient;?>');"><?= $this->lang->line('unfinished-jobs'); ?></button>
                            <button class="btn btn-default btn-xs" onclick="load_all_jobs('<?= $id_patient;?>');"><?= $this->lang->line('all-jobs'); ?></button>
                        </div>
                        <br>
                        <div id="table_job_done"></div>
                    </div>

                </div>
            </div>
        </div>

        <!-- RADIO -->
        <div class="col-xs-12" id="radio" >
            <div class="panel panel-info" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading">
                    <?= $this->lang->line('radio'); ?>
                    <div class="btn-group tooltip_action">
                        <a href="<?= site_url('/Staff_c/negatoscope/'); ?>"><button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="right">
                                <?= $this->lang->line('negatoscope'); ?>
                            </button></a>
                    </div>
                    <?php if($old_patient==0): ?>
                        <div class="pull-right">
                            <div class="btn-group tooltip_action">
                                <a href="<?= site_url('/Staff_c/addRadio/'.$id_patient);?>"><button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('add-new-radio'); ?>">
                                        <i class="fa fa-fw fa-plus-circle"></i>
                                    </button></a>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="panel-body">
                    <?php if($radios==null) :?>
                        <?= $this->lang->line('no-radio'); ?>
                    <?php else :?>
                        <div class="col-xs-offset-1">
                            <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 810px; height: 300px; background: #000; overflow: hidden; ">
                                <!-- Slides Container -->
                                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;overflow: hidden;">
                                    <?php foreach($radios as $r): ?>
                                        <div>
                                            <img u="image" src="<?= base_url();?>radio/<?= $r->patient_surname;?>_<?= $r->patient_name;?>/<?= $r->radio_img;?>" data-toggle="modal" data-target="#myModal_<?= $r->id_radio ;?>"/>
                                            <div u="thumb">
                                                <img class="i" src="<?= base_url();?>radio/<?= $r->patient_surname;?>_<?= $r->patient_name;?>/<?= $r->radio_img;?>" /><div class="t"><?= $r->radio_name ;?></div>
                                                <div class="c"><?= $r->radio_caption;?></div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>

                                <div u="thumbnavigator" class="jssort11" style="left: 605px; top:0px;">
                                    <!-- Thumbnail Item Skin Begin -->
                                    <div u="slides" style="cursor: default;">
                                        <div u="prototype" class="p" style="top: 0; left: 0;">
                                            <div u="thumbnailtemplate" class="tp"></div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Item Skin End -->
                                </div>
                                <!--#endregion ThumbnailNavigator Skin End -->
                            </div>
                        </div>

                        <?php foreach($radios as $r): ?>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal_<?= $r->id_radio; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?= $r->radio_name;?></h4>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="<?= base_url();?>radio/<?= $r->patient_surname;?>_<?= $r->patient_name;?>/<?= $r->radio_img;?>" style="max-width: 750px;"> <br>
                                            <?php if($r->radio_caption!="") :?>
                                                <br><strong><?= $this->lang->line('comment'); ?> :</strong><br>
                                                <?= $r->radio_caption;?>
                                            <?php endif;?>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                                <a  href="<?= site_url('/Staff_c/deleteRadio/'.$r->id_radio.'/'.$r->id_patient);?>" onclick="return confirm('<?= $this->lang->line('delete-radio'); ?>')"><button type="button" class="btn btn-danger left-align"><?= $this->lang->line('delete'); ?></button></a>
                                            </div>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('close'); ?></button>

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <!-- INVOICE -->
        <div class="col-xs-12" id="invoice">
            <div class="panel panel-info" style="box-shadow: 3px 3px 2px lightgray;">
                <div class="panel-heading">
                    <?= $this->lang->line('invoices'); ?>
                    <?php if($old_patient==0): ?>
                        <div class="pull-right">
                            <div class="btn-group tooltip_action">
                                <a href="<?= site_url('/Staff_c/generateNewInvoice/'.$id_patient);?>"><button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('generate-invoice'); ?>">
                                        <i class="fa fa-fw fa-plus-circle"></i>
                                    </button></a>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="panel-body">
                    <?php if($invoices==null) :?>
                        <?= $this->lang->line('no-invoices'); ?>
                    <?php else :?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?= $this->lang->line('date'); ?></th>
                                    <th><?= $this->lang->line('amount'); ?></th>
                                    <th><?= $this->lang->line('paid'); ?></th>
                                    <th class="text-center"><?= $this->lang->line('print'); ?></th>
                                    <th class="text-center"><?= $this->lang->line('edit'); ?></th>
                                    <th class="text-center"><?= $this->lang->line('pay'); ?></th>
                                    <th class="text-center"><?= $this->lang->line('delete'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($invoices as $r): ?>
                                    <tr>
                                        <td><?= $r->id_invoice; ?></td>
                                        <td><?= date("d-m-Y",strtotime($r->invoice_date)); ?></td>
                                        <td><?= $r->invoice_amount; ?></td>
                                        <td><?= $r->invoice_paid; ?></td>
                                        <td class="text-center"><a href="#" onclick="window.open('<?=site_url('/Staff_c/PDFInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>')" ><i class="fa fa-print fa-2x"></i></a></td>
                                        <td class="text-center"><a href="<?=site_url('/Staff_c/editInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>" ><i class="fa fa-pencil fa-2x"></i></a></td>
                                        <td class="text-center"><a href="<?= site_url("Staff_c/payInvoicePatient/".$r->id_patient."/".$r->id_invoice); ?>"><i class="fa fa-money fa-2x"></i></a></td>
                                        <td class="text-center"><a href="<?=site_url('/Staff_c/deleteInvoice/'.$r->id_invoice.'/'.$r->id_patient);?>" onclick="return confirm('<?= $this->lang->line('delete-invoice'); ?>')"><i class="fa fa-trash fa-2x"></i></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <!-- REMOVE -->
        <?php if($old_patient==0 && $this->session->userdata('post_right')==1 || $this->session->userdata('post_right')==2 || $this->session->userdata('post_right')==3) :?>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="panel text-center" style="background-color: background-color: #d9534f;background-color: #d9534f;">
                    <a href="<?= site_url('/Staff_c/removePatient/'.$id_patient);?>" style="color: #ffffff;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $this->lang->line('remove'); ?></h3>
                    </div></a>
                </div>
            </div>
        <?php endif;?>
    </div>

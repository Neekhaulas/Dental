<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->lang->line('appointments'); ?>
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

        <div class="col-lg-3" id="datepicker"></div>
        <style>
            #calendar {
                max-width: 900px;
                margin: 0 auto;
            }

            #event_edit_container label {
                display: block;
                margin-top: 1em;
                margin-bottom: 0.5em;
            }

            form ul {
                padding: 0.3em;
            }

            select, input[type='text'], textarea {
                width: 250px;
                padding: 3px;
            }

            input[type='text'] {
                width: 245px;
            }

            .no-close .ui-dialog-titlebar-close {
                display: none;
            }


            .no-close ul.formatted,ol.formatted {
                display: block;
                margin: 1em 0.5em;
            }

            .no-close ul.formatted li,ol.formatted li {
                margin: 5px 30px;
                display: auto;
            }

            .no-close li {
                list-style-type:none;
                margin: 0.4em;
            }


        </style>
        <div class="col-lg-9">
            <div id='calendar'></div>
        </div>

        <div id="dialog_new" title="New event">
            <form>
                <input type="hidden" />
                <ul>
                    <li>
                        <span>Date: </span><span class="date_holder"></span>
                    </li>
                    <li>
                        <label for="patient">Patient: </label><select name="patient"><option value="0">Select Patient</option></select>
                    </li>
                    <li>
                        <label for="emergency">Emergency: </label><input type="checkbox" name="emergency"/>
                    </li>
                    <li>
                        <label for="body">Informations: </label><textarea name="informations"></textarea>
                    </li>
                </ul>
            </form>
        </div>
        <div id="dialog_see" title="See event">
            <form>
                <input type="hidden" />
                <ul>
                    <li>
                        <span>Date: </span><span class="date_holder"></span>
                    </li>
                    <li>
                        <span>Patient: </span><span class="patient_holder"></span>
                    </li>
                    <li>
                        <span>Emergency: </span><span class="emergency_holder"></span>
                    </li>
                    <li>
                        <label for="body">Informations: </label><textarea name="informations"></textarea>
                    </li>
                </ul>
            </form>
        </div>
        <!-- /.panel-body -->
    </div>
    <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo base_url();?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" />
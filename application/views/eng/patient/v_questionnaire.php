<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->lang->line('survey'); ?>
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
                <a href="<?= site_url('/Patient_c/');?>">
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

        <?php $id_survey= (isset($id_survey)) ? $id_survey : NULL;

        if($id_survey!=null): ?>
            <h1><?= $this->lang->line('thank-participation'); ?></h1>
        <?php else: ?>
            <!-- FORM -->
            <?php echo form_open('Patient_c/confirmSurvey') ?>
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 1
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                            <label><?= $this->lang->line('question-0'); ?></label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="first_survey" id="first_survey1" value="friend"><?= $this->lang->line('friend'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="first_survey" id="first_survey2" value="family"><?= $this->lang->line('family'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="first_survey" id="first_survey3" value="internet"><?= $this->lang->line('internet'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="first_survey" id="first_survey3" value="advertisement"><?= $this->lang->line('advertisement'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="first_survey" id="first_survey4" value="other"><?= $this->lang->line('other'); ?>
                            </label>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php echo form_error('first_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                         </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 2
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?= $this->lang->line('question-1'); ?></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="second_survey" id="second_survey1" value="phone"><?= $this->lang->line('phone'); ?>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="second_survey" id="second_survey2" value="family"><?= $this->lang->line('into-dental-office'); ?>
                                    </label>
                                </div>
                             </div>
                            <div class="panel-footer">
                                <?php echo form_error('second_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 3
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?= $this->lang->line('question-2'); ?></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="third_survey" id="third_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="third_survey" id="third_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="third_survey" id="third_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="third_survey" id="third_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="third_survey" id="third_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="third_survey" id="third_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                    </label>
                                </div>
                             </div>
                            <div class="panel-footer">
                                <?php echo form_error('third_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 4
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?= $this->lang->line('question-3'); ?></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fourth_survey" id="fourth_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fourth_survey" id="fourth_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fourth_survey" id="fourth_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fourth_survey" id="fourth_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fourth_survey" id="fourth_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fourth_survey" id="fourth_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                    </label>
                                </div>
                             </div>
                            <div class="panel-footer">
                                <?php echo form_error('fourth_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 5
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?= $this->lang->line('question-4'); ?></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fifth_survey" id="fifth_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fifth_survey" id="fifth_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fifth_survey" id="fifth_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fifth_survey" id="fifth_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fifth_survey" id="fifth_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="fifth_survey" id="fifth_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php echo form_error('fifth_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 6
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?= $this->lang->line('question-5'); ?></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sixth_survey" id="sixth_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sixth_survey" id="sixth_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sixth_survey" id="sixth_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sixth_survey" id="sixth_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sixth_survey" id="sixth_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sixth_survey" id="sixth_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php echo form_error('sixth_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                        </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $this->lang->line('question'); ?> 7
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label><?= $this->lang->line('question-6'); ?></label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="seventh_survey" id="seventh_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="seventh_survey" id="seventh_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="seventh_survey" id="seventh_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="seventh_survey" id="seventh_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="seventh_survey" id="seventh_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="seventh_survey" id="seventh_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <?php echo form_error('seventh_survey','<small style="color: red;"><i>',"</i></small>");?>
                                </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= $this->lang->line('question'); ?> 8
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?= $this->lang->line('question-7'); ?></label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="eighth_survey" id="eighth_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="eighth_survey" id="eighth_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="eighth_survey" id="eighth_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="eighth_survey" id="eighth_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="eighth_survey" id="eighth_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                    </label>
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="eighth_survey" id="eighth_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php echo form_error('eighth_survey','<small style="color: red;"><i>',"</i></small>");?>
                            </div>
                        </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $this->lang->line('question'); ?> 9
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label><?= $this->lang->line('question-8'); ?></label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="ninth_survey" id="ninth_survey1" value="0"><?= $this->lang->line('satisfaction-0'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="ninth_survey" id="ninth_survey2" value="1"><?= $this->lang->line('satisfaction-1'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="ninth_survey" id="ninth_survey3" value="2"><?= $this->lang->line('satisfaction-2'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="ninth_survey" id="ninth_survey4" value="3"><?= $this->lang->line('satisfaction-3'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="ninth_survey" id="ninth_survey5" value="4"><?= $this->lang->line('satisfaction-4'); ?>
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="ninth_survey" id="ninth_survey6" value="5"><?= $this->lang->line('satisfaction-5'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <?php echo form_error('ninth_survey','<small style="color: red;"><i>',"</i></small>");?>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $this->lang->line('question'); ?> 10 (<i><?= $this->lang->line('optional'); ?></i>)
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label><?= $this->lang->line('question-9'); ?></label>
                                        <textarea  class="form-control" name="tenth_survey"><?= set_value('tenth_survey') ?></textarea>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <?php echo form_error('tenth_survey','<small style="color: red;"><i>',"</i></small>");?>
                                </div>
                            </div>

                    </div>

                    <div class="col-lg-5 col-lg-offset-5">
                        <input type="submit" class="btn btn-lg btn-success" style="padding: 0.6em 3em;" value="<?= $this->lang->line('validate'); ?>">
                    </div>
                </div>

            </div>
            <?php echo form_close() ?>
            <!-- FORM -->
        <?php endif;?>


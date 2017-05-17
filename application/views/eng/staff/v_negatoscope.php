<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->lang->line('negatoscope'); ?> - South Sea Dental</title>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icone.png" />


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
</head>
<body>
<button type="button" class="btn btn-primary btn-sm" onclick="$(document).fullScreen(false); window.history.back();"><?= $this->lang->line('back'); ?></button>
<button type="button" class="btn btn-primary btn-sm" onclick="$(document).toggleFullScreen()"><?= $this->lang->line('fullscreen'); ?></button>
</body>
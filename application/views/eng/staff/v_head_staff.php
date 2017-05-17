<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->lang->line('dashboard'); ?> - South Sea Dental</title>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icone.png" />


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <!--<link href="<?php echo base_url();?>assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/datatables.net-dt/css/jquery.dataTables.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/morrisjs/morris.css" rel="stylesheet">


    <link href="<?php echo base_url();?>assets/jquery-ui/jquery-ui.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- FullCalendar CSS -->
    <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo base_url();?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />

    <!-- Tinymce -->
    <script type="text/javascript" src="<?= base_url();?>/assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#content_article",
            height:300,
            plugins: [
                "advlist autolink lists charmap print preview anchor image",
                "searchreplace visualblocks code",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

        });
    </script>


    <script type="text/javascript" src="<?php echo base_url();?>assets/js/clock.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>



</head>

<body onload="clock('hour', '<?php echo time()?>', '1');day('day','<?php echo time()?>','1')">


    <div class="col-lg-12 foot">
        <div class="col-lg-4 col-xs-12">

            <h2 style="font-family: Open"><?= $this->lang->line('address');?></h2>
            <ul>
                <li><?= $info['info_address']; ?></li>
                <li><?= $info['info_city']; ?></li>
                <li><?= $info['info_code']; ?></li>
                <li><?= $info['info_country']; ?></li>
            </ul>
        </div>
        <div class="col-lg-4 col-xs-12">

            <h2 style="font-family: Open"><?= $this->lang->line('secretariat');?></h2>
            <ul>
                <li><strong><?= $this->lang->line('phone');?></strong></li>
                <li><?= $info['info_phone']; ?></li>
                <li><strong><?= $this->lang->line('email');?></strong></li>
                <li><?= $info['info_email']; ?></li>
            </ul>
        </div>
        <div class="col-lg-4 col-xs-12">

            <h2 style="font-family: Open"><?= $this->lang->line('emergency');?></h2>
            <ul>
                <li><strong><?= $this->lang->line('phone');?></strong></li>
                <li><?= $info['info_phone_emergency']; ?></li>
                <li><strong><?= $this->lang->line('email');?></strong></li>
                <li><?= $info['info_email_emergency']; ?></li>
            </ul>
        </div>
    </div>
</div>
<div class=" col-lg-5 col-md-5 col-xs-10 col-lg-offset-5 col-md-offset-5 col-xs-offset-2">Copyright &copy; 2015 - All Rights Reserved</div>
</div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.maphilight.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>

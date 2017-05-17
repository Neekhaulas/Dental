<?php if($job != null) : ?>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
        <tr>
            <th><?= $this->lang->line('tooth'); ?></th>
            <th><?= $this->lang->line('treatment'); ?></th>
            <th><?= $this->lang->line('date'); ?></th>
            <th><?= $this->lang->line('complete'); ?></th>
            <th><?= $this->lang->line('price'); ?></th>
            <th><?= $this->lang->line('invoiced'); ?></th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php foreach($job as $r) : ?>
            <tr>
                <td><?= $r->id_tooth; ?></td>
                <td><?= $r->treatment_name; ?></td>
                <td><?= date("d-m-Y",strtotime($r->appointment_date)); ?></td>
                <?php if($r->job_complete==1): ?>
                    <td><?= $this->lang->line('yes'); ?></td>
                <?php else :?>
                    <td>
                        <?= $this->lang->line('no'); ?>
                    </td>
                <?php endif; ?>
                <td><?= $r->job_price_incl_tax; ?></td>
                <?php if($r->id_invoice==null): ?>
                    <td><?= $this->lang->line('no'); ?></td>
                <?php else :?>
                    <td>
                        <?= $this->lang->line('yes'); ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <h3 ="text-center"><?= $this->lang->line('no-treatment'); ?></h3>
<?php endif; ?>
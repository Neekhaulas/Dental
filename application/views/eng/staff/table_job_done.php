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
            <th><?= $this->lang->line('edit'); ?></th>
            <th><?= $this->lang->line('delete'); ?></th>
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
                        <?= $this->lang->line('no'); ?> <a href="<?= site_url('/Staff_c/finishJob/'.$r->id_patient.'/'.$r->id_job_done);?>"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-lg fa-check"></i></button></a>
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
                <td><a href="<?= site_url('/Staff_c/editJobDone/'.$r->id_tooth.'/'.$r->id_patient.'/'.$r->id_job_done);?>"><i class="fa fa-2x fa-pencil"></i></a></td>
                <td><a href="<?= site_url('/Staff_c/deleteJobDone/'.$r->id_patient.'/'.$r->id_job_done);?>"><i style="color: red;" class="fa fa-2x fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
        <h3>No job found.</h3>
<?php endif; ?>
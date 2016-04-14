<?php $aclist = array(1, 2, 3); ?>
<?php if (in_array($this->session->userdata('i_role'), $aclist)): ?>
    <a href="<?php echo site_url('holiday/add') ?>"><div class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Tambah </div></a>
<?php endif ?>

<div class="row page-header">
    <div class="col-md-6">
        <h3 class="page-header">
            Hari Libur        
        </h3>
    </div>
    <div class="col-md-6">
        <?php echo form_open(current_url()); ?>
        <div class="col-md-9">
            <div class="input-group">
                <input name="filter_year" type="text" placeholder="Pencarian tahun..." class="form-control" style="position: initial">
                <div class="input-group-btn">
                    <button type="submit" value="Filter" class="btn btn-default" name="search">Cari</button>
                </div>
            </div>
        </div>
        <?php form_close(); ?>
        <div class="col-md-3">

        </div>
    </div>
</div>
<div class="table-responsive table-condensed table-stiped">
    <table class="table">
        <thead>
            <tr>
                <th class="controls" align="center">Tahun</th>
                <th class="controls" align="center">Tanggal</th>
                <th class="controls" align="center">Keterangan</th>
                <?php $aclist = array(1, 2, 3); ?>
                <?php if (in_array($this->session->userdata('i_role'), $aclist)): ?>
                    <th class="controls" align="center">Aksi</th>
                <?php endif ?>
            </tr>
        </thead>
        <?php
        if (!empty($holiday)) {
            foreach ($holiday as $row) {
                ?>
                <tbody>
                    <tr>
                        <td ><?php echo $row['year']; ?></td>
                        <td ><?php echo pretty_date($row['date'], 'l, d/m/Y', FALSE); ?></td>
                        <td ><?php echo $row['info']; ?></td>
                        <?php $aclist = array(1, 2, 3); ?>
                        <?php if (in_array($this->session->userdata('i_role'), $aclist)): ?>
                            <td><a href="<?php echo site_url('holiday/delete/' . $row['id']) ?>" onclick="return confirm('Anda yakin akan menghapus hari libur?')" class="btn btn-danger btn-xs"><i class="ion ion-trash-a"></i>&nbsp; Hapus</a></td>
                        <?php endif ?>
                    </tr>
                </tbody>
                <?php
            }
        } else {
            ?>
            <tbody>
                <tr id="row">
                    <td colspan="4" align="center">Data Kosong</td>
                </tr>
                <?php
            }
            ?>   
        </tbody>
    </table>
</div>
<div >
    <?php echo $this->pagination->create_links(); ?>
</div>


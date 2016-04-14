<?php $this->load->view('datepicker'); ?>

<?php
if (isset($holiday)) {
    $inputYearValue = $holiday['year'];
    $inputDate = $holiday['date'];
    $inputInfo = $holiday['info'];
} else {
    $inputYearValue = set_value('year');
    $inputDate = set_value('date');
    $inputInfo = set_value('info');
}
?>

<?php if (!isset($holiday)) echo validation_errors(); ?>

<?php echo form_open_multipart(current_url()); ?>
<div class="row page-header">
    <div class="col-sm-9 col-md-6">
        <h3 class="page-title"><?php echo $operation; ?> Hari Libur</h3>
    </div>

</div>

<div class="row">
    <div class="col-sm-9 col-md-9">
        <?php if (isset($holiday)): ?>
            <input type="hidden" name="id" value="<?php echo $holiday['id']; ?>" />
        <?php endif; ?>
        <div class="form-group">
            <label>Tanggal *</label>
            <input type="text" placeholder="Tanggal" name="date" class="form-control datepicker hasDatepickerr" value="<?php echo $inputDate; ?>">
        </div>
        <div class="form-group">
            <label>Keterangan *</label>
            <textarea name="info" class="form-control"><?php echo $inputInfo; ?></textarea><br />
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
        </div>
    </div>
    <div class="col-sm-3 col-md-3">
        <div class="form-group">
            <div class="row">
                <label>Aksi</label><br>
                <button name="action" type="submit" value="save" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
                <a href="<?php echo site_url('holiday'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
                <?php if (isset($holiday)): ?>
                    <a href="<?php echo site_url('holiday/delete/' . $holiday['holiday_id']); ?>" class="btn btn-danger" ><i class="ion-trash-a"></i> Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
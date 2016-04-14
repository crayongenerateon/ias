<?php $aclist = array(1, 2, 3); ?>
<?php if (in_array($this->session->userdata('i_role'), $aclist)): ?>
	<a href="<?php echo site_url('holiday/add') ?>"><div class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Tambah </div></a>
<?php endif ?>

<a href="<?php echo site_url('holiday/listview') ?>"><div class="btn btn-success pull-right"><span class="glyphicon glyphicon-eye-open"></span> List </div></a>

<link href="<?php echo base_url('/media/js/fullcalendar/fullcalendar.css');?>" rel="stylesheet">
<script src="<?php echo base_url('/media/js/fullcalendar/fullcalendar.js');?>"></script>
<h3 class="page-header">
	Daftar Hari Libur
</h3>
<p class="text-success">
	<em>Klik pada area tanggal untuk menambah hari libur atau klik pada keterangan libur (yang berwarna biru) untuk menghapus libur.</em>
</p>
<hr>

<div id="calendar"></div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<?php echo form_open(current_url()); ?>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addModalLabel">Tambah Hari Libur</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="add" value="1">
				<label>Tanggal*</label>
				<p id="labelDate"></p>
				<input type="hidden" name="date" class="form-control" id="inputDate">
				<label >Keterangan*</label>
				<textarea name="info" id="inputDesc" class="form-control"></textarea><br />
			</div>
			<div class="modal-footer">
				<button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" id="btnSimpan" class="btn btn-primary disabled">Simpan</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<?php echo form_open(current_url()); ?>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="delModalLabel">Hapus Hari Libur</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="del" value="1">
				<input type="hidden" name="id" id="idDel">
				<label>Tahun</label>
				<p id="showYear"></p>
				<label>Tanggal</label>
				<p id="showDate"></p>
				<label >Keterangan*</label>
				<p id="showDesc"></p>
			</div>
			<div class="modal-footer">
				<button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Hapus</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'prevYear,nextYear',
		},
		events: "<?php echo site_url('holiday/get');?>",

		dayClick: function(date, jsEvent, view) {
			
			var tanggal = date.getDate();
			var bulan = date.getMonth()+1;
			var tahun = date.getFullYear();
			var fullDate = tahun + '-' + bulan + '-' + tanggal;

			$('#addModal').modal('toggle');
			$('#addModal').modal('show');
			
			$("#inputDate").val(fullDate);
			$("#labelDate").text(fullDate);
			$("#inputYear").val(date.getFullYear());
			$("#labelYear").text(date.getFullYear());
		},

		eventClick: function(calEvent, jsEvent, view) {
			$("#delModal").modal('toggle');
			$("#delModal").modal('show');
			$("#idDel").val(calEvent.id);
			$("#showYear").text(calEvent.year);

			var tgl = calEvent.start.getDate();
			var bln = calEvent.start.getMonth()+1;
			var thn = calEvent.start.getFullYear();

			$("#showDate").text(tgl+'-'+bln+'-'+thn);
			$("#showDesc").text(calEvent.title);
		}


	});

$("#inputDesc").on('change keyup focus input propertychange', function(){
	var desc = $("#inputDesc").val();
	if (desc.trim().length > 0) {
		$("#btnSimpan").removeClass('disabled');
	}else{
		$("#btnSimpan").addClass('disabled');
	}
})

$("#closeModal").click(function(){
	$("#inputDesc").val('');
	$("#btnSimpan").addClass('disabled');
});

</script>

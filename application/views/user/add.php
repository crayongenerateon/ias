	<h3 class="page-header"><?php echo $operation?> Pegawai</h3>
	<div class="row">
		
		<?php $this->load->view('datepicker'); ?>
		
		<?php 
		if (isset($user)) {
			$inputId = $user['user_id'];
			$inputUsername = $user['user_name'];
			$inputName = $user['user_full_name'];
			$inputEmail = $user['user_email'];
			$inputRole = $user['role_role_id'];
			$inputReligion = $user['religion_religion_id'];
			$inputAddressValue = $user['user_address'];
			$inputPhoneValue = $user['user_phone'];
			$inputBornValue = $user['user_born'];
			$inputDatebornValue = $user['user_date_born'];
			$inputGenderValue = $user['user_gender'];
			$inputAgeValue = $user['user_age'];
			$inputReligionValue = $user['user_religion'];
			$inputStartWork = $user['user_start_work'];
			$inputNpwpValue = $user['user_npwp'];
			$inputAskesValue = $user['user_askes'];
		}else{
			$inputUsername = set_value('inputUsername');
			$inputName = set_value('inputFullName');
			$inputEmail = set_value('inputEmail');
			$inputDescription = set_value('inputDescription');
			$inputAddressValue = set_value('user_address');
			$inputPhoneValue = set_value('user_phone');
			$inputBornValue = set_value('user_born');
			$inputDatebornValue = set_value('user_date_born');
			$inputGenderValue = set_value('user_gender');
			$inputAgeValue = set_value('user_age');
			$inputReligionValue = set_value('user_religion');
			$inputStartWork = set_value('user_start_work');
			$inputNpwpValue = set_value('$user_npwp');
			$inputAskesValue = set_value('user_askes');
		}
		?>
		<?php
		echo validation_errors();
		echo form_open(current_url())?>
		<div class="col-md-8">
			<?php if (isset($user)) {
				?>
				<input type="hidden" name="inputId" value="<?php echo $inputId?>">
				<?php
			}?>
			<label>User Name*</label>
			<input type="text" name="inputUsername" class="form-control" value="<?php echo $inputUsername?>" <?php echo ($this->uri->segment(3) == 'edit')?  : ''?>><br>
			
			<label>Nama Lengkap*</label>
			<input type="text" name="inputFullName" class="form-control" value="<?php echo $inputName?>"><br>
			
			<label>Email*</label>
			<input type="text" name="inputEmail" class="form-control" value="<?php echo $inputEmail?>"><br>
			
			<?php $aclist = array(1, 2, 3); ?>
			<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
				<label>Role*</label>
				<select name="inputRole" class="form-control">
					<option value="">--Pilih Role--</option>
					<?php foreach ($role as $key): 
					if (isset($user)) {
						if ($key['role_id'] == $user['role_id']) {
							$selected = 'selected';
						}else{
							$selected = '';
						}
					}
					?>
					<option value="<?php echo $key['role_id']?>" <?php echo isset($user)? $selected : ''?>><?php echo $key['role_name']?></option>
				<?php endforeach ?>
			</select>
			<br>
		<?php endif ?>

		<?php if ($this->uri->segment(2) == 'add'): ?>
			
			<label>Password*</label>
			<input type="password" name="inputPassword" class="form-control" value="">
			<p><em>*) Minimal 6 karakter</em></p>
			
			<label>Re-type Password*</label>
			<input type="password" name="inputPasswordConfirmation" class="form-control" value="">
			<br>
		<?php endif ?>
		
		<label >Alamat *</label>
		<textarea name="user_address" class="form-control" style="width: 100%" rows="10"><?php echo $inputAddressValue; ?></textarea><br />
		
		<label >No Telp *</label>
		<input name="user_phone" type="text" class="form-control" value="<?php echo $inputPhoneValue; ?>"><br>
		
		<label >Tempat Lahir *</label>
		<input name="user_born" type="text" class="form-control" value="<?php echo $inputBornValue; ?>"><br>
		
		<label>Tanggal Lahir *</label>
		<input id="inputDatebornValue" name="user_date_born" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputDatebornValue; ?>"><br>
		
		<label >Usia *</label>
		<input name="user_age" type="text" class="form-control" value="<?php echo $inputAgeValue; ?>"><br>

		<label >Jenis Kelamin *</label>
		<select data-placeholder="Jenis Kelamin" class="form-control" name="user_gender">
			<?php
			$laki="";$perempuan="";$kosong1="";
			if($jenis_kelamin=="Laki-Laki"){ $laki='selected="selected"';$perempuan="";$kosong1=""; }
			else if($jenis_kelamin=="Perempuan"){ $laki='';$perempuan='selected="selected"';$kosong1=""; }
			else { $laki='';$perempuan='';$kosong1='selected="selected"'; }
			?>
			<option value="" <?php echo $kosong1; ?>>--Pilih Jenis Kelamin--</option>
			<option value="Laki-Laki" <?php echo $laki; ?>>Laki-Laki</option>
			<option value="Perempuan" <?php echo $perempuan; ?>>Perempuan</option>
		</select>
		<br>
		
		<label >Agama *</label>
		<select placeholder="Agama" class="form-control" name="user_religion">
			<?php
			$islam="";$hindu="";$budha="";$protestan="";$katolik="";$konghucu="";$lainnya="";$kosong="";$kristen="";
			if($agama==""){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kosong='selected="selected"';$kristen=""; }
			else if($agama=="Hindu"){ $islam='';$hindu='selected="selected"';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
			else if($agama=="Budha"){ $islam='';$hindu='';$budha='selected="selected"';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
			else if($agama=="Kristen"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kosong="";$kristen='selected="selected"'; }
			else if($agama=="Kristen Protestan"){ $islam='';$hindu='';$budha='';$protestan='selected="selected"';$katolik='';$konghucu='';$kristen="";$lainnya='';$kosong=""; }
			else if($agama=="Kristen Katolik"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='selected="selected"';$konghucu='';$kristen="";$lainnya='';$kosong=""; }
			else if($agama=="Konghucu"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='selected="selected"';$lainnya='';$kristen="";$kosong=""; }
			else if($agama=="Lainnya"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='selected="selected"';$kristen="";$kosong=""; }
			else if($agama=="Islam"){ $islam='selected="selected"';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
			?>
			<option value="" <?php echo $kosong; ?>>--Pilih Agama--</option>
			<option value="Islam" <?php echo $islam; ?>>Islam</option>
			<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
			<option value="Budha" <?php echo $budha; ?>>Budha</option>
			<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
			<option value="Kristen Protestan" <?php echo $protestan; ?>>Kristen Protestan</option>
			<option value="Kristen Katolik" <?php echo $katolik; ?>>Kristen Katolik</option>
			<option value="Konghucu" <?php echo $konghucu; ?>>Konghucu</option>
			<option value="Lainnya" <?php echo $lainnya; ?>>Lainnya</option>
		</select>
		<br>

		<label>Tanggal Masuk Kerja *</label>
		<input id="user_start_work" name="user_start_work" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputStartWork; ?>"><br>

		<label >NPWP </label>
		<input name="user_npwp" type="text" class="form-control" value="<?php echo $inputNpwpValue; ?>"><br>
		
		<label >Askes </label>
		<input name="user_askes" type="text" class="form-control" value="<?php echo $inputAskesValue; ?>">
		<p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
		<br>
	</div>
	<div class="col-md-4">
		<label>Aksi</label><br>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo site_url('user')?>" class="btn btn-success">Batal</a>
	</div>
	<?php echo form_close()?>
</div>
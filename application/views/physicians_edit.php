<div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Edit Physician</h3>
  	         <div class="tab-content">
     			<?php if ($this->session->flashdata('message') != "") { ?>
		        <div class="<?php echo ($this->session->flashdata('response') == "1" ? "alert alert-success": "alert alert-danger")?>">
		            <?php echo $this->session->flashdata('message'); ?>
		        </div>
			    <?php }?>
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" action="<?php echo base_url(); ?>physicians/edit_execute" method="POST">
						<input type="hidden" name="id" value="<?=$data['id']?>">
						<div class="form-group">
							<label for="firstname" class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-8">
								<input value="<?=$data['firstname']?>" required name="firstname" type="text" class="form-control1" id="focusedinput" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<label for="middlename" class="col-sm-2 control-label">Middle Name</label>
							<div class="col-sm-8">
								<input value="<?=$data['middlename']?>" name="middlename" type="text" class="form-control1" id="focusedinput" placeholder="Middle Name">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-8">
								<input value="<?=$data['lastname']?>" required name="lastname" type="text" class="form-control1" id="focusedinput" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-8">
								<input value="<?=$data['email']?>" required name="email" type="email" class="form-control1" id="focusedinput" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">Gender</label>
							<div class="col-sm-8">
								<div class="radio-inline"><label><input type="radio" name="gender" value="1" <?php if ($data['gender'] == 1) { echo 'checked';} ?>> Male</label></div>
								<div class="radio-inline"><label><input type="radio" name="gender" value="2" <?php if ($data['gender'] == 2) { echo 'checked';} ?>> Female</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="room" class="col-sm-2 control-label">Mobile</label>
							<div class="col-sm-3">
								<input value="<?=$data['mobile']?>" name="mobile" type="text" class="form-control1" id="focusedinput" placeholder="09XXXXXXXXX">
							</div>
						</div>
						<div class="form-group">
							<label for="room" class="col-sm-2 control-label">Mac Address</label>
							<div class="col-sm-3">
								<input value="<?=$data['mac_address']?>" name="mac_address" type="text" class="form-control1" id="focusedinput" placeholder="00:00:00:00:00:00">
							</div>
						</div>
						<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Role</label>
									<div class="col-sm-3"><select name="role" id="selector1" class="form-control1">
										<option>--Select Role--</option>
										<option value="1" <?php if ($data['role'] == 1) { echo 'selected';} ?>>Consultant</option>
										<option value="2" <?php if ($data['role'] == 2) { echo 'selected';} ?>>Resident</option>
									</select></div>
								</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn bg-green">Submit</button>
									<button class="btn-default btn">Cancel</button>
								</div>
							</div>
						 </div>
					</form>
				</div>
			</div>
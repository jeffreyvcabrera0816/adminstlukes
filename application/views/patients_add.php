<div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Add Patient</h3>
  	         <div class="tab-content">
     			<?php if ($this->session->flashdata('message') != "") { ?>
		        <div class="<?php echo ($this->session->flashdata('response') == "1" ? "alert alert-success": "alert alert-danger")?>">
		            <?php echo $this->session->flashdata('message'); ?>
		        </div>
			    <?php }?>
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" action="<?php echo base_url(); ?>patients/add_execute" method="POST">
						<div class="form-group">
							<label for="firstname" class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-8">
								<input name="firstname" type="text" class="form-control1" id="focusedinput" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<label for="middlename" class="col-sm-2 control-label">Middle Name</label>
							<div class="col-sm-8">
								<input name="middlename" type="text" class="form-control1" id="focusedinput" placeholder="Middle Name">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-8">
								<input name="lastname" type="text" class="form-control1" id="focusedinput" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<label for="age" class="col-sm-2 control-label">Age</label>
							<div class="col-sm-3">
								<input name="age" type="number" class="form-control1" id="focusedinput" placeholder="Age">
							</div>
						</div>
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">Gender</label>
							<div class="col-sm-8">
								<div class="radio-inline"><label><input type="radio" name="gender" value="1" checked> Male</label></div>
								<div class="radio-inline"><label><input type="radio" name="gender" value="2"> Female</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="room" class="col-sm-2 control-label">Room</label>
							<div class="col-sm-3">
								<input name="room" type="text" class="form-control1" id="focusedinput" placeholder="Room">
							</div>
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
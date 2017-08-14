<div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Add Annoucement</h3>
  	         <div class="tab-content">
     			<?php if ($this->session->flashdata('message') != "") { ?>
		        <div class="<?php echo ($this->session->flashdata('response') == "1" ? "alert alert-success": "alert alert-danger")?>">
		            <?php echo $this->session->flashdata('message'); ?>
		        </div>
			    <?php }?>
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" action="<?php echo base_url(); ?>announcements/add_execute" method="POST">
						<!-- <div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-8">
								<input required name="title" type="text" class="form-control1" id="focusedinput" placeholder="Title">
							</div>
						</div> -->
						<div class="form-group">
							<label for="content" class="col-sm-2 control-label">Announcement</label>
							<div class="col-sm-8">
								<textarea name="content" style="height:140px" rows="10" type="text" class="form-control1" id="focusedinput" placeholder="Announcement"></textarea>
							</div>
						</div>
						
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn bg-green">Submit</button>
									<button type="button" class="btn-default btn" onClick="window.location='<?php echo base_url();?>announcements/announcements_list'">Cancel</button>
								</div>
							</div>
						 </div>
					</form>
				</div>
			</div>
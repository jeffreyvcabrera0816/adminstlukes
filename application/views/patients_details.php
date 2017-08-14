<div id="page-wrapper">
        <div class="graphs">
	   <div class="widget_head">Details</div>
		   <div class="bs-example5" data-example-id="default-media">
			<div class="media">
			  <div class="media-left">
			    <a href="#">
			      <img class="media-object" data-src="holder.js/64x64" src="<?php  echo ($details['image'] == "" ? base_url().'assets/img/person_placeholder.jpg' : base_url().'assets/img/images/patients/'.$details['image'])?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
			    </a>
			  </div>
			  <div class="media-body">
			    <h3 class="media-heading"><?=$details['lastname'].", ".$details['firstname']." ".$details['middlename']." &nbsp&nbsp&nbsp".$details['age'].($details['gender']==1?"M":"F");?></h3>
			    <h3 class="media-heading"><?="Room: ".$details['room']?></h3>
			    
			  </div>
			  <div class="form-group">
			  	<br>
		      
		      <br>
				<h3 class="media-heading">Status: <span id="status_actual"><?=$status[$details['status']-1]?></span>&nbsp<a style="cursor:pointer" data-toggle="modal" data-target="#myModal">(Change)</a></h3>
			<br>
		      <br>
			  <table class="table table-bordered" id="patients_table_no_js" cellspacing="0" width="100%">
		      <thead style="background:#ccffcc">
		        <tr>
		          <th width="60%">Physician/s</th>
		          <th width="20%"></th>
		          <th width="20%" class="text-center"><a class="btn-default btn" style="cursor:pointer" data-toggle="modal" data-target="#myModal2" data-backdrop="static" data-keyboard="false">Add</a></th> 
		        </tr>
		      </thead>
		      <tbody>
		        <?php foreach($physicians as $row): ?>
		        <tr>
		          <td><?="Dr. ".$row['firstname']." ".$row['lastname'];?></td>
		          <td class="text-center">
		          	<?php if ($row['engage'] == 1) {
		          		echo "@";
		          	} else if ($row['engage'] == 2) {
		          		echo "®";
		          	} else {
		          		echo "";
		          	} ?>
		          </td>
		          <td class="text-center">
		          	<a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url().'patients/deleteph/'.$details['id'].'/'.$row['ppid']; ?>">Remove</a>
		          </td>
		        </tr>
		        <?php endforeach; ?>
		      </tbody>
		    </table>
			  <br>
		      <br>
			  <table class="table table-bordered" id="patients_table_no_js" cellspacing="0" width="100%">
		      <thead style="background:#ccffcc">
		        <tr>
		          <th width="60%">Notes</th>
		          <th width="20%">Created By</th>
		          <th width="20%">Date Created</th> 
		        </tr>
		      </thead>
		      <tbody>
		        <?php foreach($notes as $row): ?>
		        <tr>
		          <td><?=$row['content'];?></td>
		          <td><?=$row['lastname'].", ".$row['firstname']?></td>
		          <td><?=$row['date_created'];?></td>
		        </tr>
		        <?php endforeach; ?>
		        
		      </tbody>
		    </table>
		    <br>
		    <br>
		    <table class="table table-bordered" id="patients_table_no_js" cellspacing="0" width="100%">
		      <thead style="background:#ccffcc">
		        <tr>
		          <th width="60%">Diagnosis</th>
		          <th width="20%">Created By</th>
		          <th width="20%">Date Created</th> 
		        </tr>
		      </thead>
		      <tbody>
		        <?php foreach($diagnosis as $row): ?>
		        <tr>
		          <td><?=$row['content'];?></td>
		          <td><?=$row['lastname'].", ".$row['firstname']?></td>
		          <td><?=$row['date_created'];?></td>
		        </tr>
		        <?php endforeach; ?>
		        
		      </tbody>
		    </table>
		    <br>
		    <br>
		    <table class="table table-bordered" id="patients_table_no_js" cellspacing="0" width="100%">
		      <thead style="background:#ccffcc">
		        <tr>
		          <th width="60%">Actions Needed</th>
		          <th width="20%">Created By</th>
		          <th width="20%">Date Created</th> 
		        </tr>
		      </thead>
		      <tbody>
		        <?php foreach($actions as $row): ?>
		        <tr>
		          <td><?=$row['content'];?></td>
		          <td><?=$row['lastname'].", ".$row['firstname']?></td>
		          <td><?=$row['date_created'];?></td>
		        </tr>
		        <?php endforeach; ?>
		        
		      </tbody>
		    </table>
		    <br>
		    <br>
		    <table class="table table-bordered" id="patients_table_no_js" cellspacing="0" width="100%">
		      <thead style="background:#ccffcc">
		        <tr>
		          <th width="60%">Surgical Procedures</th>
		          <th width="20%">Created By</th>
		          <th width="20%">Date Created</th> 
		        </tr>
		      </thead>
		      <tbody>
		        <?php foreach($procedures as $row): ?>
		        <tr>
		          <td><?=$row['content'];?></td>
		          <td><?=$row['lastname'].", ".$row['firstname']?></td>
		          <td><?=$row['date_created'];?></td>
		        </tr>
		        <?php endforeach; ?>
		        
		      </tbody>
		    </table>
			  <div class="clearfix"> </div>
			</div>

			<!-- MODALs -->

			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Change Status</h4>
			      </div>
			      <div class="modal-body">
			        <select class="status" id="status" att="<?php echo $details['id']; ?>">
			        	<?php $x = 0; ?>
			        	<?php $y = 0; ?>
			        	<?php foreach($status as $stat): ?>
			        	<?php $y++; ?>
			        	<option value="<?=$y?>" <?php if($details['status'] == $y) { echo "selected"; } ?>><?=$stat?></option>
			        	<?php $x++; ?>
			        <?php endforeach; ?>
			        </select><span id="stat"></span>
			      </div>
			      <div class="modal-footer">
			      	<button type="button" id="change" class="btn btn-primary">Change</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

			<div id="myModal2" class="modal fade" role="dialog" data-keyboard="false">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add Physician</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered" id="patients_table_no_js" cellspacing="0" width="100%">
				      <thead style="background:#ccffcc">
				        <tr>
				          <th width="60%">Physician</th>
				          <th width="20%"></th>
				          <th width="20%" class="text-center">Add</th> 
				        </tr>
				      </thead>
				      <tbody>
				      	
				        <?php foreach($physicians_list as $row): ?>
				        <?php 
				        	$phid = explode(",", $details['physicians_id']);
				        	if (!in_array($row['id'], $phid)): 
				        ?>
				        <form method="POST" name="engage" id="engage_<?php echo $row['id'];?>" class="formengage" att="<?php echo $row['id']; ?>">
				        <tr>
				          <td>
				          	<input name="phid" type="hidden" value="<?=$row['id']?>">
				        	<input name="id" type="hidden" value="<?=$details['id']?>">
				          	<?=$row['firstname']." ".$row['lastname']?></td>
				          <td class="text-center">
				          	<select name="engage">
				          		<option value="0">none</option>
				          		<option value="1">@</option>
				          		<option value="2">®</option>
				          	</select>
				          </td>
				          <td class="text-center" id="stat_<?php echo $row['id']?>"><img class="engage1" att="<?php echo $row['id']; ?>" style="cursor:pointer" width="20px" src="<?php echo base_url();?>assets/images/plus.png"></td>
				        </tr>
				        </form>
				    	<?php endif; ?>
				        <?php endforeach; ?>
				        
				      </tbody>
				    </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default"  onClick="window.location='<?php echo base_url();?>patients/get_details/<?php echo $details['id']; ?>'">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
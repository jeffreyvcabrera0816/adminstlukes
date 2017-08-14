<div id="page-wrapper">
    <div class="col-md-12 graphs">

    <div class="xs">
		<div class="col-md-6 span_3">
		  <div class="bs-example1" data-example-id="contextual-table">
		  	<div class="widget_head">Daily Census</div>

		  	<div class="col-xs-6 span_3">
		    <table class="table table-bordered">
		    	<thead>
		    		<th class="text-center">Duty Team</th>
		    	</thead>
		      <tbody>
		      	<?php foreach($onduty as $key => $row): ?>
		        <tr class="">
		          <td><?="Dr. ".$row['firstname'] . " " . $row['lastname']?></td>
		        </tr>
		    	<?php endforeach; ?>
		      </tbody>
		    </table>
	   </div>

	   <div class="col-xs-6 span_3">
		    <table class="table table-bordered">
		    	<thead>
		    		<th class="text-center">Incoming Duty Team</th>
		    	</thead>
		      <tbody>
		      	<?php foreach($incomingduty as $key => $row): ?>
		        <tr class="">
		          <td><?="Dr. ".$row['firstname'] . " " . $row['lastname']?></td>
		        </tr>
		    	<?php endforeach; ?>
		      </tbody>
		    </table>
	   </div>

		    <table class="table">
		      <tbody>
		      	<?php foreach($status as $key => $stat): ?>
		        <tr class="<?php echo $classes[$key]; ?>">
		          <td><?=$stat?></td>
		          <td>
		          	<?php 
		          		$inpatient = 0;
		          		$discharge = 0;
		          		$mortality = 0;
		          		$signout = 0;
		          	 ?>
		          	<?php 
		          		$x = 0;
		          		foreach($data as $row) {
			          		if (($row['status']-1) == $key) {
			          			$x = $row['status_count'];
			          					          			
			          		} 
			          		if (($row['status']-1) == 0 || ($row['status']-1) == 1 || ($row['status']-1) == 2 || ($row['status']-1) == 3 || ($row['status']-1) == 5 || ($row['status']-1) == 8 || ($row['status']-1) == 9 || ($row['status']-1) == 10 || ($row['status']-1) == 11) {
		          				$inpatient+=$row['status_count'];
			          		}
			          				
		          		} 
		          		if ($key == 3) {
		          			echo $inpatient;
		          		} else {
		          			echo $x;
		          		}
		          		
		          	?>
		          </td>
		        </tr>
		    	<?php endforeach; ?>
		      </tbody>
		    </table>
		   </div>
	   </div>
	   <div class="col-md-6 span_4">

		  	<div class="bs-example1">

		        <div class="" id="style-2">
		        	<div class="widget_head">Announcements</div>
		        	<?php foreach($announcements as $announcement): ?>
	  			    <div class="activity-row">
	                 <div class="col-xs-8 activity-desc">
	                    <p><?=nl2br($announcement['announcement']);?></p>
	                    <h6><?=$announcement['date_added'];?></h6>
	                 </div>
	                 <div class="clearfix"> </div>
                    </div>
                    <?php endforeach; ?>
                   
	  		        </div>
		 </div>
		</div>
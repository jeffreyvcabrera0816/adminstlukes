<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>
		Data
	</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		.margin0{
			margin: 0;
		}
		p {
			margin: 10px 0px 0px 0px ;
			padding: 0;
			font-weight: bold;
		}
		th {
			padding: 0px 5px 0px 5px;
		}
		td {
			padding: 0px 5px 0px 5px;
		}
		 table {
            -fs-table-paginate: paginate;
        }
	</style>
</head>
<body style="font-size:10px">
	<input type="button" onclick="printDiv('printableArea')" value="print" class="btn btn-primary"/>
	<div class="container" style="margin-top:50px" id="printableArea">
		<center><table width="100%" border="0" style="margin-top:10px">
		<tr>
			<td width="25%">
				<img width="200px" src="<?php echo base_url(); ?>assets/images/black_logo.png" style="float:left">	
			</td>
			<td width="50%">
				<center>
					<h3 class="margin0">Department of Otorhinolaryngology</h3>
					<h3 class="margin0">Head & Neck Surgery</h3>
					<h3 class="margin0">Daily Census</h3>
					<?php echo date("F j, Y (l)"); ?>
				</center>
			</td>
			<td width="25%">
			</td>
			
		</tr>
		</table></center>
		
		<center><table width="60%" border="1" style="margin-top:10px">
			<tr>
				<td width="25%">
					Duty Team:
				</td>
				<td width="25%">
					<?php 
						foreach ($onduty as $row) {
							echo "Dr. " . $row['lastname']."<br>";
						} 
					?>
				</td>
				<td width="25%">
					Incoming Duty Team:
				</td>
				<td width="25%">
					<?php 
						foreach ($incomingduty as $row) {
							echo "Dr. " . $row['lastname']."<br>";
						} 
					?>
				</td>
			</tr>
		</table></center>
		<center>
			<table width="61%" border="1">
				<tr>
					<td width="24%">Admission/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 1) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Discharge/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 5) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Fall/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 9) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
				</tr>
				<tr>
					<td width="24%">Referral/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 2) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Emergency Room/Urgent Care Consult/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 6) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Medication Error/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 10) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
				</tr>
				<tr>
					<td width="24%">Surgical Procedure/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 3) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Mortalities:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 7) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Mobidities:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 11) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
				</tr>
				<tr>
					<td width="24%">Total In-Patients:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if (($row['status']) == 1 || ($row['status']) == 2 || ($row['status']) == 3 || ($row['status']) == 4 || ($row['status']) == 6 || ($row['status']) == 9 || ($row['status']) == 10 || ($row['status']) == 11 || ($row['status']) == 12) {
									$x += $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Sign-out:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 8) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
					<td width="24%">Sentinel Event/s:</td>
					<td width="4%" class="text-center">
						<?php 
							$x = 0;
							foreach ($count as $row) {
								if ($row['status'] == 12) {
									$x = $row['status_count'];
								} 
							} 
							echo $x;
						?>
					</td>
				</tr>
			</table>
		</center>
		<center>
			<p>
				ADMISSIONS
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 1) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 1): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>REFERRALS
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 2) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 2): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>SURGICAL PROCEDURES
			(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 3) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 3): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>INPATIENTS
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if (($row['status']) == 1 || ($row['status']) == 2 || ($row['status']) == 3 || ($row['status']) == 4 || ($row['status']) == 6 || ($row['status']) == 9 || ($row['status']) == 10 || ($row['status']) == 11 || ($row['status']) == 12) {
							$x+=$row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if (($row['status']) == 1 || ($row['status']) == 2 || ($row['status']) == 3 || ($row['status']) == 4 || ($row['status']) == 6 || ($row['status']) == 9 || ($row['status']) == 10 || ($row['status']) == 11 || ($row['status']) == 12): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>DISCHARGES
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 5) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 5): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>EMERGENCY ROOM/URGENT CARE CLINIC
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 6) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>C/WI/HE/SS</center></th>
					<th width="5%"><center>Adm/DC</center></th>
					<th width="17%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="35%"><center>Diagnosis</center></th>
					<th><center>Plan</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 6): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>SIGN OUT
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 8) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<tr>

				</tr>
			</table>

			<p>MORTALITY
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 7) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 7): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>FALL
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 9) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 9): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><center><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></center></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>MEDICATION ERROR
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 10) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 10): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><center><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></center></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>MORBIDITY
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 11) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 11): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><center><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></center></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

			<p>SENTINEL EVENT
				(<?php 
					$x = 0;
					foreach ($count as $row) {
						if ($row['status'] == 12) {
							$x = $row['status_count'];
						} 
					} 
					echo $x;
					?>)
			</p>
			<table width="100%" border="1">
				<thead>
					<th width="5%"><center>Rm/Pin/File</center></th>
					<th width="12%"><center>Name</center></th>
					<th width="3%"><center>A/S</center></th>
					<th width="15%"><center>Physician/s</center></th>
					<th width="44%"><center>Diagnosis</center></th>
					<th><center>Surgical Procedure</center></th>
				</thead>
				<?php foreach($data as $row): ?>
				<?php if ($row['status'] == 12): ?>
				<tr>
					<td><?=$row['room']?></td>
					<td><?=$row['lastname'].", ".$row['firstname']?></td>
					<td><center><?=$row['age'].($row['gender'] == 1 ? 'M' : 'F')?></center></td>
					<td><?=$row['physicians']?></td>
					<td><?=$row['diagnosis'] == "" ? 'None' : $row['diagnosis']?></td>
					<td><?=$row['surgical_procedures'] == "" ? 'None' : $row['surgical_procedures']?></td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
			</table>

		
		</center>
	</div>
	
</body>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</html>
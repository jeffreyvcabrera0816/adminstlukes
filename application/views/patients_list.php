<div id="page-wrapper">
        <div class="col-md-12 graphs">
       <div class="xs">
     <h3>Patients</h3>

    <div class="bs-example4" data-example-id="contextual-table">
    <?php if ($this->session->flashdata('message') != "") { ?>
      <div class="<?php echo ($this->session->flashdata('response') == "1" ? "alert alert-success": "alert alert-danger")?>">
          <?php echo $this->session->flashdata('message'); ?>
      </div>
    <?php }?>
    <table class="table table-striped" id="patients_table" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Rm/Pin/File</th>
          <th>Name</th>
          <th>A/S</th>
          <th>Physician/s</th>
          <th>Diagnosis</th>
          <th>Surgical Procedure</th>
          <th>Status</th>
          <th>Action</th>  
        </tr>
      </thead>
      <tbody>
        <?php $x = 0; ?>
        <?php foreach($data as $row): ?>
        <?php $x++; ?>
        <tr>
          <td><?=$x?></td>
          <td><?=$row['room'];?></td>
          <td><?=$row['lastname'].", ".$row['firstname']?></td>
          <td><?=$row['age'].($row['gender'] == 1 ? "M":"F");?></td>
          <td><?=$row['physicians'];?></td>
          <td><?=$row['diagnosis'];?></td>
          <td><?=$row['surgical_procedures'];?></td>
          <td><?=$status[$row['status']-1];?></td>
          <td>
            <a href="<?php echo base_url().'patients/get_details/'.$row['id']; ?>">Details</a>
          </td>
        </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>

   </div>
   </div>
  </div>
  </div>
  
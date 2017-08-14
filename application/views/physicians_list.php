<div id="page-wrapper">
        <div class="col-md-12 graphs">
       <div class="xs">
     <h3>Physicians</h3>

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
          <th>Name</th>
          <th>Gender</th>
          <th>Mobile</th>
          <th>Role</th>
          <th>Duty</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $x = 0; ?>
        <?php foreach($data as $row): ?>
        <?php $x++; ?>
        <tr>
          <td><?=$x?></td>
          <td><?=$row['lastname'].", ".$row['firstname']?></td>
          <td><?=$row['gender'] == 1 ? "M":"F";?></td>
          <td><?=$row['mobile'];?></td>
          <td><?=$row['role'] == 1 ? "Consultant":"Resident";?></td>
          <td>
            <div class="form-group">
              <div class="col-sm-6"><select name="duty" id="duty" class="duty" att="<?php echo $row['id']; ?>">
                <option value="0" <?php if ($row['on_duty'] == 0) echo "selected";?>>Not in duty</option>
                <option value="1"<?php if ($row['on_duty'] == 1) echo "selected";?>>On Duty</option>
                <option value="2"<?php if ($row['on_duty'] == 2) echo "selected";?>>Coming</option>
              </select></div>&nbsp&nbsp&nbsp&nbsp<span id="stat_<?php echo $row['id']; ?>" class="status"></span>
            </div>
          </td>
          <td>
            <a href="<?php echo base_url();?>physicians/physicians_edit/<?=$row['id']?>">Edit</a><br>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url();?>physicians/delete/<?=$row['id']?>">Remove</a>
          </td>
        </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>

   </div>
   </div>
  </div>
  </div>
  
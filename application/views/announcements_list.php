<div id="page-wrapper">
        <div class="col-md-12 graphs">
       <div class="xs">
     <h3>Announcements</h3>

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
          <th>Annoucement</th>
          <th>Date Added</th>
          <th>Action</th>  
        </tr>
      </thead>
      <tbody>
        <?php $x = 0; ?>
        <?php foreach($data as $row): ?>
        <?php $x++; ?>
        <tr>
          <td><?=$x?></td>
          <td><?=$row['announcement'];?></td>
          <td><?=$row['date_added']?></td>
          <td>
            <a href="<?php echo base_url().'announcements/announcement_edit/'.$row['id']; ?>">Edit</a><br>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url().'announcements/delete/'.$row['id']; ?>">Remove</a>
          </td>
        </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>
    <button onclick="printContent('patients_table')">print</button>
   </div>
   </div>
  </div>
  </div>

  <script type="text/javascript">
      function printContent(id) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(id).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
      }
  </script>
  
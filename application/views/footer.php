
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
     	$('#patients_table').DataTable();
	   
        $(".engage1").each(function(index, value) {
        
           
            $(this).on('click', function() {
                var id = $(this).attr('att');
                var strForm = $("#engage_"+id).serialize();
                
                console.log(strForm); 
                var url = "<?php echo base_url(); ?>patients/add_patient_physicians";
               
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: strForm,
                    beforeSend: function(r, x) {
                        $("#stat_"+id).html('<img width="20px" src="<?=base_url()?>assets/img/giphy.gif">');
                        
                    },
                    success: function(r, x, y) {
                        // console.log('strForm'); 
                        // var stat_id = r.id;
                        // console.log(r.id);
                        $("#stat_"+id).html('<img width="20px" src="<?=base_url()?>assets/img/check.png">');

                    },
                    error: function(err, r) {
                        console.log(r);
                    }
                });         
            });
        });

       $( ".duty" ).each(function(index, value) {
        
            
            $(this).on('change', function() {
                var value = $(this).val();
                var id = $(this).attr('att');
                var url = "<?php echo base_url(); ?>physicians/change_duty";
               // console.log(url); 
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {id: id, value: value},
                    beforeSend: function(r, x) {
                        $("#stat_"+id).html('<img width="20px" src="<?=base_url()?>assets/img/giphy.gif">');
                        
                    },
                    success: function(r, x, y) {
                        var stat_id = r.id;
                        // console.log(r.id);
                        $("#stat_"+stat_id).html('<img width="20px" src="<?=base_url()?>assets/img/check.png">');

                    },
                    error: function(err, r) {
                        console.log(r);
                    }
                });         
            });
        });

        $("#change").on('click', function() {

            var status = $("#status").val();
            var id = $("#status").attr('att');
            var url = "<?php echo base_url(); ?>/patients/change_status";
            var stats = ['Admission', 'Referral', 'Surgical', 'In-Patient', 'Discharge', 'Emergency', 'Mortalities', 'Sign Out', 'Fall', 'Medication Error', 'Morbidities', 'Sentinel Events'];

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id:id, status:status},
                beforeSend: function(r, x) {
                        $("#stat").html('<img width="20px" src="<?=base_url()?>assets/img/giphy.gif">');
                        
                    },
                success: function(r) {
                    var st = status + 1;
                    $('#myModal').modal('toggle');
                    $("#stat").html("");
                    $("#status_actual").text(stats[status-1]);
                },
                error: function() {
                    alert("ERROR");
                }
            });
            console.log(id);

        });
        
    });

  $(function() {

        $('#side-menu').metisMenu();

    });

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});
</script>
</body>
</html>
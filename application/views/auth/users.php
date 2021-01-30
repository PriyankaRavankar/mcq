<?php require_once(APPPATH."views/auth/header.php"); ?>
<div class="container">
<!-- <h1> Welcome In Admin Dashboard</h1> -->
<table  id="myTable" class="table table-striped">
	<thead>
	    <tr>
			
			<th>First Name</th>
			<th >Last Name</th>
			<th>Score</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>City</th>
		</tr>
	</thead>
	
</table>
</div>
<script type="text/javascript">
     $(document).ready(function(){
        $('#myTable').DataTable({
          'processing': true,
          'serverSide': true,
			 'serverMethod': 'post', 
			 'columnDefs': [{ 'orderable': false, "targets": [-2,-1,-3,-5,-6] }],
          'ajax': {
             'url':'<?=base_url()?>index.php/auth/userslist'
          },
          'columns': [
				 { data: 'firstname' },
				 { data: 'lastname' },
             { data: 'score' },
             { data: 'email' },
             { data: 'mobile' },
			 { data: 'city' },
			 
          ]
        });
     });
     </script>
<?php require_once(APPPATH."views/auth/footer.php"); ?>

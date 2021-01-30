<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Quiz Result</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class='container'>
  <div class="wrapper-1">
    <div class="wrapper-2">
      <h1>Thank you for participating in our quiz!</h1>
   
    
      
    </div>
    <div class="footer-like">

		<?php $score =0; ?>
    
      <?php $array1= array(); ?>
      <?php $array2= array(); ?>    
     
      
         <?php foreach($checks as $checkans) { ?>
               <?php array_push($array1, $checkans); } ?>
               
               
		<?php
		 foreach($results as $res) {
			
			?>
               <?php array_push($array2, $res); 
			        
			   } ?>
               
               
           <?php 
		       for ($x=0; $x <10; $x++) { ?>
 
			<form method="post" action="<?php echo base_url();?>index.php/">  
		
			
		

				<?php if ($array2[$x]!=$array1[$x]) { ?>
				
						
				<?php } else { ?>
				
						
						
						<?php $score = $score + 1; ?>
				
			<?php } } ?>
			
			<!-- <br><br> -->
			
			<h4> Your Score: <?=$score?>/10 </h4>
		
		
			<input class="btn btn-success" type="submit" value="Play Again!">
		
			<a class="btn btn-danger" href="<?= base_url();?>index.php/auth/logout">Logout</a> 
			
			</form>
      
    </div>
</div>
</div>


</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Play Quiz</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
body {
background-color: #F3EBF6;
font-family: 'Ubuntu', sans-serif;
}
div.error {
margin-bottom: 15px;
margin-top: -6px;
margin-left: 58px;
color: red;
}
.main {
background-color: #FFFFFF;
width: 930px;
height: 1380px;
margin-bottom: 6em ;
margin-top: 6em ;
margin-left: 12em ;
margin-right: 12em;
border-radius: 1.5em;
box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}
.sign {
padding-top: 40px;
color: #8C55AA;
font-family: 'Ubuntu', sans-serif;
font-weight: bold;
font-size: 23px;
}
.un {
width: 76%;
color: rgb(38, 50, 56);
font-weight: 700;
font-size: 14px;
letter-spacing: 1px;
background: rgba(136, 126, 126, 0.04);
padding: 10px 20px;
border: none;
border-radius: 20px;
outline: none;
box-sizing: border-box;
border: 2px solid rgba(0, 0, 0, 0.02);
margin-bottom: 50px;
margin-left: 46px;
text-align: center;
margin-bottom: 27px;
font-family: 'Ubuntu', sans-serif;
}
form.form1 {
padding-top: 40px;
}
.pass {
width: 76%;
color: rgb(38, 50, 56);
font-weight: 700;
font-size: 14px;
letter-spacing: 1px;
background: rgba(136, 126, 126, 0.04);
padding: 10px 20px;
border: none;
border-radius: 20px;
outline: none;
box-sizing: border-box;
border: 2px solid rgba(0, 0, 0, 0.02);
margin-bottom: 50px;
margin-left: 46px;
text-align: center;
margin-bottom: 27px;
font-family: 'Ubuntu', sans-serif;
}
.un:focus, .pass:focus {
border: 2px solid rgba(0, 0, 0, 0.18) !important;
}
.submit {
cursor: pointer;
border-radius: 5em;
color: #fff;
background: linear-gradient(to right, #9C27B0, #E040FB);
border: 0;
padding-left: 40px;
padding-right: 40px;
padding-bottom: 10px;
padding-top: 10px;
font-family: 'Ubuntu', sans-serif;
margin-left: 35%;
font-size: 13px;
box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
}
.forgot {
text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
color: #E1BEE7;
padding-top: 15px;
}
button {
text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
color: #E1BEE7;
text-decoration: none
}
@media (max-width: 600px) {
.main {
border-radius: 0px;
}
</style>
<body>
<div class="main">
<p class="sign" align="center">MCQ Quiz</p>
<div class="container">
<form method="post"  action="<?php echo base_url();?>index.php/Mcq/resultdisplay">
<input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id')?>" />
 

<?php $i = 1;
	// echo "<pre>";
	//print_r($questions->results);die;
	foreach($questions->results as $row) { 
	//	print_r($row);die;
		?>
    
	<?php 
	
	$arr= explode(",", $row->correct_answer);
	
	$ans_array = array_merge($row->incorrect_answers,$arr);

	shuffle($ans_array); ?>
    
    <p >Q.<?=$i?>) <?=$row->question?></p>
	
    <input type="hidden" name="ques<?= $i?>" value="<?=$row->question?>"/>
	<input type="hidden" name="ans<?= $i?>" value="<?=$row->correct_answer?>"/>
	<?php
	$first = true;
	foreach($ans_array as $ans) {

		if ( $first )
		{
			// do something
			$first = false; ?>
			
			<input  type="radio" name="quizid<?=$i?>" value="<?=$ans?>" required > <?=$ans?> <br>
	<?php	}
		else
		{ ?>
			<input type="radio" name="quizid<?=$i?>" value="<?=$ans?>"> <?=$ans?><br>
	<?php	} ?>
		
   
    
    
    <?php  }  $i++; }  ?>
    
    <br><br>
    <button type="submit" align="center" class="submit">Submit</button>
    
    </form>
	</div>
   
    
</div>

</body>
</html>

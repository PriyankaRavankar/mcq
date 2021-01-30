<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<title>Sign Up</title>
</head>
<style type="text/css">
body {
background-color: #F3EBF6;
font-family: 'Ubuntu', sans-serif;
}

input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

div.error {
/* margin-bottom: 15px;
margin-top: -6px; */
margin-top:0;
padding:0;
margin-left: 58px;
font-size:13px !important;
color: red;
}
.main {
background-color: #FFFFFF;
width: 400px;
height: 820px;
margin: 7em auto;
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
margin-bottom: 21px;
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
<p class="sign" align="center">Sign Up</p>
<form id="registerform" action="<?php echo base_url('index.php/auth/post_register') ?>" method="post" accept-charset="utf-8">
<input class="un " type="text" align="center" name="first_name" placeholder="First name" onkeypress="return isAlphabet(event,this);" required>
<?php echo form_error('first_name'); ?>   
<input class="un " type="text" align="center" name="last_name" placeholder="Last name" onkeypress="return isAlphabet(event,this);" required>
<?php echo form_error('last_name'); ?>  
<input class="un " type="text" align="center" name="mobile" pattern="[7-9]{1}[0-9]{9}" title="Mobile No should start with 7 or 8 or 9" placeholder="Mobile number" onkeypress="return isNumber(event);" minlength="10" maxlength="10" required>
<?php echo form_error('mobile'); ?> 
<input class="un " type="email" align="center" name="email" placeholder="Email" required>
<?php echo form_error('email'); ?> 
<input class="pass" type="password" align="center" name="password" placeholder="Password" minlength="6" maxlength="8" required>
<?php echo form_error('password'); ?>


<input class="un " type="text" align="center" name="city" placeholder="City" onkeypress="return isAlphabet(event,this);" required>
<?php echo form_error('city'); ?>  

<div  align="center" >
<input  type="radio"   name="user_type" value="admin" required> <label for="admin">Admin</label>
<input  type="radio"  name="user_type" value="guest"> <label for="guest">Guest</label><br>
</div><br>
<?php echo form_error('user_type'); ?> 
<button type="submit" align="center" class="submit">Sign Up</button>
</form>                
</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script type="text/javascript">
	
	 
    //Allow Only Alphabates

    function isAlphabet(evt, t) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if(charCode == 37 || charCode == 39){
            return true;
        }
        if((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 || charCode == 32 || charCode == 16 || charCode == 9){
            return true;
        }
        return false;
    }
    //Allow Only Numbers

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if(charCode == 37 || charCode == 39){
            return true;
        }
        //return false;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

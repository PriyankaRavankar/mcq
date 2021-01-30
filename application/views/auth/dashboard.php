<?php require_once(APPPATH."views/auth/header.php"); ?>
<div class="container">
<h1> Welcome <?= $this->session->userdata('firstname')." ".$this->session->userdata('lastname')?> !</h1>
</div>
 
<?php require_once(APPPATH."views/auth/footer.php"); ?>

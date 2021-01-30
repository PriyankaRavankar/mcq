<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link rel="stylesheet" 
		href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<script type="text/javascript" 
		src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" 
		src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('index.php/auth/dashboard'); ?>">Admin Panel</a>
                </div>
 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 
                   
                    <ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url('index.php/auth/candidates'); ?>">Candidates</a></li>
					 
                        <li><a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
 
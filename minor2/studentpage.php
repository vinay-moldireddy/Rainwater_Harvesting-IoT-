<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>admin</title>
	<title>adminpage</title>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div calss="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Institute of Tech.</a>
			</div>		
		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav navbar-right">
				   <!-- <li><a href="http://192.168.64.2/minor/index.php" target="_self"><span class="glyphicon glyphicon-log-in"></span> Student Login</a></li>
				   <li><a href="http://192.168.64.2/minor/teacherlogin.php" target="_self"><span class="glyphicon glyphicon-log-in"></span> Teacher Login</a></li> -->
		    	</ul>
		    </div>
	    </div>
	</nav>
<?php
	$con = mysqli_connect("localhost", "vinay", "", "minor") or die(mysqli_error($con));
	$select_query = "SELECT id, password FROM students" or die(mysqli_error($con));
	$select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));	

	$select_student = "SELECT dte, A1, A2, A3, A4 FROM S".$_GET['id'] or die(mysqli_error($con)); 
	$select_student_result = mysqli_query($con, $select_student) or die(mysqli_error($con));
	$temp=0;
	while($row = mysqli_fetch_array($select_query_result))
	{
		if($row['id']==$_GET['id'])
		{
			if($row['password']==$_GET['password'])
			{ ?>
			<div class="row container-fluid">
				<div class="col-xs-1 col-md-2"></div>
				<div class="col-xs-11 col-md-4 teacher">
					<div class="row">
						<div class="col-xs-12"><H3>Student: <?php echo $_GET['id'] ?></H3></div>
						<div class="col-xs-4"><H4>DATE</H4></div>
						<div class="col-xs-2"><H4> Sub.1 </H4></div>
						<div class="col-xs-2"><H4> Sub.2 </H4></div>
						<div class="col-xs-2"><H4> Sub.3 </H4></div>
						<div class="col-xs-2"><H4> Sub.4 </H4></div>
					</div>
					<?php
				     while($std = mysqli_fetch_array($select_student_result)) 
					 {   ?>	

					 	<hr style="width: 100%">				

					 	<div class="col-xs-4"> <?php echo $std['dte'] ?> </div>
						<div class="col-xs-2"> <?php if($std['A1']) echo "P"; else echo "A"; ?> </div>
						<div class="col-xs-2"> <?php if($std['A2']) echo "P"; else echo "A"; ?> </div>
						<div class="col-xs-2"> <?php if($std['A3']) echo "P"; else echo "A"; ?> </div>
						<div class="col-xs-2"> <?php if($std['A4']) echo "P"; else echo "A"; ?> </div>
						<?php
					 }
					?>

					<hr style="width: 90%">

				</div>
			</div>
			<?php
			}
			else
			{
			}
		}
		else
		{
		}
	}
?>
</div>
	<?php
	include 'footer.php';
	?>
</body>
</html>


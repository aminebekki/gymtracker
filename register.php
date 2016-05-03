<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$data = $_GET["name"].",".$_GET["age"].",".$_GET["height"].",".$_GET["weight"].",".$_GET["gender"].",".$_GET["activity"].",".$_GET["numberforspeed"].",".$_GET["distance"].",".$_GET["goalonetime"].",".$_GET["distactivity"].",".$_GET["numberfordist"].",".$_GET["distdistance"].",".$_GET["goalonedate"].",".$_GET["liftname"].",".$_GET["numberforweight"].",".$_GET["weightTrain"].",".$_GET["numberforbw"].",".$_GET["bwname"]."\r\n";
		file_put_contents("users.txt", $data, FILE_APPEND);	
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Gym Tracker</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	<script src="js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
</head>

<body>

	<header>
        <nav class="blue darken-4" role="navigation">
          <div class="nav-wrapper container">
            <a href="index.php" class="brand-logo">GymTracker</a>
            <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Home</a></li>
              <li><a href="track.php">Track</a></li>
              <li><a href="register.php">Register</a></li>
            </ul>
            <ul class="side-nav" id="mobile-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="track.php">Track</a></li>
              <li><a href="register.php">Register</a></li>
            </ul>
          </div>
        </nav>
    </header>

	<div class="container">

		<br>

		<div class="row valign-wrapper">
			<div class="col s12 m6">
				<h3>Tell us about yourself!</h3>
				<img class="responsive-img" src="img/runner.jpg" />
			</div>
			<div class="col s12 m6 valign">

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
					<div class="input-field"><label for="name">Name</label> <input type="text" name="name"></div>
					<div class="input-field"><label for="age">Age</label> <input type="text" name="age"></div>
					<div class="input-field"><label for="height">Height</label> <input type="text" name="height"></div>
					<div class="input-field"><label for="weight">Weight</label> <input type="text" name="weight"></div><br>
					Gender: &nbsp;&nbsp; <input type="radio" name="gender" value="male" checked> Male</input> &nbsp;&nbsp;<input type="radio" name="gender" value="female">Female</input> &nbsp;&nbsp; <input type="radio" name="gender" value="other">Other
			</div>
		</div>

		<h2 style="text-align: center">Goals</h2>

		<div class="row">
			<div class="col s12 m6">
				<h4>Cardio</h4>
				<div id="SpeedExample">
					<h5 align="center">Speed</h5>
					<div class="row">
						<div class="col s4 ">
							<select name="activity">
								<option value="walk">Walk</option>
								<option value="run">Run</option>
								<option value="bike">Bike</option>
								<option value="swim">Swim</option>
							</select>
						</div>
						<div class="col s4">
							<input type="text" name="numberforspeed" size="1">
						</div>
						<div class="col s4">
							<select>
								<option value="miles">Miles</option>
								<option value="kilometers">Kilometers</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s4" style="text-align: right">
							in
						</div>
						<div class="col s4">
							<input type="text" size="3" name="goalonetime">
						</div>
						<div class="col s4">
							minutes
						</div>
					</div>
				</div>

				<div id="DistanceExample">
					<h5 align="center">Distance</h5>
					<div class="row">
						<div class="col s4 ">
							<select>
								<option value="walk">Walk</option>
								<option value="run">Run</option>
								<option value="bike">Bike</option>
								<option value="swim">Swim</option>
							</select>
						</div>
						<div class="col s4">
							<input type="text" name="numberfordist" size="1">
						</div>
						<div class="col s4">
							<select>
								<option value="miles">Miles</option>
								<option value="kilometers">Kilometers</option>
							</select>
						</div>
					</div>
						<center>by</center>
						<input type="date" name="goalonedate">
					</p>
				</div>
			</div>
			<div class="col s12 m6">

				<h4>Weights</h4>
				<div id="WeightExample">
					I want to increase my
					<div class="row">
						<div class="col s6 input-field">
							<label for="liftname">Lift name*</label>
							<input type="text" name="liftname" size="8">
						</div>
						<div class="col s1 input-field">
							by
						</div>
						<div class="col s2 input-field">
							<label for="numberforweight">#</label>
							<input type="text" name="numberforweight" size="1">
						</div>
						<div class="col s3 input-field">
							<select>
								<option value="lbs">lbs</option>
								<option value="kg">kg</option>
							</select>
						</div>
					</div>
					<a href="https://en.wikipedia.org/wiki/List_of_weight_training_exercises">*List of recognized lifts</a>
				</div>

				<br><br><br>

				<h4>Body Weight</h4>
				<div id="BWExample">
					I want to be able to do
					<div class="row">
						<div class="col s4 input-field">
							<label for="numberforbw">#</label>
							<input type="text" name="numberforbw" size="1">
						</div>
						<div class="col s8 input-field">
							<label for="bwname">Exercise name</label>
							<input type="text" name="bwname" size="8">
						</div>
					</div>
				</div>

				<input type="submit" value="Submit">
			</form>
			</div>
		</div>

	</div>

</body>

</html>
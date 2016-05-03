<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if($_GET["workoutType"]=="cardio"){
			$data = $_GET["username"].",".$_GET["dayname"].",".$_GET["cardioActivity"].",".$_GET["numberforspeedbuild"].",".$_GET["dist"]."\n";
			file_put_contents("workout.txt", $data, FILE_APPEND);
		}elseif($_GET["workoutType"]=="weight"){
			$data = $_GET["username"].",".$_GET["dayname"].",".$_GET["liftnameweightbuild"].",".$_GET["numberforweightpounds"].",".$_GET["workoutweight"]."\n";
			file_put_contents("workout.txt", $data, FILE_APPEND);
		}elseif($_GET["workoutType"]=="body"){
			$data = $_GET["username"].",".$_GET["dayname"].",".$_GET["numberbodyweightbuild"].",".$_GET["namebodyweightbuild"]."\n";
			file_put_contents("workout.txt", $data, FILE_APPEND);
		}
			
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
    		<div class="col s12 m6 valign">
    			<h3 align="center">Track Today's Workout</h3>
    			<img src="img/race.jpg" class="responsive-img" />
    		</div>
    		<div class="col s12 m6 valign">
	    		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
	    		<div class="input-field">
					<label for="username">Your name</label> <input type="text" name="username">
				</div>
				Select the type of workout you want to add:
				<select name = "workoutType" >
						<option value="cardio">cardio</option>
						<option value="weight">weight training </option>
						<option value="body">body weight</option>
				</select>
				<!--This workout will be called my <input type="text" name="dayname"> day.-->
			</div>
		</div>
		<div class="row">
			<div class="col s12 m4"> 
				<!--Add a cardio workout:
				<select name = "cardioActivity" >
					<option value="walk">Walk</option>
					<option value="run">Run</option>
					<option value="bike">Bike</option>
					<option value="swim">Swim</option>
				</select>
				<input type="text" name="numberforspeedbuild" size="1">
				<select name= "dist">
					<option value="miles">Miles</option>
					<option value="kilometers">Kilometers</option>
				</select>-->
				<h5>Cardio</h5>
					<div class="row">
						<div class="col s4 ">
							<select name="cardioActivity">
								<option value="walk">Walked</option>
								<option value="run">Ran</option>
								<option value="bike">Biked</option>
								<option value="swim">Swam</option>
							</select>
						</div>
						<div class="col s4">
							<input type="text" name="numberforspeedbuild" size="1">
						</div>
						<div class="col s4">
							<select name="dist">
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
							<input type="text" size="3" name="cardiocompletiontime">
						</div>
						<div class="col s4">
							minutes
						</div>
					</div>
				<input type="submit" value="Add Workout">
			</div> 
			<div class="col s12 m4"> 
				<h5>Weight training</h5>
				<!--<input type="text" name="liftnameweightbuild" size="5">
				<input type="text" name="numberforwieghtpounds" size="1">
				<select name = "workoutweight" >
					<option value="lbs">lbs</option>
					<option value="kg">kg</option>
				</select> 
				<input type="text" name="numberforweightpounds" size="1">
				times.
				<input type="submit" value="Add Workout">-->
				<div class="row">
				<div class="col s6 input-field">
					<label for="liftnameweightbuild">Lift name*</label>
					<input type="text" name="liftnameweightbuild" size="8">
				</div>
				<div class="col s3 input-field">
					<label for="numberforweightpounds">#</label>
					<input type="text" name="numberforweightpounds" size="1">
				</div>
				<div class="col s3 input-field">
					<select name="workoutweight">
						<option value="lbs">lbs</option>
						<option value="kg">kg</option>
					</select>
				</div>
			</div>
			<a href="https://en.wikipedia.org/wiki/List_of_weight_training_exercises">*List of recognized lifts</a><br><br>
			<input type="submit" value="Add Workout">
			</div> 
			<div class="col s12 m4"> 
				<h5>Body Weight Exercise</h5>
				<div class="row">
					<div class="col s3">
						<div class="input-field">
							<label for="numberbodyweightbuild">#</label><input type="text" name="numberbodyweightbuild" size="5">
						</div>
					</div>
					<div class="col s9">
						<div class="input-field">
							<label for="namebodyweightbuild">Exercise name</label><input type="text" name="namebodyweightbuild" size="1">
						</div>
					</div>
				</div>
				<input type="submit" value="Add Workout">
			</div>
		</div>
		<!--<div class="row">
			<input type="submit" value="Confirm Day">
		</div>-->
		</form>
    </div>

</body>

</html>
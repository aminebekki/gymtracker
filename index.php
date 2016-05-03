
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
                <div class="card blue lighten-5">
                    <div class="card-content">
                    <span class="card-title">Welcome</span>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                        <input type="name" name="name"></input> <button type="submit">Sign in</button>
                    </form>
                    <p>Your info will appear below:</p>
                        <?php
                            $user = $_GET["name"];
                            $userdata = [];
                            $users = fopen('users.txt','r');
                            while ($line = fgets($users)) {
                                $line = rtrim($line, "\r\n");
                                $tempdata = explode(',',$line);
                                if ($tempdata[0] == $user) {
                                    $userdata = $tempdata;
                                }
                            }
                            fclose($users); ?>
                            <h5><?php echo $userdata[0] ?></h5>
                            <?php echo "Age: ".$userdata[1].", Height: ".$userdata[2].", Weight: ".$userdata[3]." lbs<br>" ?>
                        <?php ?>
                        <br>
                        Your tracked workouts:
                        <br>
                        <?php
                            $workouts = [];
                            $workoutcount = 0;
                            $distanceran = 0;
                            $workoutinfo = fopen('workout.txt','r');
                            echo "<ol>";
                            while ($line = fgets($workoutinfo)) {
                                $line = rtrim($line, "\r\n");
                                $tempdata = explode(',',$line);
                                if ($tempdata[0] == $userdata[0]) {
                                    echo "<li>";
                                    foreach($tempdata as $input) {
                                        echo $input." ";
                                    }
                                    echo "</li>";
                                    $workoutcount += 1;
                                    if ($tempdata[2] == "run") {
                                        $distanceran += $tempdata[3];
                                    }
                                }
                            }
                            echo "</ol>";
                            fclose($workoutinfo); 

                            echo "You have tracked ".$workoutcount." workouts.";
                            echo "<br>You have run ".$distanceran." miles!";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 valign">
                <h5>Your Goals</h5>
                <p>
                    <?php if ($userdata[6]!= null) {
                        echo "Cardio: ".$userdata[5]." ".$userdata[6]." ".$userdata[7]." in ".$userdata[8]." minutes.";
                        } else {
                            echo "You don't have any cardio goals.";
                        }
                    ?>
                </p>
                <p>
                    <?php 
                        if ($userdata[13]!= null) {
                            echo "Weight lifting: ".$userdata[13]." ".$userdata[14]." ".$userdata[15];
                        } else {
                            echo "You don't have any weight lifting goals.";
                        }
                    ?>
                </p>
                <p>
                    <?php 
                        if ($userdata[17] != null) {
                            echo "Body weight: ".$userdata[17]." ".$userdata[16]." times.";
                        } else {
                            echo "You don't have any body weight exercise goals.";
                        }
                    ?>
                </p>
            </div>
        </div>

        <img src="img/banner.jpg" class="responsive-img" />
    </div>

</body>

</html>
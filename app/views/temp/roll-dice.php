<!doctype html>
<html lang="en">
<head>
    <title>Roll Dice</title>
</head>
<body>
	<h1>Youre Guess is: <?php echo $guess; ?></h1>
    <h1>Random number is: <?php echo $rand; ?></h1>
    <h1>
	    <?
	    	if ($guess == $rand) {
	    		echo 'Great Guess, you\'re AWESOME!' . PHP_EOL;
	    	} else {
	    		echo 'You guessed wrong, LOSER!' . PHP_EOL;
	    	}
	    ?>
    </h1>
</body>
</html>
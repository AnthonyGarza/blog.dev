<!doctype html>
<html lang="en">
<head>
    <title>Roll Dice</title>
</head>
<body>
	<h1>Youre Guess is: <?=$guess; ?></h1>
    <h1>Random number is: <?=$rand; ?></h1>
	    <? if ($guess == $rand) : ?>
	    	<h1 style="color:green;">Great Guess, you're AWESOME!</h1>
	    <? else : ?>
	    	<h1 style="color:red;">You guessed wrong, LOSER!</h1>
	    <? endif; ?>
</body>
</html>
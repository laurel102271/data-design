<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Gold Gym Member</title>
	</head>
	<body>
		<p>Steve is a 27 year old male living in El Paso Texas and he is ready to join a Gold Gym due to the fact that he has high blood pressure and is a little overweight.. Steve has set up a appointment to sign up to the gym and is ready to start his training classes and to pay for his membership.On arrival Steve meets with a personal trainer and they go over his weight goals and come up with a game plan to set a date of acheiving his goal.Steve seems to be highly motivated and he starts to discuss the membership fees and also the class training schedule.Upon discussing this further with the personal trainer Steve decides to join Gold Gym on the spot. </p>
		<h2>Conceptual Model</h2><br>
		<h4>Member Entity</h4>
		<ul>
			<li>memberid primary key</li>
			<li>memberlastName</li>
			<li>memberfirstName</li>
			<li>memberstreet</li>
			<li>membercity</li>
			<li>memberstate</li>
			<li>memberzip</li>
			<li>member fee</li>
		</ul>
		<h4> Training </h4>
		<ul>
			<li>trainingid primary key</li>
			<li>trainingDays</li>
			<li>costoftraining</li>
			<li>trainingtime</li>
		</ul>
		<h2>Relations</h2>
		<ul>
			<li>One Member can take many Training sessions 1-n</li>
			<li>Many Members can take many Training sessions m-n</li>
		</ul>

	</body>
	</html>
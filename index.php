<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Gold Gym Member</title>
	</head>
	<body>
		<p>Steve is a 27 year old male living in El Paso Texas and he is ready to join a Gold Gym. Steve has set up a appointment to sign up to the gym and is ready to start his training classes and to pay for his membership.</p>
		<h2>Conceptual Model</h2>
		<ul>
			<li>memberid primary key</li>
			<li>lastName</li>
			<li>firstName</li>
			<li>street</li>
			<li>city</li>
			<li>state</li>
			<li>zip</li>
		</ul>
		<h2>Class</h2>
		<ul>
			<li>classid primary key</li>
			<li>staffid foreign key</li>
			<li>classDays</li>
			<li>classTime</li>
		</ul>
		<h2>Relations</h2>
		<ul>
			<li>One Member can take many Classes 1-n</li>
			<li>Many Members can take many Classes m-n</li>
		</ul>

	</body>
	</html>
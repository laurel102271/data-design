<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Gold Gym Member</title>
	</head>
	<body>
		<H1>Data Design Project</H1>
		<h2>Persona,User Story,User Case and Interaction Flow</h2>
		<h3>Persona</h3>
		<div>
		<p>
		<li><strong>Name:</strong>Steve Orozco</li>
		<li><strong>Personality:</strong> Outgoing very positive attitude towrads life.</li>
		<li><strong>Gender:</strong> Male</li>
		<li><strong>Age:</strong>27</li>
		<li><strong>Technology:</strong> Computer knowledge in Windows, and Android. No mac</li>
		<li><strong>Device:</strong> Samsung Note 8, HP Envy x360 Convertible Laptop</li>
		<li><strong>Proficiency:</strong> Highly skilled in all technology, and fast learner.</li>
		<li><strong>Likes/Dislikes:</strong> Like to be around peaple but dislikes negative peaple and being alone.</li>
		</div>
		<li><strong>Attitudes and Needs:</strong>Positive attitude and wants to lose weight</li>
		<li><strong>What need does this person have?</strong> To be able to lose weight in a contolled manner.</li>
		</P>
		<h3>User Story</h3>
		<li>As a member of a gym I plan on losing weight and talking to other members.</li>
		<p>
		<h3>User Case</h3>
		<li><strong>Title:</strong> Gym Member</li>
		<li><strong>Name of the user, or persona, and their role:</strong> Steve Orozco a gym member</li>
		<li><strong>Usage Preconditions:</strong> Steve needs to join the gym and lose weight.</li>
		<li><strong>Usage Postconditions:</strong> Steve will lose weight and feel great.</li>
		<li><strong>Frequency of Use:</strong> Three-times-week</li>
		</p>
		<h3>Interaction Flow</h3>
		<p>
		<li>User Action 1: Steve signs up for a membership and enters his email and creates a username.</li>
		<li>System Response 1: Gold Gym sends confirmation email with activation link </li>
		<li>User Action 2: Steve clicks on activation link and is now able to sign in.</li>
		<li>System Response 2: Gold Gym displays a  message saying Steve is signed up. </li>
		</p>
		<p>
		<h2>Conceptual Model</h2><br>
		<h4>Member Entity</h4>
		<ul>
			<li>memberID PrimaryKey</li>
			<li>memberLastName</li>
			<li>memberFirstName</li>
			<li>memberStreet</li>
			<li>memberState</li>
			<li>memberZip</li>
		</ul>
		<h4>Instuctor Entity</h4>
		<ul>
		<li>instructorID PimaryKey</li>
		<li>instructorFirstName</li>
		<li>instructorLastName</li>
		<li>instructorPhoneNumber</li>
		</ul>
		<h4> Training Entity </h4>
		<ul>
			<li>trainingID PrimaryKey </li>
			<li>trainingMemberID Foreignkey </li>
			<li>trainingInstructorID ForeignKey</li>
			<li>trainingDays</li>
			<li>trainingcostofTraining</li>
			<li>trainingTime</li>
		</ul>
		<h2>Relations</h2>
		<ul>
			<li>One Member can take many Training sessions 1-n</li>
			<li>Many Members can take many Training sessions m-n</li>
			<li>One Instuctor can train many members 1-m</li>
		</ul>


	</body>
	</html>
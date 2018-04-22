ALTER DATABASE your_database_name_CHANGE_ME CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS `member`;
DROP TABLE IF EXISTS Instructor;
DROP TABLE IF EXISTS training;


CREATE TABLE member (
	memberId BINARY(16) NOT NULL,
	memberlastName VARCHAR(32),
	memberFirstName VARCHAR(32) NOT NULL,
	memberStreet VARCHAR(128) NOT NULL,
	memberState VARCHAR(97) NOT NULL,
	memberzip VARCHAR(6),
	UNIQUE(memberId),
	PRIMARY KEY(memberId)
);


CREATE TABLE `instructor` (
	instructorId BINARY(16) NOT NULL,
	instructorLastName VARCHAR (12)NOT NULL,
	InstructorFirstNameId BINARY(16) NOT NULL,
	InstructorLastName VARCHAR(12) NOT NULL,
	PRIMARY KEY(instructorId)
);
CREATE TABLE trainig (
	trainigId BINARY(16) NOT NULL,
	trainigMemberId BINARY(16) NOT NULL,
	trainingInstructorId BINARY(16) NOT NULL,
	trainigDays VARCHAR(7) NOT NULL,
	INDEX(trainingMemberId),
	INDEX(trainigInstructorId),
	FOREIGN KEY(trainingMemberId) REFERENCES member(memberId),
	FOREIGN KEY (trainigInstructorId) REFERENCES training (trainigId)
	PRIMARY KEY(trainingId)
);
ALTER DATABASE dmartinez633 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS training;
DROP TABLE IF EXISTS Instructor;
DROP TABLE IF EXISTS member;


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


CREATE TABLE instructor (
	instructorId BINARY(16) NOT NULL,
	InstructorFirstNameId BINARY(16) NOT NULL,
	InstructorLastName VARCHAR(12) NOT NULL,
	PRIMARY KEY(instructorId)
);
CREATE TABLE trainig (
	trainingId BINARY(16) NOT NULL,
	trainingMemberId BINARY(16) NOT NULL,
	trainingInstructorId BINARY(16) NOT NULL,
	trainigDays VARCHAR(7) NOT NULL,
	INDEX(trainingMemberId),
	INDEX(trainingInstructorId),
	FOREIGN KEY(trainingMemberId) REFERENCES member(memberId),
	FOREIGN KEY (trainingInstructorId) REFERENCES training (trainigId)
	PRIMARY KEY(trainingId)
);
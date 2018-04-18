 CREATE TABLE profile (
	memberId BINARY(16) NOT NULL,
	memberlastname CHAR(32),
	memberfirstname VARCHAR(32) NOT NULL,
	memberstate VARCHAR(128) NOT NULL,
	membercity CHAR(97) NOT NULL,
	memberzip VARCHAR(32),
	UNIQUE(profileAtHandle),
	UNIQUE(profileEmail),
	PRIMARY KEY(profileId)
);

   CREATE TABLE tweet (
	trainingId BINARY(16) NOT NULL,
	Id BINARY(16) NOT NULL,
	Content VARCHAR(140) NOT NULL,
	Date DATETIME(6) NOT NULL,
	INDEX(tweetProfileId),
-FOREIGN KEY(ProfileId) REFERENCES profile(profileId),
	PRIMARY KEY(tweetId)
);

CREATE TABLE `like` (
likeProfileId BINARY(16) NOT NULL,
	likeTweetId BINARY(16) NOT NULL,
	likeDate DATETIME(6) NOT NULL,
	INDEX(likeProfileId),
	INDEX(likeTweetId),
	FOREIGN KEY(likeProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(likeTweetId) REFERENCES tweet(tweetId),
	-- finally, create a composite foreign key with the two foreign keys
	PRIMARY KEY(likeProfileId, likeTweetId)
);
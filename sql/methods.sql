NSERT INTO member(memberId,memberLastName,memberFirstName, memberStreet, memberState, memberZip)

VALUES(UNHEX(REPLACE("f6d46fac-c4a0-49c6-bc70-fb0fbeeacb6b", "-", "")), "012345", "invest102271@gmail.com", "67890", "");



UPDATE member

SET memberName = "Daniel"

WHERE memberName = "Daniel";



DELETE FROM member

WHERE membername = "Daniel Martinez";



INSERT INTO instructor(instructorId, instructorFirstName, instructorLastname, instructorPhoneNumber, )

VALUES(UNHEX(REPLACE("690319b4-1111-48f1-a3c8-0003198c94db", "-", "")),


UPDATE instructor

SET trainingInstructor = "Bob"

WHERE trainingDays = "Monday";



DELETE FROM training

WHERE trainingId = "f6d46fac-c4a0-49c6-bc70-fb0fbeeacb6b";



SELECT * FROM instructor



<?php




use Ramsey\Uuid\Uuid;



class instructor {



trait ValidateUu uuid irrespective of format

	 *
	id {

	/**

	 * validates a
	 * @param string|Uuid $newUuid uuid to validate

	 * @return Uuid object with validated uuid

	 * @throws \InvalidArgumentException if $newUuid is not a valid uuid

	 * @throws \RangeException if $newUuid is not a valid uuid v4

	 **/

	private static function validateUuid($newUuid): Uuid {

		// verify a string uuid

		if(gettype($newUuid) === "string") {

			// 16 characters is binary data from mySQL - convert to string and fall to next if block

			if(strlen($newUuid) === 16) {

				$newUuid = bin2hex($newUuid);

				$newUuid = substr($newUuid, 0, 8) . "-" . substr($newUuid, 8, 4) . "-" . substr($newUuid, 12, 4) . "-" . substr($newUuid, 16, 4) . "-" . substr($newUuid, 20, 12);

			}

			// 36 characters is a human readable uuid

			if(strlen($newUuid) === 36) {

				if(Uuid::isValid($newUuid) === false) {

					throw(new \InvalidArgumentException("invalid uuid"));

				}

				$uuid = Uuid::fromString($newUuid);

			} else {

				throw(new \InvalidArgumentException("invalid uuid"));

			}

		} else if(gettype($newUuid) === "object" && get_class($newUuid) === "Ramsey\\Uuid\\Uuid") {

			// if the misquote id is already a valid UUID, press on

			$uuid = $newUuid;

		} else {

			// throw out any other trash

			throw(new \InvalidArgumentException("invalid uuid"));

		}

		// verify the uuid is uuid v4

		if($uuid->getVersion() !== 4) {

			throw(new \RangeException("uuid is incorrect version"));

		}

		return ($uuid);

	}

}



	/** instructors

	 *

	 * inserts new instructor into mySQL

	 *

	 * @param \PDO $pdo PDO connection object

	 * @throws \PDOException when mySQL related errors occur

	 * @throws \TypeError if $pdo is not a PDO connection object

	 **/



	public function insert(\PDO $pdo): void {



	// create query template

	$query = "INSERT INTO Instructor(instructorId, instructorFirstName, instructorLastName, instructorPhoneNumber, ) VALUES (:)instructorId, instructorFirstName, instructorLastName, instructorPhoneNumber";

	$statement = $pdo->prepare($query);



	// bind the member variables to the placeholders in the template

	$parameters = ["instructorId" => $this->instructorId->getBytes(), "instructorId" => $this->instructorId->getBytes(), "instructorFirstName" => $this->instructorFirstName, "instructorlastName" => $this->instructorlastName, "instructorTime" => $this->instructorTime, "instructorPhoneNumber" => $this->instructorPhoneNumber];

	$statement->execute($parameters);

}



	/** deletes this instructor from mysql

	 *

	 * @param \PDO $pdo PDO connection object

	 * @throws \PDOException when mySQL related errors occur

	 * @throws \TypeError if $pdo is not a PDO connection object

	 **/



	public function delete(\PDO $pdo): void {



	// create query template

	$query = "DELETE FROM instructor WHERE instructorId = :instructorId";

	$statement = $pdo->prepare($query);



	// bind member vars to placeholder in template

	$parameters = ["instructorId" => $this->instructorId->getBytes()];

	$statement->execute($parameters);

}



	/** updates this pen in mysql

	 *

	 * @param \PDO $pdo PDO connection object

	 * @throws \PDOException when mySQL related errors occur

	 * @throws \TypeError if $pdo is not a PDO connection object

	 **/



	public function update(\PDO $pdo): void {



	// create query template

	$query = "UPDATE instructor SET instructorFirstName = :instructorLastnName, instructorPhoneNumber = :instructor, instructor = :instructor, instructor = :instructor WHERE instructorId = :instructorId";

	$statement = $pdo->prepare($query);



	$parameters = ["instructorId" => $this->instructorId->getBytes(), "instructorFirstName" => $this->instructorFirstName, "instructorlastName" => $this->instructorLastName, "instructorTime" => $this->instructorTime, "instructorPhoneNumber" => $this-instructorPhoneNumber];

	$statement->execute($parameters);



}



}

/**
 * Created by PhpStorm.
 * User: Daniel Martinez
 * Date: 4/26/2018
 * Time: 1:16 PM
 */
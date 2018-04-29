<?php
// temp fix
require_once ("ValidateUuid.php");
use Ramsey\Uuid\Uuid;


/**

 * This is the primary profile type for memebers

 *

 * This profile is a small example of Gold Gym Members

 *

 * @author Daniel Martinez invest102271@gmail.com

 * @version 1.0.0

 *

 **/

class member implements \JsonSerializable {

	use \ValidateUuid;

	/**

	 * id for this member; this is the primary key

	 *

	 * @var Uuid $memberId

	 *

	 **/

	protected $memberId;

	/**

	 * members last name at Golds Gym
	 *

	 * @var varchar(32) $memberLastName

	 **/

	protected $memberLastName;



	/**
	 * Golds Gym member firstname
	 * @var varchar(32)$memberFirstName
	 **/

	protected $memberFirstname;



	/**

	 * This is members street name

	 * @var varchar(32) $memberStreet

	 **/

	protected $memberStreet;


	/**

	 * This is members State
	 * @var varchar()32 $memberState

	 **/

	protected $memberState;



	/**

	 * The members zip code

	 * @var string $memberZip

	 **/

	protected $memberZip;



	/**

	 *

	 * Constructor for this member

	 *

	 * Takes an argument of an array. Within the array arguments can

	 *

	 * @param string|Uuid $newmemberId of member

	 * @param string|null $newmemberLastName A string containing the member last name

	 * @param string $newmemberFirstName providing member first name

	 * @param int $newmemberStreet containing the member street

	 * @param string|null $newmemberState the state of member

	 * @param string $newmemberZip a string containg the member zip

	 * @throws \InvalidArgumentException if data types are not valid

	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)

	 * @throws \TypeError if data types violate type hints

	 * @throws \Exception if some other exception occurs

	 **/



	public function __construct(string $newmemberId, string $newmemberLastName, string $newmemberFirstName, string $newmemberStreet,

										 string $newmemberState, string $newmemberZip) {

		try {

			$this->setmemberId($newmemberId);

			$this->setmemberLastName($newmemberLastName);

			$this->setmemberFirstName($newmemberFirstName);

			$this->setmemberStreet($newmemberStreet);

			$this->setmemberState($newmemberState);

			$this->setmemberZip($newmemberZip);

		} //identify thrown exceptions

		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {

			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));

		}

	}





	/**

	 * Fetches the members ID from mySQL,

	 *

	 * @return Uuid

	 */

	public function getmemberId(): Uuid {

		return ($this->memberId);

	}



	/**

	 * Sets the members primary key/ Id number

	 *

	 * @param Uuid $memberId

	 * @throws \InvalidArgumentException if data types are not valid

	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)

	 * @throws \TypeError if data types violate type hints

	 * @throws \Exception if some other exception occurs

	 */

	public function setmemberId($memberId): void {

		try {

			$uuid = self::validateUuid($memberId);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {

			$exceptionType = get_class($exception);

			throw new $exceptionType($exception->getMessage(), 0, $exception);

		}



		$this->memberId = $uuid;

	}



	/**

	 * accessor method for member last name

	 *

	 * @return string

	 */

	public function getmeberLastName(): string {

		return ($this->memberLastName);

	}



	/**

	 *Sets the sanitized member last name.

	 *

	 * @param string $newmemberLastName

	 */

	public function setmemberLastName(string $newmemberLastName): void {

		$newmemberLastName = trim($newmemberLastName);

		$newmemberLastName = filter_var($newmemberLastName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if (empty($newmemberLastName) === true) {

			echo "No memberLastName";

		}

		if (strlen($newmemberLastName > 140) === true) {

			echo "This member last name is spanish  (as in 140 characters).";

		}

		$this->memberLastName = $newmemberLastName;

	}



	/**

	 * accessor method for member firstname

	 *

	 * @return string

	 */

	public function getmemberFirstName(): string {

		return ($this->memberFirstName);

	}





	/**

	 * inserts the member first name in mySQL

	 *

	 * @param string $newmemberFirstName

	 * @throws \InvalidArgumentException if $newmemberFirstName is not a valid  or insecure

	 * @throws \RangeException if $newFirstName is > 128 characters

	 * @throws \TypeError if $newFirstname is not a string

	 */

	public function setmemberFirstName(string $newmemberFirstName): void {

		$memberFirstName = (trim($newmemberFirstName));

		$memberFirstName = filter_var($memberFirstName, FILTER_VALIDATE_EMAIL);

		//validate firstname

		if(empty($memberFirstName) === true) {

			throw (new \InvalidArgumentException("Sorry,'$memberFirstName' doesn't seem to work."));

		}

		//check string length

		if(strlen($memberFirstName) > 128) {

			throw (new \RangeException("Sorry, '$memberFirstName' contains too many characters"));

		}

		//store email string

		$this->memberFirstNameauthorEmail = $newmemberFirstName;

	}







	/**

	 *

	 * Returns the members profile

	 *

	 * @return string

	 */

	public function getmemberStreet(): string {

		return ($this->memberStreet);

	}



	/**

	 *

	 * Mutator method for the members profile .

	 *

	 *
	 *

	 * @param string $newmemberStreet

	 * @throws \InvalidArgumentException if the hash is not secure

	 * @throws \RangeException if the hash is not 87 characters

	 * @throws \TypeError if profile member is not a string

	 */



	public function setmemberStreet(string $newmemberStreet): void {

		//enforce that the hash is properly formatted

		$newmemberStreet = trim($newmemberStreet);

		$newmemberStreet = strtolower($newmemberStreet);

		if(empty($newmemberStreet) === true) {

			throw(new \InvalidArgumentException("member street empty or insecure"));

		}

		//enforce that the member is a string representation of a hexadecimal

		if(!ctype_xdigit($newmemberStreet)) {

			throw(new \InvalidArgumentException("profile password hash is empty or insecure"));

		}

		//enforce that the hash is exactly 97 characters.

		if(strlen($newmemberStreet) !== 97) {

			throw(new \RangeException("profile hash must be 128 characters"));

		}

		//store the hash

		$this->memberStreet = $newmemberStreet;

	}



	/**

	 *

	 * Return a memberState

	 *

	 * @return string

	 */

	public function getmemberState(): string {

		return ($this->memberState);

	}



	/**

	 * Validates and sanitizes memberState data

	 *

	 * @param string $memberState

	 */

	public function setmemberState(string $memberState): void {

		$this->memberState = $memberState;

	}



	/**

	 * Accessor for the members name.

	 *

	 * @return string

	 */

	public function getmemberZip(): string {

		return ($this->memberZip);

	}



	/**

	 * Sanitizes, Validates members name string

	 *

	 * @param string $newmemberZip

	 * @throw \InvalidArgumentException if $newmemberZip is not a valid object or string

	 * @throw \RangeException if $newmemberZip is > 32 characters

	 */

	public function setmemberZip(string $newmemberZip): void {

		$newmemberZip = trim($newmemberZip);

		$newAmemberZip = filter_var($newmemberZip, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);



		if(empty($newmemberZip) === true) {

			throw (new \InvalidArgumentException("Sorry,'$newmemberZip' doesn't seem to work."));

		}

		//check string length

		if(strlen($newmemberZip) > 32) {

			throw (new \RangeException("Sorry, '$newmemberZip' contains too many characters."));

		}



		$this->authorEmail = $newmemberZip;

	}





	/**

	 * Inserts this Member into mySQL

	 *

	 * @param \PDO $pdo PDO connection object

	 * @throws \PDOException when mySQL related error occurs

	 * @throws \TypeError if $pdo is not a PDO connection object

	 **/





	public function insert(\PDO $pdo) : void {

		//query template

		$query = "INSERT INTO member(memberId, memberLastName, memberFirstName, memberStreet, memberState, memberzip) VALUES (:memberId, :memberLastName, :memberFirstName, :memberStreet, :memberState, :memberZip)";

		$statement = $pdo->prepare($query);



		// bind the member variables to the place holder template

		$parameters = ["memberId" => $this->memberId->getBytes(), "memberLastName" => $this->memberLastName, "memberFirstName" =>

			$this->memberFirstname, "memberState" => $this->memberState, "memberZip" => $this->memberZip];

		$statement->execute($parameters);

	}





	/**

	 *

	 * Delete this Author from mySQL

	 *

	 * @param PDO $pdo PDO connection object

	 * @throws \PDOException when mySQL related errors occur

	 * @throws \TypeError if $pdo is not a PDO connection object

	 */

	public function delete(\PDO $pdo) : void {



		// create query template

		$query = "DELETE FROM member WHERE memberId = :memberId";

		$statement = $pdo->prepare($query);



		// bind the member variables to the place holder in the template

		$parameters = ["memberId" => $this->memberId->getBytes()];

		$statement->execute($parameters);

	}



	/**

	 * updates this Author in mySQL

	 *

	 * @param \PDO $pdo PDO connection object

	 * @throws \PDOException when mySQL related errors occur

	 * @throws \TypeError if $pdo is not a PDO connection object

	 **/

	public function update(\PDO $pdo) : void {



		// create query template

		$query = "UPDATE member SET memberId = :memberId, memberlastName = :memberLastName, memberFirstName = :memberFirstName, memberStreet = :memberStreet, memberState = :memberState,  WHERE memberId = :memberId";

		$statement = $pdo->prepare($query);







		$parameters = ["memberId" => $this->memberId->getBytes(),"memberLastName" => $this->memberLastName, "memberFirstName" =>

			$this->memberFirstname, "memberStreet" => $this->memberStreet->getBytes(), "memberState" => $this->memberState, "memberName" => $this->memberName ];

		$statement->execute($parameters);

	}



	public function jsonSerialize() :array {

		$fields = get_object_vars($this);

		unset($fields["memberId"]);

		unset($fields["memberStreet"]);



		$fields["memberId"] = $this->memberId->toString();

		return ($fields);

	}



}








/**
 * Created by PhpStorm.
 * User: Daniel Martinez
 * Date: 4/26/2018
 * Time: 1:16 PM
 */

	public function insert(\PDO $pdo) : void {

		// create query template
		$query = "INSERT INTO member(memberId,memberProfileId, ) VALUES(:memberId, :memberProfileId, )";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["memberId" => $this->memberId->getBytes(), "memberProfileId" => $this->memberProfileId->getBytes(),
		$statement->execute($parameters);
	}


	public function delete(\PDO $pdo) : void {

		// create query template
		$query = "DELETE FROM member WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["memberId" => $this->memberId->getBytes()];
		$statement->execute($parameters);
	}


	public function update(\PDO $pdo) : void {

		// create query template
		$query = "UPDATE tweet SET memberProfileId = :memberProfileId, membername = :membername,  = : WHERE memberId = :memberId";
		$statement = $pdo->prepare($query);


		$parameters = ["memberId" => $this->memberId->getBytes(),"memberProfileId" => $this->memberProfileId->getBytes();
		$statement->execute($parameters);

<?php<?php

namespace Edu\Cnm\DataDesign;

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class Member  {
	use ValidateUuid;
	private $memberId;
	private $profileAtHandle;
	private $profileActivationToken;

	private $profileEmail;
	private $profileHash;

	private $profilePhone;

	private $profileSalt;


	public function getProfileId(): Uuid {
		return ($this->profileId);
	}
	public function setProfileId( $newProfileId): void {
		try {
			$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		$this->profileId = $uuid;
	}

	public function getProfileActivationToken() : ?string {
		return ($this->profileActivationToken);
	}

	public function setProfileActivationToken(?string $newProfileActivationToken): void {
		if($newProfileActivationToken === null) {
			$this->profileActivationToken = null;
			return;
		}
		$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
		if(ctype_xdigit($newProfileActivationToken) === false) {
			throw(new\RangeException("user activation is not valid"));
		}

		if(strlen($newProfileActivationToken) !== 32) {
			throw(new\RangeException("user activation token has to be 32"));
		}
		$this->profileActivationToken = $newProfileActivationToken;
	}

	public function getProfileAtHandle(): string {
		return ($this->profileAtHandle);
	}

	public function setProfileAtHandle(string $newProfileAtHandle) : void {

		$newProfileAtHandle = trim($newProfileAtHandle);
		$newProfileAtHandle = filter_var($newProfileAtHandle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileAtHandle) === true) {
			throw(new \InvalidArgumentException("profile at handle is empty or insecure"));
		}

		if(strlen($newProfileAtHandle) > 32) {
			throw(new \RangeException("profile at handle is too large"));
		}

		$this->profileAtHandle = $newProfileAtHandle;
	}

	public function getProfileEmail(): string {
		return $this->profileEmail;
	}

	public function setProfileEmail(string $newProfileEmail): void {

		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("profile email is empty or insecure"));
		}

		if(strlen($newProfileEmail) > 128) {
			throw(new \RangeException("profile email is too large"));
		}

		$this->profileEmail = $newProfileEmail;
	}

	public function getProfileHash(): string {
		return $this->profileHash;
	}
	/ewProfileHash) !== 128) {
			throw(new \RangeException("profile hash must be 128 characters"));
		}

		$this->profileHash = $newProfileHash;
	}
	public function getProfilePhone(): ?string {
		return ($this->profilePhone);
	}

	public function setProfilePhone(?string $newProfilePhone): void {
		if($newProfilePhone === null) {
			$this->profilePhone = null;
			return;
		}

		$newProfilePhone = trim($newProfilePhone);
		$newProfilePhone = filter_var($newProfilePhone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfilePhone) === true) {
			throw(new \InvalidArgumentException("profile phone is empty or insecure"));
		}

		if(strlen($newProfilePhone) > 32) {
			throw(new \RangeException("profile phone is too large"));
		}

		$this->profilePhone = $newProfilePhone;
	}

	public function getProfileSalt(): string {
		return $this->profileSalt;
	}

	 * mutator method for profile salt
	 *
	 * @
	public function setProfileSalt(string $newProfileSalt): void {

		$newProfileSalt = trim($newProfileSalt);
		$newProfileSalt = strtolower($newProfileSalt);

		if(!ctype_xdigit($newProfileSalt)) {
			throw(new \InvalidArgumentException("profile password hash is empty or insecure"));
		}

		if(strlen($newProfileSalt) !== 64) {
			throw(new \RangeException("profile salt must be 128 characters"));
		}

		$this->profileSalt = $newProfileSalt;
	}

/**
 * Created by PhpStorm.
 * User: Daniel Martinez
 * Date: 4/24/2018
 * Time: 4:01 PM
 */
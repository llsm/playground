<?php

namespace App\Models;

/**
 * Description of Users
 *
 * @author LLSM
 */
class Users extends Base implements \Nette\Security\IAuthenticator {

	private function base() {
		return $this->connection->select('[users].*')
						->from('[users]');
	}

	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials) {
		list($username, $password) = $credentials;

		$row = $this->base()->where('[users].[username] = %s', $username)->fetch();

		if (!$row) {
			throw new \Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		} elseif (!\Nette\Security\Passwords::verify($password, $row->password)) {
			throw new \Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		} elseif (\Nette\Security\Passwords::needsRehash($row->password)) {
			$this->updatePassword($row->id, $password);
		}

		$arr = $row->toArray();
		unset($arr['password']);
		return new \Nette\Security\Identity($row->id, $row->role, $arr);
	}

	public function add($username, $password, $role = 'user') {
		try {
			return $this->connection->insert('users', array(
						'username' => $username,
						'password' => \Nette\Security\Passwords::hash($password),
						'role' => $role
					))->execute();
		} catch (\DibiException $exc) {
			throw new \DuplicateNameException;
		}
	}

	public function updatePassword($id, $password) {
		return $this->connection->update('users', array(
							'password' => \Nette\Security\Passwords::hash($password)
						))->where('[id] = %i', $id)
						->execute();
	}

}

<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;


/**
 * Users management.
 */
final class UserFacade implements Nette\Security\Authenticator
{
	public const PasswordMinLength = 7;

	private const
		TableName = 'users',
		ColumnId = 'id',
		ColumnName = 'username',
		ColumnPasswordHash = 'password',
		ColumnEmail = 'email',
		ColumnRole = 'role';


	public function __construct(
		private Nette\Database\Explorer $database,
		private Passwords $passwords,
	) {
	}
	public function getAll()
	{
		return $this->database
			->table('users')
			->order('id ASC');
	}
	
	public function getById(int $id)
	{
		return $this->database->table('users')->get($id);
	}


	public function delete(int $id){
		$this->getById($id)->delete();
	}

	public function editUser(int $id, $data): void
    {
        $user_item = $this->database->table('users')->get($id);

        if (!$user_item) {
            throw new \Exception("Uživatel s ID $id neexistuje.");
        }
		$user_item->update($data);
		$user_item->update([
			self::ColumnPasswordHash => $this->passwords->hash($data['password']),
		]);
    }

	public function changeRole(int $id, string $role) {
		$user_item = $this->getById($id);
		$user_item->update();
	}

    public function getUserByUsername(string $username)
    {
        // Zkusíme najít uživatele podle uživatelského jména
        return $this->database->table('users')->where('username', $username)->fetch();
    }

	/**
	 * Performs an authentication.
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(string $username, string $password): Nette\Security\SimpleIdentity
	{
		$row = $this->database->table(self::TableName)
			->where(self::ColumnName, $username)
			->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);

		} elseif (!$this->passwords->verify($password, $row[self::ColumnPasswordHash])) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);

		} elseif ($this->passwords->needsRehash($row[self::ColumnPasswordHash])) {
			$row->update([
				self::ColumnPasswordHash => $this->passwords->hash($password),
			]);
		}

		$arr = $row->toArray();
		unset($arr[self::ColumnPasswordHash]);
		return new Nette\Security\SimpleIdentity($row[self::ColumnId], $row[self::ColumnRole], $arr);
	}


	/**
	 * Adds new user.
	 * @throws DuplicateNameException
	 */
	public function add(string $username, string $email, string $password): void
	{
		Nette\Utils\Validators::assert($email, 'email');
		try {
			$this->database->table(self::TableName)->insert([
				self::ColumnName => $username,
				self::ColumnPasswordHash => $this->passwords->hash($password),
				self::ColumnEmail => $email,
			]);
		} catch (Nette\Database\UniqueConstraintViolationException $e) {
			throw new DuplicateNameException;
		}
	}

	
}


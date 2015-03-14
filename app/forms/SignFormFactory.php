<?php

namespace App\Forms;

class SignFormFactory extends \Nette\Object {

	/** @var \Nette\Security\User */
	private $user;

	public function __construct(\Nette\Security\User $user) {
		$this->user = $user;
	}

	/**
	 * @return \Nette\Application\UI\Form
	 */
	public function create() {
		$form = new \Nette\Application\UI\Form;
		$form->addText('username', 'Jméno:')
				->setRequired('Zadejte uživatelské jméno');

		$form->addPassword('password', 'Heslo')
				->setRequired('Zadejte heslo');

		$form->addCheckbox('remember', 'Udržovat přihlášení trvale');

		$form->addSubmit('send', 'Sign in');
		
		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}

	public function formSucceeded($form, $values) {
		if ($values->remember) {
			$this->user->setExpiration('30 days', FALSE);
		} else {
			$this->user->setExpiration('30 minutes', TRUE);
		}

		try {
			$this->user->login($values->username, $values->password);
		} catch (\Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}

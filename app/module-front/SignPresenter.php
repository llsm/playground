<?php

namespace App\FrontModule\Presenters;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter {

	/** @var \App\Forms\SignFormFactory @inject */
	public $factory;

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm() {
		$form = $this->factory->create();
		$form->onSuccess[] = function ($form) {
			$form->getPresenter()->redirect(':Front:Homepage:');
		};
		return $form;
	}

	public function actionOut() {
		$this->getUser()->logout();
		$this->flashMessage('Byl/a jste odhlášen/a');
		$this->redirect(':Front:Homepage:');
	}

}

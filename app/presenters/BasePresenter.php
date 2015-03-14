<?php

namespace App\Presenters;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter {
	
	public function beforeRender() {
		parent::beforeRender();
		$this->template->user = $this->user;
	}
}

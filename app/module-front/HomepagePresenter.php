<?php

namespace App\FrontModule\Presenters;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends \App\Presenters\BasePresenter {

	public function renderDefault() {
		$this->template->anyVariable = 'any value';
	}

}

<?php

namespace App\AdminModule\Presenters;

abstract class BasePresenter extends \App\Presenters\BasePresenter {
	
	/** @var \App\Models\Acl @inject */
	public $acl;
	
	public function startup() {
		parent::startup();
		
		//kick unlogged
		if(!$this->user->isLoggedIn()) {
			$this->flashMessage('You have to sign in to see this one', 'error');
			$this->redirect(':Front:Sign:in');
		}
		
		//add to database automatically in debugger mode
		if(!\Tracy\Debugger::$productionMode) {
			$res = $this->checkResource($this->getName());
			$pri = $this->checkPrivilege($this->getAction());
			
			//start from beginning if new acl component was added
			if(!$res || !$pri) {
				$this->redirect('this');
			}
		}
		
		//check permission
		if(!$this->user->isAllowed($this->getName(), $this->getAction())) {
			$this->flashMessage('You do not have permission to see this one', 'error');
			$this->redirect(':Front:Sign:in');
		}
		
		//check signal permission
		dump($this->getSignal());
	}
	
	protected function checkResource($name) {
		$res = $this->acl->getResource($name);
		if(!$res) {
			$this->acl->addResource($name);
			return FALSE;
		}
		return TRUE;
	}
	
	protected function checkPrivilege($name) {
		$res = $this->acl->getPrivilege($name);
		if(!$res) {
			$this->acl->addPrivilege($name);
			return FALSE;
		}
		return TRUE;
	}
}

<?php

namespace App;

class AclFactory {

	/**
	 * @return \Nette\Security\IAuthorizator
	 */
	public static function create(Models\Acl $model) {

		$permission = new \Nette\Security\Permission();
		
		foreach ($model->getRoles() as $role) {
			$permission->addRole($role->name, $role->parent_name);
		}

		foreach ($model->getResources() as $resource) {
			$permission->addResource($resource->name);
		}

		foreach ($model->getRules() as $rule) {
			$permission->{$rule->allowed == 'Y' ? 'allow' : 'deny'}($rule->role, $rule->resource, $rule->privilege);
		}

		return $permission;
	}

}

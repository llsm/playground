<?php

namespace App\Models;

/**
 * Access Control List model. Working with acl_roles, acl_resources a acl_privileges
 *
 * @author LLSM
 */
class Acl extends Base { 
	
	public function getRoles() {
		return $this->connection
				->select('[acl_roles].[name]')
				->select('[acl_roles2].[name]')->as('parent_name')
				->from('[acl_roles]')
				->leftJoin('[acl_roles] [acl_roles2]')->on('[acl_roles].[id_acl_roles] = [acl_roles2].[id]')
				->orderBy('[acl_roles].[id_acl_roles] ASC');
	}

	public function getResource($name) {
        return $this->getResources()
				->where('[name] = %s', $name)
				->fetch();
    }

	public function getResources() {
        return $this->connection
				->select('*')
				->from('[acl_resources]');
    }
	
	public function getPrivilege($name) {
        return $this->getPrivileges()
				->where('[name] = %s', $name)
				->fetch();
    }
	
	public function getPrivileges() {
        return $this->connection
				->select('*')
				->from('[acl_privileges]');
    }
	
    public function getRules() {
        return $this->connection
				->select('[acl].[allowed]')
				->select('[acl_roles].[name]')->as('role')
				->select('[acl_resources].[name]')->as('resource')
				->select('[acl_privileges].[name]')->as('privilege')
				->from('[acl]')
				->join('[acl_roles]')->on('[acl].[id_acl_roles] = [acl_roles].[id]')
				->leftJoin('[acl_resources]')->on('[acl].[id_acl_resources] = [acl_resources].[id]')
				->leftJoin('[acl_privileges]')->on('[acl].[id_acl_privileges] = [acl_privileges].[id]')
				->orderBy('[acl_roles].[id_acl_roles] ASC');
	}
	
	public function addResource($name) {
		$this->connection->insert('acl_resources', array(
			'name' => $name
		))->execute();
	}
	
	public function addPrivilege($name) {
		$this->connection->insert('acl_privileges', array(
			'name' => $name
		))->execute();
	}
}

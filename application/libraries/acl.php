<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* --------------------------------------------------------------------
 *	Class ACL 
 * --------------------------------------------------------------------
 *
 *	@Author: CHUN Dany
 *	Use: $this->load->library('acl');
 *		 $this->acl->hasPermission();
 *	or	 $this->acl->hasPermission($userId);
 *
 */
 
class Acl {
	
	protected $userId;
	protected $roleId;
	protected $resource;
	protected $ci;
	
	protected $config = array('sessionUserId' => 'userId');
	
	var $table = array(
		'user'		=> 'tbl_user',
		'resource'	=> 'tbl_resources',
		'permission'=> 'tbl_permissions',
		'module'=> 'tbl_modular'
	);
	
	var $fields = array(
		'user' => array(
			'id'	=> 'id',
			'roleId'=> 'role_id'
		),
		'resource' => array(
			'id'	  => 'id',
			'resource'=> 'resource',
			'remark'  => 'remark',
			'moduleId'=> 'module_id',
			'autoPermission'=> 'auto_permission'
		),
		'permission' => array(
			'id'		=> 'id',
			'roleId'	=> 'role_id',
			'resourceId'=> 'resource_id'
		),
		'module' => array(
			'id'		=> 'id',
			'name'		=> 'name',
			'remark'	=> 'remark',
			'orderNo'	=> 'order_no',
			'parentId'	=> 'parent_id'
		)
	);
	
	function __construct() {
		$this->ci = &get_instance();
		
		$this->init();
		$this->setResource();
	}
	
	private function init(){
		$this->sessionUserId();
		
		if($this->userId != NULL){
			$this->roleId = $this->getRoleId();
		}
	}
	
	private function setResource(){
				
		$module		= $this->ci->uri->slash_segment(1);
		$controller = $this->ci->uri->slash_segment(2);
		$action		= $this->ci->uri->segment(3);
		
		$this->resource = ($module == "/" && $controller == "/" && $action == "") ? 'default' : strtolower($module . $controller . $action);
	}
	
	private function sessionUserId(){
				
		if ($this->userId == NULL){
			$user = $this->ci->session->userdata($this->config['sessionUserId']);
			$this->userId = ($user === FALSE) ? 0 : $user;
		}

		return $this->userId;
	}
	
	public function hasPermission($userId=NULL){
		if($userId !== NULL){
			$this->userId = (int) $userId;
			$this->roleId = $this->getRoleId();
		}
		
		@list($module, $controller, $action) = explode('/', $this->resource, 3);
		@list($_module, $_controller, $_action) = $this->getFullPermission();
		
		if(	($module==='default') || (
			($_module==='*' || $module===$_module) && 
			($_controller==='*' || $controller===$_controller) &&
			($_action==='*' || $action===$_action))){
				return TRUE;
		}else if($this->checkAutoPermission()){
			return TRUE;
		}
		
		$permission = (boolean) $this->checkPermission();
		return $permission;
	}
	
	/* --------------------------------------------------------------------
	 *	Database
	 * --------------------------------------------------------------------
	 */
	 
	private function getRoleId(){
		$sql = $this->ci->db->select($this->fields['user']['roleId'])
					->where($this->fields['user']['id'], $this->userId)
					->get($this->table['user']);
					
		$data = $sql->result_array();
		if($sql->num_rows() > 0){
			return $data[0][$this->fields['user']['roleId']];
		}
		return 0;
	}
	 
	private function checkAutoPermission(){
		$sql = $this->ci->db->select($this->fields['resource']['id'])
					->where($this->fields['resource']['resource'], $this->resource)
					->where($this->fields['resource']['autoPermission'], 1)
					->get($this->table['resource']);
					
		$data = $sql->result_array();
		if($sql->num_rows() > 0){
			return TRUE;	
		}
		return FALSE;
	}
	 
	private function checkPermission(){
		$sql = $this->ci->db->select($this->table['permission'] . '.' . $this->fields['permission']['id'])
					->join($this->table['resource'], $this->table['resource'] . '.' . $this->fields['resource']['id'] . '=' . $this->table['permission'] . '.' . $this->fields['permission']['resourceId'])
					->where($this->fields['permission']['roleId'], $this->roleId)
					->where($this->fields['resource']['resource'], $this->resource)
					->get($this->table['permission']);
					
		$data = $sql->result_array();
		if($sql->num_rows() > 0){
			return TRUE;	
		}
		return FALSE;
	}
	
	private function getFullPermission(){
		$sql = $this->ci->db->select($this->table['resource'] . '.*')
					->join($this->table['resource'], $this->table['resource'] . '.' . $this->fields['resource']['id'] . '=' . $this->table['permission'] . '.' . $this->fields['permission']['resourceId'])
					->where($this->fields['permission']['roleId'], $this->roleId)
					->like($this->fields['resource']['resource'], '*')
					->get($this->table['permission']);
					
		$permission = array('?', '?', '?');
		if($sql->num_rows() > 0){
			$row = $sql->result_array();
			$resource = $row[0][$this->fields['resource']['resource']];
			
			$permission = explode('/', $resource, 3);
		}
		return $permission;
	}
}
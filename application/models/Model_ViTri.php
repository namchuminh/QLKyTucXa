<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ViTri extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		return $this->db->query('SELECT * FROM vitri ORDER BY Mavitri DESC')->result_array();
	}

	public function getById($Mavitri){
		return $this->db->query('SELECT * FROM vitri WHERE Mavitri = ?', array($Mavitri))->result_array();
	}

	public function update($mavitri, $toanha, $tang, $coso){
		return $this->db->query('UPDATE vitri SET mavitri = ?, toanha = ?, tang = ?, coso = ? WHERE mavitri = ?', array($mavitri, $toanha, $tang, $coso, $mavitri));
	}

	public function insert($mavitri, $toanha, $tang, $coso){
		return $this->db->query('INSERT INTO `vitri`(`mavitri`, `toanha`, `tang`, `coso`) VALUES (?, ?, ?, ?)', array($mavitri, $toanha, $tang, $coso));
	}

	public function delete($mavitri){
		return $this->db->query('DELETE FROM `vitri` WHERE mavitri = ?', array($mavitri));
	}

}

/* End of file Model_ViTri.php */
/* Location: ./application/models/Model_ViTri.php */
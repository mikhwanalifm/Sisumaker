<?php 
 
 class Jenis_model extends CI_Model{

 	public $table = 'tb_user';
 	public $id = 'id_user';
 	public function ambil_data($id)
 	{
 		$this->db->where('username', $id);
 		return $this->db->get('tb_user')->row();
 	}
 	function count_table($table){
	$res=$this->db->query("select * from $table");
	return $res->num_rows();
	}
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);

	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function logout($date, $id)
    {
        $this->db->where('tb_user.username', $id);
        $this->db->update('tb_user', $date);
    }
 }
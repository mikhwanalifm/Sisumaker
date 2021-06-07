<?php 
 
 class Sk_model extends CI_Model{

 	public $table = 'tb_user';
 	public $id = 'id_user';
 	public function ambil_data($id)
 	{
 		$this->db->where('username', $id);
 		return $this->db->get('tb_user')->row();
	 }
	 public function ambil_kode_sk($kode)
	{
		$result = $this->db->where('id_suratkeluar',$kode)->get('tb_suratkeluar');

		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return false;
		}
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
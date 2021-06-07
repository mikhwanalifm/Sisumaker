<?php 
 
 class Dashboard_model extends CI_Model{
     
    function get_data_stok(){
        $query = $this->db->query("SELECT id_jenissurat,SUM(id_suratmasuk) AS stok FROM tb_suratmasuk GROUP BY id_jenissurat");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 }
?>

<?php
// error_reporting(0);
class Model_Home extends CI_model
{
    public function getallpenyakit()
    {
        return $this->db->get("penyakit")->result_array();
    }

    public function getpenyakitbyid($penyakit_id)
    {
        return $this->db->get_where("penyakit",array("penyakit_id" => $penyakit_id))->row_array();
    }
    
    public function hapuspenyakit($penyakit_id)
    {
        $this->db->where("penyakit_id",$penyakit_id);
        $this->db->delete("penyakit");
    }

    public function update_penyakit($data){
        $this->db->set("penyakit_nama",$data["penyakit_nama"]);
        $this->db->set("penyakit_penyebab",$data["penyakit_penyebab"]);
        $this->db->set("penyakit_solusi",$data["penyakit_solusi"]);
        $this->db->where("penyakit_id",$data["penyakit_id"]);
        $this->db->update("penyakit");
    }
}
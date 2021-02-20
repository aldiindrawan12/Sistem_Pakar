<?php
// error_reporting(0);
class Model_Home extends CI_model
{
    public function getallpenyakit()
    {
        return $this->db->get("penyakit")->result_array();
    }

    public function getallgejala()
    {
        return $this->db->get("gejala")->result_array();
    }

    public function getallrule()
    {
        $this->db->join("gejala","gejala.gejala_id=rule.gejala_id","left");
        $this->db->join("penyakit","penyakit.penyakit_id=rule.penyakit_id","left");
        return $this->db->get("rule")->result_array();
    }

    public function getpenyakitbyid($penyakit_id)
    {
        return $this->db->get_where("penyakit",array("penyakit_id" => $penyakit_id))->row_array();
    }

    public function getrulebyid($rule_id)
    {
        $this->db->join("gejala","gejala.gejala_id=rule.gejala_id","left");
        $this->db->join("penyakit","penyakit.penyakit_id=rule.penyakit_id","left");
        return $this->db->get_where("rule",array("rule_id" => $rule_id))->row_array();
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

    public function insert_histori($data){
        $this->db->insert("histori",$data);
    }

    public function getallrulejoin()
    {
        $this->db->join("gejala","gejala.gejala_id=rule.gejala_id","left");
        $this->db->join("penyakit","penyakit.penyakit_id=rule.penyakit_id","left");
        return $this->db->get("rule")->result_array();
    }

    public function gethistori($histori_id)
    {
        return $this->db->get_where("histori",array("histori_id" => $histori_id))->row_array();
    }

    public function update_rule($data){
        $this->db->set("penyakit_id",$data["penyakit_id"]);
        $this->db->set("gejala_id",$data["gejala_id"]);
        $this->db->set("belief",$data["belief"]);
        $this->db->set("disbelief",$data["disbelief"]);
        $this->db->where("rule_id",$data["rule_id"]);
        $this->db->update("rule");
    }

    public function insert_rule($data){
        $this->db->insert("rule",$data);
    }

    public function delete_rule($rule_id){
        $this->db->where("rule_id",$rule_id);
        $this->db->delete("rule");
    }

    public function insert_gejala($data){
        $this->db->insert("gejala",$data);
    }

    public function delete_gejala($gejala_id){
        $this->db->where("gejala_id",$gejala_id);
        $this->db->delete("gejala");
    }

    public function insert_penyakit($data){
        $this->db->insert("penyakit",$data);
    }

    public function delete_penyakit($penyakit_id){
        $this->db->where("penyakit_id",$penyakit_id);
        $this->db->delete("penyakit");
    }
}
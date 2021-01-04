<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_unit_kerja_model extends CI_Model
{

    public $table = 'm_unit_kerja';
    public $id = 'unit_kerja_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('unit_kerja_id,unit_kerja_nama,m_unit_kerja.lokasi_kerja_id,lokasi_kerja_nama');
        $this->datatables->from('m_unit_kerja');
        //add this line for join
        $this->datatables->join('m_lokasi_kerja', 'm_unit_kerja.lokasi_kerja_id = m_lokasi_kerja.lokasi_kerja_id');
        $this->datatables->add_column('action', anchor(site_url('m_unit_kerja/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('m_unit_kerja/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('m_unit_kerja/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'m_unit_kerja/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'unit_kerja_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('unit_kerja_id,unit_kerja_nama,m_unit_kerja.lokasi_kerja_id,lokasi_kerja_nama');
        $this->db->from($this->table);
        $this->db->join('m_lokasi_kerja', 'm_unit_kerja.lokasi_kerja_id = m_lokasi_kerja.lokasi_kerja_id');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('unit_kerja_id', $q);
	$this->db->or_like('unit_kerja_nama', $q);
	$this->db->or_like('lokasi_kerja_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('unit_kerja_id', $q);
	$this->db->or_like('unit_kerja_nama', $q);
	$this->db->or_like('lokasi_kerja_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file M_unit_kerja_model.php */
/* Location: ./application/models/M_unit_kerja_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-29 03:20:17 */
/* http://harviacode.com */
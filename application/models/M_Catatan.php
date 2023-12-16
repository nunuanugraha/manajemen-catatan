<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Catatan extends CI_Model {

	private $_tbl_catatan = 'tbl_catatan';


	public function tambahCatatan()
	{
		 $post = $this->input->post();
		 $data = [
		 	'judul' => $post['judul'],
		 	'isi' => $post['isi'],
		 	'tanggal' => date('Y-m-d'),
		 ];

		 return $this->db->insert($this->_tbl_catatan, $data);
	}

	public function getAllCatatan()
	{
		$this->db->select('*');
		$this->db->from($this->_tbl_catatan);
		return $this->db->get()->result_array();
	}

    public function detailCatatan($id)
    {
        $query = $this->db->get_where('tbl_catatan', array('id' => $id));
        return $query->row_array();
    }

	public function updateCatatan($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_catatan', $data);
	}

	public function deleteCatatan($id)
{
    $this->db->where('id', $id);
    $this->db->delete('tbl_catatan');
}

public function search_catatan($keyword, $limit, $start)
{
    $this->db->like('judul', $keyword);
    $this->db->or_like('isi', $keyword);
    $this->db->limit($limit, $start);
    $query = $this->db->get('tbl_catatan');
    return $query->result_array();
}

public function count_search_catatan($keyword)
{
    $this->db->like('judul', $keyword);
    $this->db->or_like('isi', $keyword);
    return $this->db->count_all_results('tbl_catatan');
}

public function getSortedCatatan($order_by)
{
    $this->db->order_by($order_by);
    $query = $this->db->get('tbl_catatan');
    return $query->result_array();
}



}

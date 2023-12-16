<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('M_Catatan');
		$this->load->library('pagination');
    }

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['catatan'] = $this->M_Catatan->getAllCatatan();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('layout/footer');
	}
	
    public function detail_catatan($id)
    {
        $data['detailCatatan'] = $this->M_Catatan->detailCatatan($id);

        if (empty($data['detailCatatan'])) {
            show_404(); // atau tampilkan pesan kesalahan lainnya
        }

        $this->load->view('layout/header');
		$this->load->view('layout/sidebar', $data);
        $this->load->view('user/detail_catatan', $data); // Memuat view 'detail_catatan'
        $this->load->view('layout/footer');
		
    }

	public function edit_Catatan()
	{
		$data['title'] = "Edit Catatan";
		$data['catatan'] = $this->M_Catatan->getAllCatatan();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('user/edit_catatan', $data);
		$this->load->view('layout/footer');
	}

	public function tambahCatatan()
	{
		$validation = $this->form_validation;

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($validation->run() == TRUE)
		{
			$this->M_Catatan->tambahCatatan();
			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">Catatan anda sudah tersimpan!</div>');
			redirect('dashboard/tambahCatatan');
		} else {

			$data['title'] = "Buat Catatan";
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('user/tambahCatatan', $data);
			$this->load->view('layout/footer');	
		}

	}

	public function updateCatatan()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		// Mengatur tanggal saat ini
		$tanggal = date('Y-m-d');

		// Validasi data

		$data = array(
			'judul' => $judul,
			'tanggal' => $tanggal,
			'isi' => $isi
		);

		$this->M_Catatan->updateCatatan($id, $data);
	
		redirect('dashboard/edit_catatan');
	}
	
	public function delete_catatan()
	{
    $id = $this->input->post('id');

    // Pastikan ID valid dan ada
    if (!empty($id)) {
        $this->M_Catatan->deleteCatatan($id);
        // Tampilkan pesan sukses atau lakukan redirect
        redirect('dashboard/edit_catatan');
    } else {
        // Tampilkan pesan error atau lakukan redirect
        show_404();
    }
	}

	
	public function editCatatan($id)
	{
		$data['detailCatatan'] = $this->M_Catatan->detailCatatan($id);
	
		if (empty($data['detailCatatan'])) {
			show_404();
		} else {
			$data['title'] = "Update Catatan";
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('user/update_catatan', $data);
			$this->load->view('layout/footer');
		}
	}
	
	

	public function users()
	{
		$data['title'] = "Admin";
		$data['users'] = $this->M_Catatan->getAllUsersAdm();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('admin/users', $data);
		$this->load->view('layout/footer');	
	}

	public function search()
{
    // Ambil keyword dari query string
    $keyword = $this->input->get('keyword');

    // Konfigurasi Pagination
    $config['base_url'] = base_url('dashboard/search?keyword=' . $keyword);
    $config['total_rows'] = $this->M_Catatan->count_search_catatan($keyword);
    $config['per_page'] = 6;

	
		// Styling
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['atributes'] = array('class' =>'page-link');


    // Inisialisasi Pagination
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['catatan'] = $this->M_Catatan->search_catatan($keyword, $config['per_page'], $page);

    // Muat View
	$data['title'] = "Dashboard";
    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('layout/footer');
}

public function sort()
{
    $sort_method = $this->input->get('sort');

    // Tentukan metode pengurutan berdasarkan input
    switch ($sort_method) {
        case 'judul_asc':
            $order_by = 'judul ASC';
            break;
        case 'tanggal_asc':
            $order_by = 'tanggal ASC';
            break;
        case 'tanggal_desc':
            $order_by = 'tanggal DESC';
            break;
        default:
            $order_by = 'judul ASC'; // Default pengurutan
    }

    $data['catatan'] = $this->M_Catatan->getSortedCatatan($order_by);
    // Muat view dengan data yang sudah diurutkan
    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('layout/footer');
}

	
	
}

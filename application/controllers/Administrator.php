<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_study');
    }

    public function index()
    {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin'); // the user is not logged in, redirect them!
        } else {
            redirect('administrator/dashboard');
        }
    }

    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin'); // the user is not logged in, redirect them!
        } else {
            $page_data['page_name']  = 'dashboard';
            $page_data['page_title'] = 'Administrator Dashboard';
            $this->load->view('backend/index', $page_data);
        }
    }

    function mitra()
    {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin'); // the user is not logged in, redirect them!
        } else {
            $page_data['page_name']  = 'mitra';
            $page_data['page_title'] = 'Data Mitra';
            $this->load->view('backend/index', $page_data);
        }
    }

    function kurikulum() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin');
        } else {
            $page_data['page_name'] = 'kurikulum';
            $page_data['page_title'] = 'Data Kurikulum';
            $page_data['data'] = $this->M_study->get_kurikulum()->result();
            $this->load->view('backend/index', $page_data);
        }
    }

    function kurikulum_save() {
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->M_study->store_kurikulum($data);
        redirect(site_url('administrator/kurikulum'), 'refresh');
    }

    function kurikulum_del() {
        $id = $this->input->post('id');
        $this->M_study->delete_kurikulum($id);
        redirect(site_url('administrator/kurikulum'), 'refresh');
    }

    function kurikulum_update() {
        $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->M_study->update_kurikulum($id, $data);
        redirect(site_url('administrator/kurikulum'), 'refresh');
    }

    function jenjang() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin');
        } else {
            $page_data['page_name'] = 'jenjang';
            $page_data['page_title'] = 'Data Jenjang';
            $page_data['data'] = $this->M_study->get_jenjang()->result();
            $this->load->view('backend/index', $page_data);
        }
    }

    function jenjang_save() {
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->M_study->store_jenjang($data);
        redirect(site_url('administrator/jenjang'), 'refresh');
    }

    function jenjang_del() {
        $id = $this->input->post('id');
        $this->M_study->delete_jenjang($id);
        redirect(site_url('administrator/jenjang'), 'refresh');
    }

    function jenjang_update() {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->M_study->update_jenjang($id, $data);
        redirect(site_url('administrator/jenjang'), 'refresh');
    }

    function mapel() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin');
        } else {
            $page_data['data'] = $this->M_study->get_mapel()->result();
            $page_data['jenjang'] = $this->M_study->get_jenjang()->result_array();
            $page_data['kurikulum'] = $this->M_study->get_kurikulum()->result_array();
            $this->load->view('backend/index', $page_data);
        }
    }

    function get_mapel_jenjang($id) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

            $id = $this->input->post('id');
            $data['data'] = $this->M_study->mapel_by_jenjang($id)->result_array();
            $data['jenjang1'] = $this->M_study->get_jenjang()->result_array();
            $data['kurikulum1'] = $this->M_study->get_kurikulum()->result_array();
            $this->load->view('dashboard/study/mapel_jenjang', $data);
    }

    function store_mapel() {
        $data = array(
            'id_jenjang' => $this->input->post('jenjang'),
            'id_kurikulum' => $this->input->post('kurikulum'),
            'nama' => $this->input->post('nama')
        );
        $this->M_study->store_mapel($data);
        echo "<script> $.notify({
            title: '<strong>Sukses</strong>',
            message: 'Data Berhasil Ditambahkan'
                }, {
                type: 'success',
                animate: {enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                }, placement: {from: 'top',align: 'right'
                }, offset: 20,delay: 3000, timer: 500, spacing: 10,z_index: 1031,
                });
                </script>";
    }

    function delete_mapel($id) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        
            $this->M_study->delete_mapel($id);
            echo "<script> $.notify({
                title: '<strong>Sukses</strong>',
                message: 'Data Berhasil Dihapus'
                    }, {
                    type: 'success',
                    animate: {enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    }, placement: {from: 'top',align: 'right'
                    }, offset: 20,delay: 3000, timer: 500, spacing: 10,z_index: 1031,
                    });
                    </script>";
    }

    function update_mapel($id) {
        $id = $this->input->post('id');

        $data = array(
            'id_jenjang' => $this->input->post('jenjang'),
            'id_kurikulum' => $this->input->post('kurikulum'),
            'nama' => $this->input->post('nama')
        );
        $this->M_study->update_mapel($id, $data);

        echo "<script> $.notify({
                title: '<strong>Sukses</strong>',
                message: 'Data Berhasil Dirubah'
                    }, {
                    type: 'success',
                    animate: {enter: 'animated fadeInUp',exit: 'animated fadeOutRight'
                    }, placement: {from: 'top',align: 'right'
                    }, offset: 20,delay: 3000, timer: 500, spacing: 10,z_index: 1031,
                    });
                    </script>";
    }
}
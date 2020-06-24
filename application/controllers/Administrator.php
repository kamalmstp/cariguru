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
        $this->load->model('Mitra_model', 'mitra');
        $this->load->model('M_daerah', 'daerah');
        $this->load->model('Mail', 'mail');
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
            $page_data['page_name'] = 'mapel';
            $page_data['page_title'] = 'Data Mapel';
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

    function mitra() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('admin'); // the user is not logged in, redirect them!
        } else {
            $page_data['page_name'] = 'mitra';
            $page_data['page_title'] = 'Data Mitra';
            $page_data['data'] = $this->mitra->get_all()->result();
            $page_data['provinsi'] = $this->daerah->getProv()->result();
            $this->load->view('backend/index', $page_data);
        }
    }

    function mitra_save() {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
 
        if ($this->form_validation->run() == FALSE) {
            $this->mitra();
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = $this->generateRandomPassword(8);
            $joindate = time();
            $status = 'Active';
            $login = site_url() . 'mitra';
            $this->mitra->setNama($nama);
            $this->mitra->setEmail($email);
            $this->mitra->setPassword($password);
            $this->mitra->setJoindate($joindate);
            $this->mitra->setStatus($status);
            $chk = $this->mitra->create();
            if ($chk == TRUE) {
                $this->load->library('encryption');
                $mailData = array('topMsg' => 'Hi, Selamat Datang '.$nama, 'bodyMsg' => 'Selamat Bergabung Bersama Kami di CariGuru', 'loginLink' => $login, 'pwd' => $password, 'username' => $email);
                $this->mail->setMailTo($email);
                $this->mail->setMailFrom('cariguru.noreply@gmail.com');
                $this->mail->setMailSubject('Selamat Datang Di CariGuru');
                $this->mail->setMailContent($mailData);
                $this->mail->setTemplateName('daftar_mitra');
                $this->mail->setTemplatePath('mailTemplate/');
                $chkStatus = $this->mail->sendMail('smtp');

                if ($chkStatus === TRUE) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan & Email Terkirim');
                    redirect('administrator/mitra');
                } else {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan, Email Tidak Terkirim');
                    redirect('administrator/mitra');
                }
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
                redirect('administrator/mitra');
            }
        }
    }

    public function generateRandomPassword($length = 10) {
        $alphabets = range('a', 'z');
        $numbers = range('0', '9');
        $final_array = array_merge($alphabets, $numbers);
        $password = '';
        while ($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }
        return $password;
    }
}
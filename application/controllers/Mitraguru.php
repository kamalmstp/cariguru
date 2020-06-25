<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mitraguru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->helper(array('url','html'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('M_study');
        $this->load->model('Mitra_model', 'mitra');
        $this->load->model('M_daerah', 'daerah');
        $this->load->model('m_wilayah');
        $this->load->model('Mail', 'mail');
    }

    public function index()
    {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra'); // the user is not logged in, redirect them!
        } else {
            redirect('mitraguru/dashboard');
        }
    }

    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra'); // the user is not logged in, redirect them!
        } else {
            $page_data['page_name']  = 'dashboard';
            $page_data['page_title'] = 'Mitra Dashboard';
            $this->load->view('backend/index', $page_data);
        }
    }

    function profile() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $session = $this->session->userdata('ci_seesion_key');
            $id = $session['user_id'];
            $this->mitra->setIdMitra($id);
            $q = $this->mitra->getUserDetails();
            $pr = $q->provinsi;
            $kb = $q->kabupaten;
            $kc = $q->kecamatan;
            $kl = $q->kelurahan;

            // $a = $this->m_wilayah->getNamaKel(2147483647);
            // $b = $a->nama;
            // var_dump($a);

            $page_data['page_name'] = 'profile';
            $page_data['page_title'] = 'Biodata Mitra';
            $page_data['mitra'] = $this->mitra->getUserDetails();
            $page_data['tipe'] = $session['tipe'];
            $page_data['provinsi']=$this->m_wilayah->get_all_provinsi();
            $page_data['pr']=$this->m_wilayah->getNamaProv($pr);
            $page_data['kb']=$this->m_wilayah->getNamaKab($kb);
            $page_data['kc']=$this->m_wilayah->getNamaKec($kc);
            $page_data['kl']=$this->m_wilayah->getNamaKel($kl);
            $this->load->view('backend/index', $page_data);
        }
    }

    function biodata_update() {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $tempat = $this->input->post('tempat_lahir');
            $tanggal = $this->input->post('tanggal_lahir');
            $prov = $this->input->post('prov');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $des = $this->input->post('des');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $tentang = $this->input->post('tentang');
            
            $this->mitra->setIdMitra($id);
            $this->mitra->setNama($nama);
            $this->mitra->setTempatlahir($tempat);
            $this->mitra->setTanggallahir($tanggal);
            $this->mitra->setProvinsi($prov);
            $this->mitra->setKabupaten($kab);
            $this->mitra->setKecamatan($kec);
            $this->mitra->setKelurahan($des);
            $this->mitra->setAlamat($alamat);
            $this->mitra->setNotelp($telp);
            $this->mitra->setTentang($tentang);
            $update = $this->mitra->update();
            if ($update == TRUE) {
                $this->session->set_flashdata('success', 'Biodata Berhasil diPerbarui');
                redirect('mitraguru/profile', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Data Tidak Disimpan');
                redirect('mitraguru/profile', 'refresh');
            }
    }

    function add_ajax_kab($id_prov){
        $query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
    
    function add_ajax_kec($id_kab){
        $query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
    
    function add_ajax_des($id_kec){
        $query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }

    function jadwal() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $page_data['page_name'] = 'jadwal';
            $page_data['page_title'] = 'Jadwal Mengajar';
            $this->load->view('backend/index', $page_data);
        }
    }

    function review() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $page_data['page_name'] = 'review';
            $page_data['page_title'] = 'Review Siswa';
            $this->load->view('backend/index', $page_data);
        }
    }

    function evaluasi() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $page_data['page_name'] = 'evaluasi';
            $page_data['page_title'] = 'Evaluasi Siswa';
            $this->load->view('backend/index', $page_data);
        }
    }

    function blog() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $page_data['page_name'] = 'blog';
            $page_data['page_title'] = 'Blog';
            $this->load->view('backend/index', $page_data);
        }
    }

    function withdraw() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $page_data['page_name'] = 'withdraw';
            $page_data['page_title'] = 'Pencairan Dana';
            $this->load->view('backend/index', $page_data);
        }
    }

    function help() {
        if ($this->session->userdata('ci_session_key_generate') == FALSE) {
            redirect('mitra');
        } else {
            $page_data['page_name'] = 'help';
            $page_data['page_title'] = 'Bantuan Mitra';
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
            redirect('mitra');
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
            redirect('mitra');
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
            redirect('mitra'); // the user is not logged in, redirect them!
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
                    echo "Data dan Email Berhasil dikirim";
                } else {
                    echo "Data Berhasil disimpan tapi Gagal mengirim email";
                }
            } else {
                echo "gagal";
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
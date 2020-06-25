<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Mitra_model extends CI_Model {
 
    // Declaration of a variables
    private $_idmitra;
    private $_nama;
    private $_tempatlahir;
    private $_tanggallahir;
    private $_alamat;
    private $_provinsi;
    private $_kabupaten;
    private $_kecamatan;
    private $_kelurahan;
    private $_notelp;
    private $_email;
    private $_password;
    private $_foto;
    private $_jenjang;
    private $_kurikulum;
    private $_mapel;
    private $_verificationKey;
    private $_status;
    private $_joindate;
    private $_tentang;
 
    //Declaration of a methods
    public function setIdMitra($idmitra) {
        $this->_idmitra = $idmitra;
    }
 
    public function setNama($nama) {
        $this->_nama = $nama;
    }
 
    public function setTempatlahir($tempatlahir) {
        $this->_tempatlahir = $tempatlahir;
    }
 
    public function setTanggallahir($tanggallahir) {
        $this->_tanggallahir = $tanggallahir;
    }

    public function setAlamat($alamat) {
        $this->_alamat = $alamat;
    }

    public function setProvinsi($provinsi) {
        $this->_provinsi = $provinsi;
    }

    public function setKabupaten($kabupaten) {
        $this->_kabupaten = $kabupaten;
    }

    public function setKecamatan($kecamatan) {
        $this->_kecamatan = $kecamatan;
    }

    public function setKelurahan($kelurahan) {
        $this->_kelurahan = $kelurahan;
    }

    public function setNotelp($notelp) {
        $this->_notelp = $notelp;
    }
 
    public function setEmail($email) {
        $this->_email = $email;
    }
 
    public function setPassword($password) {
        $this->_password = $password;
    }
 
    public function setFoto($foto) {
        $this->_foto = $foto;
    }

    public function setJenjang($jenjang) {
        $this->_jenjang = $jenjang;
    }

    public function setKurikulum($kurikulum) {
        $this->_kurikulum = $kurikulum;
    }

    public function setMapel($mapel) {
        $this->_mapel = $mapel;
    }
 
    public function setVerificationKey($verificationKey) {
        $this->_verificationKey = $verificationKey;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }
 
    public function setJoindate($joindate) {
        $this->_joindate = $joindate;
    }

    public function setTentang($tentang) {
        $this->_tentang = $tentang;
    }

    public function get_all() {
        $mitra = $this->db->get('mitra');
        return $mitra;
    }
 
    //create new user
    public function create() {
        $hash = $this->hash($this->_password);
        $data = array(
            'nama' => $this->_nama,
            'email' => $this->_email,
            'password' => $hash,
            'joindate' => $this->_joindate,
            'status' => $this->_status
        );
        $this->db->insert('mitra', $data);
        return TRUE;
    }

    function login() {
        $this->db->select('*');
        $this->db->from('mitra');
        $this->db->where('email', $this->_email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            foreach ($result as $row) {
                if ($this->verifyHash($this->_password, $row->password) == TRUE) {
                    return $result;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }
 
    public function update() {
        $data = array(
            'nama' => $this->_nama,
            'tempat_lahir' => $this->_tempatlahir,
            'tanggal_lahir' => $this->_tanggallahir,
            'alamat' => $this->_alamat,
            'provinsi' => $this->_provinsi,
            'kabupaten' => $this->_kabupaten,
            'kecamatan' => $this->_kecamatan,
            'kelurahan' => $this->_kelurahan,
            'no_telp' => $this->_notelp,
            'tentang' => $this->_tentang,
            'foto' => $this->_foto
        );
        $this->db->where('id_mitra', $this->_idmitra);
        $msg = $this->db->update('mitra', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_pass() {
        $hash = $this->hash($this->_password);
        $data = array(
            'email' => $this->_email,
            'password' => $hash
        );
        $this->db->where('id_mitra', $this->_idmitra);
        $msg = $this->db->update('mitra', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function upload_foto() {
        $data = array(
            'foto' => $this->_foto
        );
        $this->db->where('id_mitra', $this->_idmitra);
        $msg = $this->db->update('mitra', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete() {
        $this->db->where('id_mitra', $this->_idmitra);
        $msg = $this->db->delete('mitra');
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
    //change password
    public function changePassword() {
        $hash = $this->hash($this->_password);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('id', $this->_idmitra);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
    // get User Detail
    public function getUserDetails() {
        $this->db->select(array('m.id_mitra as user_id', 'm.nama', 'm.tempat_lahir','m.tanggal_lahir','m.alamat','m.provinsi','m.kabupaten','m.kecamatan','m.kelurahan','m.jenjang','m.kurikulum','m.mapel','m.no_telp', 'm.email', 'm.foto', 'm.verification_key', 'm.status', 'm.joindate', 'm.tentang'));
        $this->db->from('mitra as m');
        $this->db->where('m.id_mitra', $this->_idmitra);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
 
    // update Forgot Password
    public function updateForgotPassword() {
        $hash = $this->hash($this->_password);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('email', $this->_email);
        $msg = $this->db->update('users', $data);
        if ($msg > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
    // get Email Address
    public function activate() {
        $data = array(
            'status' => 1,
            'verification_code' => 1,
        );
        $this->db->where('verification_code', $this->_verificationKey);
        $msg = $this->db->update('users', $data);
        if ($msg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
    // password hash
    public function hash($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
 
    // password verify
    public function verifyHash($password, $vpassword) {
        if (password_verify($password, $vpassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
}
?>
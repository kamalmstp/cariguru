<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_study extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_kurikulum() {
        $kurikulum = $this->db->get('kurikulum');
        return $kurikulum;
    }

    function kurikulum_by_id($id) {
        $this->db->select('*')
                ->where('id_kurikulum', $id);
        return $this->db->get('kurikulum');
    }
    
    function store_kurikulum($data) {
        $this->db->insert('kurikulum', $data);
        $this->db->insert_id();
    }

    function update_kurikulum($id, $data) {
        $this->db->where('id_kurikulum', $id);
        $this->db->update('kurikulum', $data);
    }

    function delete_kurikulum($id) {
        $this->db->where('id_kurikulum', $id);
        $this->db->delete('kurikulum');
    }
    
    function update_kurikulum_id($id, $data) {
        $this->db->where('id_kurikulum', $id);
        $this->db->update('kurikulum', $data);
    }


    function get_jenjang() {
        $jenjang = $this->db->get('jenjang');
        return $jenjang;
    }

    function jenjang_by_id($id) {
        $this->db->select('*')
                ->where('id_jenjang', $id);
        return $this->db->get('jenjang');
    }
    
    function store_jenjang($data) {
        $this->db->insert('jenjang', $data);
        $this->db->insert_id();
    }

    function update_jenjang($id, $data) {
        $this->db->where('id_jenjang', $id);
        $this->db->update('jenjang', $data);
        echo "<script> $.notify({
            title: '<strong>Sukses</strong>',
            message: 'Member " . $id . "  Terupdate'
                }, {
                type: 'success',
                animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutRight'
                },
                placement: {
                from: 'top',
                align: 'right'
                },
                offset: 20,
                delay: 3000,
                timer: 500,
                spacing: 10,
                z_index: 1031,
                });
                </script>";
    }

    function delete_jenjang($id) {
        $this->db->where('id_jenjang', $id);
        $this->db->delete('jenjang');
    }
    
    function update_jenjang_id($id, $data) {
        $this->db->where('id_jenjang', $id);
        $this->db->update('jenjang', $data);
    }

    function get_mapel() {
        $mapel = $this->db->get('mapel');
        return $mapel;
    }

    function mapel_by_id($id) {
        $this->db->select('*')
                ->where('id_mapel', $id);
        return $this->db->get('mapel');
    }

    function mapel_by_jenjang($id) {
        $this->db->select('*')
                ->where('id_jenjang', $id);
        return $this->db->get('mapel');
    }
    
    function store_mapel($data) {
        $this->db->insert('mapel', $data);
        $this->db->insert_id();
    }

    function update_mapel($id, $data) {
        $this->db->where('id_mapel', $id);
        $this->db->update('mapel', $data);
        echo "<script> $.notify({
            title: '<strong>Sukses</strong>',
            message: 'Member " . $id . "  Terupdate'
                }, {
                type: 'success',
                animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutRight'
                },
                placement: {
                from: 'top',
                align: 'right'
                },
                offset: 20,
                delay: 3000,
                timer: 500,
                spacing: 10,
                z_index: 1031,
                });
                </script>";
    }

    function delete_mapel($id) {
        $this->db->where('id_mapel', $id);
        $this->db->delete('mapel');
    }
    
    function update_mapel_id($id, $data) {
        $this->db->where('id_mapel', $id);
        $this->db->update('mapel', $data);
    }

}

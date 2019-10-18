<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['ukm_aktif'] = $this->db->get_where('ukm', ['is_active' => "1"])->result_array();
        $data['ukm_nonaktif'] = $this->db->get_where('ukm', ['is_active' => "0"])->result_array();
        $data['name'] = $this->db->get('user')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function nonaktifkan($id)
    {
        $ida = $id;

        $this->db->set('is_active', "0");
        $this->db->where('id', $ida);
        $this->db->update('ukm');

        redirect('admin');
    }
    public function aktifkan($id)
    {
        $idn = $id;

        $this->db->set('is_active', "1");
        $this->db->where('id', $idn);
        $this->db->update('ukm');

        redirect('admin');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleaccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_acces_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Akses berhasil diubah!
      </div>');
    }
}

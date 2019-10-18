<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class chat_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function add_user($data){
        $this->db->insert('mhs',$data);
    }


    public function login(){
        $query = $this->db->get_where('mhs',
            array(
            'niknim' => $this->input->post('niknim'),
        ));

        $row = $query->result();
        $num_rows = $query->num_rows();

        if( $num_rows == 1 && password_verify($this->input->post('password'), $row[0]->pass) ){


            $newdata = array(
              'niknim'     => $row[0]->niknim,
            );

            $this->session->set_userdata($newdata);


            return $num_rows;
        }
    }
}

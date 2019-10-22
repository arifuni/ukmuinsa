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



    }

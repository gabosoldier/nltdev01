<?php
class User_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_user($id)
    {
        $query = $this->db->get_where('usuario', array('id' => $id));
        return $query->row_array();
    }
    
    public function get_user_login($id, $password)
    {
        $this->db->where("id", $id);
        $this->db->where('password', $password);
        $query =  $this->db->get('usuario');
        
        return $query->row_array();
    }
    
    public function set_user($id = 0)
    {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'updated_at' => date('Y-m-d H:i:s')
        );
            
        if ($id == '') {
            return $this->db->insert('usuario', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('usuario', $data);
        }
    }
    
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('usuario');
    }    
    
}

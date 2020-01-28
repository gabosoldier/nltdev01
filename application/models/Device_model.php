<?php

class Device_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getDevice($usr)
    {
        $this->db->where("a.usuario_id", $usr);
        $this->db->select('a.*,b.nombre,b.descripcion');
        $this->db->from('dispositivo a');
        $this->db->join('disp_nombre b', 'a.id_nombre = b.id');
        $query =  $this->db->get();
        
        return $query->result_array();
   }

   function getDeviceName($nameid)
   {
       $this->db->where("b.nombre", $nameid);
       $this->db->select('a.*,b.nombre,b.descripcion');
       $this->db->from('dispositivo a');
       $this->db->join('disp_nombre b', 'a.id_nombre = b.id');
       $query =  $this->db->get();

       return $query->result_array();
  }

   public function get_device_by_id($id)
   {
       if ($id === '')
       {
           $query = $this->db->get('dispositivo');
           return $query->result_array();
       }

       $query = $this->db->get_where('dispositivo', array('id' => $id));
       return $query->row_array();
   }

   function set_tipo_disp($id){
        $this->db->set('dispositivo_id', $id);
        $ret = $this->db->insert('disp_tipo');
        return $ret;
   }

   function insert_odorix($data){
        $this->db->set('fecha', $data['fecha']);
        $this->db->set('hora', $data['hora']);
        $this->db->where("id", $data['dev_id']);
        $this->db->update('dispositivo');
        return $this->db->insert('odorix', $data);
   }

   function get_odorix($device_id){
        $this->db->where("dev_id", $device_id);
        $query =  $this->db->get('odorix');
        
        return $query->result_array();      
   }

   function get_odorixTop($device_id, $top){
        $this->db->limit($top);
        $this->db->where("dev_id", $device_id);
        $this->db->order_by('id', 'DESC');
        $query =  $this->db->get('odorix');
        
        return $query->result_array();      
    }

   function insert_aerix($data){
        $this->db->set('fecha', $data['fecha']);
        $this->db->set('hora', $data['hora']);
        $this->db->where("id", $data['dev_id']);
        $this->db->update('dispositivo');
        return $this->db->insert('aerix', $data);
    }

    function get_aerix($device_id){
        $this->db->where("dev_id", $device_id);
        $query =  $this->db->get('aerix');
        
        return $query->result_array();      
    }

   public function set_device($id)
   {
       $this->load->helper('url');

       $slug = url_title($this->input->post('name'), 'dash', TRUE);

       $data = array(
           'id' => $this->input->post('id'), // $this->db->escape($this->input->post('title'))
           'nombre' => $slug,
           'descripcion' => $this->input->post('description'),
           'fecha' => $this->input->post('date'),
           'hora' => $this->input->post('hour'),
           'usuario_id' => $this->input->post('user_id')
       );
       
       if ($id == '') {
           return $this->db->insert('dispositivo', $data);
       } else {
           $this->db->where('id', $id);
           return $this->db->update('dispositivo', $data);
       }
   }

   public function delete_odorix($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('odorix'); // $this->db->delete('news', array('id' => $id));  

    }
}
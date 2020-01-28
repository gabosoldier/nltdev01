<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model("device_model");
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('pagination');
		//$this->load->library('excel');
    }

    public function index()
	{
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $data['devices'] = $this->device_model->getDevice($data['user_id']);
        $data['title'] = 'Lista de dispositivos';

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('devices/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($nameid){
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $data['devicedet'] = $this->device_model->getDeviceName($nameid);
        $data['title'] = 'Detalles de dispositivos';

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('devices/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL) {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        if ($slug=='NL01P0001'){
            $this->view_odorix();
        }
        else if ($slug=='NL01O0001'){
            $this->view_aerix();
        }
        else{
            show_404();
        }
    }

    public function create() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Creae dispositivo';

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('hour', 'Hour', 'required');
        $this->form_validation->set_rules('userid', 'User id', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('devices/create');
            $this->load->view('templates/footer');
        } else {
            $this->device_model->set_device('');
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('devices/success');
            $this->load->view('templates/footer');
            redirect(site_url('device'));
        }
    }

    public function edit() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Editar dispositivo';
        $data['device_item'] = $this->device_model->get_device_by_id($id);

        if ($data['device_item']['usuario_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('devices/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news($id);
            //$this->load->view('news/success');
            redirect(site_url('device'));
        }
    }

    public function delete() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $news_item = $this->news_model->get_news_by_id($id);

        if ($news_item['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }

        $this->news_model->delete_news($id);
        redirect(base_url() . '/device');
    }

    public function view_odorix(){
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $crl = curl_init("https://production.oizom.com/v1/data/cur");

        $header = array();
        $header[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjIwMzcsIm9yZ0lkIjoiTkwyMDE5MDMwMSIsInVzZXJFbWFpbCI6Im5sMjAxOTAzMDFAb2l6b20uY29tIiwiaWF0IjoxNTU4NTQyNDU0LCJleHAiOjE1OTAwNzg0NTQsImlzcyI6InlrUFI1SkZPVGRSYnZHSjZyd2VZeWFBUHBNMlBLanVzIn0.8y-ysY6t_qGZgSZhCc4fxHf6-PJn9w0vGdg5vW43rrQ';
    
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_HEADER, 0);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $rest = curl_exec($crl);
    
        curl_close($crl);
    
        $jsonArrayResponse = json_decode($rest);

        foreach ($jsonArrayResponse as $key){

            if (isset($jsonArrayResponse) && $key->deviceId == "NL01P0001") {
                $temp = $key;
                $date = $temp->payload->d->t;
                $deviceId = $temp->deviceId;
                $temperatura = $temp->payload->d->temp;
                $uv = $temp->payload->d->uv;
                $p2 = $temp->payload->d->p2;
                $p1 = $temp->payload->d->p1;
                $lmin = $temp->payload->d->lmin;
                $lmax = $temp->payload->d->lmax;
                $light = $temp->payload->d->light;
                $leq = $temp->payload->d->leq;
                $hum = $temp->payload->d->hum;
                $g2 = $temp->payload->d->g2;
                $g1 = $temp->payload->d->g1;
                $bs = $temp->payload->d->bs;
                $aqi = $temp->aqi;
                $aqiMessage = $temp->aqiMessage;
    
                $arr_odorix = array(
                    'dev_id' => $deviceId,
                    'uv' => $uv,
                    'temperatura' => $temperatura,
                    'pm10' => $p2,
                    'pm25' => $p1,
                    'ruido_min' => $lmin,
                    'ruido_max' => $lmax,
                    'luz' => $light,
                    'ruido_prom' => $leq,
                    'humedad' => $hum,
                    'co2' => $g2,
                    'co' => $g1,
                    'bateria' => $bs,
                    'fecha' => date_timestamp_set(date_create(), $date)->format('d/m/Y'),
                    'hora' => date_timestamp_set(date_create(), $date)->format('h:m:s'),
                    'aqi' => $aqi,
                    'aqi_msg' => $aqiMessage,
                    'disp_tipo_id' => $this->device_model->set_tipo_disp($deviceId)
                );

                $ret = $this->device_model->insert_odorix($arr_odorix);
                
                if ($ret){
                    $res = $this->device_model->get_odorix($deviceId);
                    if ($res){
                        $data['title'] = 'Odorix';
                        $data['devid'] = $deviceId;
                        $data['odorix'] = $res;
                        $this->load->view('templates/admin-header');
                        $this->load->view('templates/admin-sidebar');
                        $this->load->view('devices/odorix', $data);
                        $this->load->view('templates/footer');
                    }
                    else{
                        show_404();
                    }
                }
                else{
                    show_404();
                }
            }
        }        
    }

    public function view_aerix(){
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $crl = curl_init("https://production.oizom.com/v1/data/cur");

        $header = array();
        $header[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjIwMzcsIm9yZ0lkIjoiTkwyMDE5MDMwMSIsInVzZXJFbWFpbCI6Im5sMjAxOTAzMDFAb2l6b20uY29tIiwiaWF0IjoxNTU4NTQyNDU0LCJleHAiOjE1OTAwNzg0NTQsImlzcyI6InlrUFI1SkZPVGRSYnZHSjZyd2VZeWFBUHBNMlBLanVzIn0.8y-ysY6t_qGZgSZhCc4fxHf6-PJn9w0vGdg5vW43rrQ';
    
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_HEADER, 0);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $rest = curl_exec($crl);
    
        curl_close($crl);
    
        $jsonArrayResponse = json_decode($rest);

        foreach ($jsonArrayResponse as $key){

            if (isset($jsonArrayResponse) && $key->deviceId == "NL01O0001") {
                $temp = $key;
                $date = $temp->payload->d->t;
                $deviceId = $temp->deviceId;
                $uv = $temp->payload->d->uv;
                $temperatura = $temp->payload->d->temp;
                $light = $temp->payload->d->light;
                $hum = $temp->payload->d->hum;
                $g4 = $temp->payload->d->g4;
    
                $arr_aerix = array(
                    'dev_id' => $deviceId,
                    'uv' => $uv,
                    'temperatura' => $temperatura,
                    'luz' => $light,
                    'humedad' => $hum,
                    'amoniaco' => $g4,
                    'fecha' => date_timestamp_set(date_create(), $date)->format('d/m/Y'),
                    'hora' => date_timestamp_set(date_create(), $date)->format('h:m:s'),
                    'disp_tipo_id' => $this->device_model->set_tipo_disp($deviceId)
                );

                $ret = $this->device_model->insert_aerix($arr_aerix);
                
                if ($ret){
                    $res = $this->device_model->get_aerix($deviceId);
                    if ($res){
                        $data['title'] = 'Aerix';
                        $data['aerix'] = $res;
                        $this->load->view('templates/admin-header');
                        $this->load->view('templates/admin-sidebar');
                        $this->load->view('devices/aerix', $data);
                        $this->load->view('templates/footer');
                    }
                    else{
                        show_404();
                    }
                }
                else{
                    show_404();
                }
            }
        }        
    }

    public function showchart(){
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $nombre = $this->uri->segment(3);
        
        $crl = curl_init("https://production.oizom.com/v1/data/cur");

        $header = array();
        $header[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjIwMzcsIm9yZ0lkIjoiTkwyMDE5MDMwMSIsInVzZXJFbWFpbCI6Im5sMjAxOTAzMDFAb2l6b20uY29tIiwiaWF0IjoxNTU4NTQyNDU0LCJleHAiOjE1OTAwNzg0NTQsImlzcyI6InlrUFI1SkZPVGRSYnZHSjZyd2VZeWFBUHBNMlBLanVzIn0.8y-ysY6t_qGZgSZhCc4fxHf6-PJn9w0vGdg5vW43rrQ';
    
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_HEADER, 0);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $rest = curl_exec($crl);
    
        curl_close($crl);
        
        $data['title'] = "Gráficos";

        if ($nombre=="ODORIX"){

            $key = json_decode($rest)[1]; //NL01P0001
            $temp = $key;
            $date = $temp->payload->d->t;
            $deviceId = $temp->deviceId;
            $temperatura = $temp->payload->d->temp;
            $uv = $temp->payload->d->uv;
            $p2 = $temp->payload->d->p2;
            $p1 = $temp->payload->d->p1;
            $lmin = $temp->payload->d->lmin;
            $lmax = $temp->payload->d->lmax;
            $light = $temp->payload->d->light;
            $leq = $temp->payload->d->leq;
            $hum = $temp->payload->d->hum;
            $g2 = $temp->payload->d->g2;
            $g1 = $temp->payload->d->g1;
            $bs = $temp->payload->d->bs;
            $aqi = $temp->aqi;
            $aqiMessage = $temp->aqiMessage;

            $arr_odorix = array(
                'dev_id' => $deviceId,
                'uv' => $uv,
                'temperatura' => $temperatura,
                'pm10' => $p2,
                'pm25' => $p1,
                'ruido_min' => $lmin,
                'ruido_max' => $lmax,
                'luz' => $light,
                'ruido_prom' => $leq,
                'humedad' => $hum,
                'co2' => $g2,
                'co' => $g1,
                'bateria' => $bs,
                'fecha' => date_timestamp_set(date_create(), $date)->format('d/m/Y'),
                'hora' => date_timestamp_set(date_create(), $date)->format('h:m:s'),
                'aqi' => $aqi,
                'aqi_msg' => $aqiMessage,
                'disp_tipo_id' => $this->device_model->set_tipo_disp($deviceId)
            );

            $ret = $this->device_model->insert_odorix($arr_odorix);
            if ($ret){
                $res = $this->device_model->get_odorixTop($deviceId, 10);
                
                $data['restapi'] = $res;
                $this->load->view('templates/admin-header');
                $this->load->view('templates/admin-sidebar');
                $this->load->view('devices/odorix_chart', $data);
                $this->load->view('templates/footer');
            }


        }
        elseif ($nombre=="AERIX") {
            $data['restapi'] = json_decode($rest)[0];
            $this->load->view('templates/admin-header');
            $this->load->view('templates/admin-sidebar');
            $this->load->view('devices/aerix_chart', $data);
            $this->load->view('templates/footer');          
        }
        else{
            show_404();
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model("device_model");
        $this->load->helper('url_helper');
        //$this->load->library('session');
  		$this->load->library('excel');
    }

    public function detail(){
        $deviceId = "NL01O0001";
        echo "chupalo";exit();
        $res = $this->device_model->get_aerix($deviceId);

        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Device list');
        $this->excel->getActiveSheet()->fromArray($res);
        $filename='just_some_random_name.xls';
        header('Content-Type: application/vnd.ms-excel'); //mime type
         header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
         header('Cache-Control: max-age=0');
         $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
         $objWriter->save('php://output');
        //show_404();
    }
}
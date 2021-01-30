<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','file');
		$this->load->library(array('googlemaps','jsmin'));
		$this->load->model('map_model', '', TRUE);
		$this->_maps();
        $this->_init();
	}

	public function index() 
	{  
		$coords = $this->map_model->get_coordinates();
        $subdistrict = $this->map_model->get_subdistrict();
        foreach ($coords as $coordinate) {

			if($coordinate->type == "restaurant"){
                $image = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|FF0000|000000';
            }

            if($coordinate->type == "bar"){
                $image = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=B|FFFFFF|000000';
            }

            $marker = array('id'=> $coordinate->type, 'position' => $coordinate->lat.','.$coordinate->lng, 'icon' => $image, 'infowindow_content' =>$coordinate->address
        	);
            $this->googlemaps->add_marker($marker);

        }

        foreach ($subdistrict as $sub) {
        	if($sub->zone == 1) {
                $fillColor = '#FF0000';
            }

            if($sub->zone == 0) {
                $fillColor = '#6973ea';
            }
            $center = $sub->lat.','.$sub->lng;
            
        }

        $circle = array(
            'center' => $center,
            'clickable' => TRUE,
            'radius' => '20',
            'strokeColor' => '0.0',
            'strokeOpacity' => '0.8',
            'strokeWeight' => '0',
            'fillColor' => $fillColor,
            'fillOpacity' => '0.8',
            //'onclick' => '',
            //'ondblclick' => '',
            //'onmousedown' => '',
            //'onmousemove' => '',
            //'onmouseout' => '',
            //'onmouseover' => '',
            //'onmouseup' => '',
            //'onrightclick' => '',
            'zIndex' => ''
        );

        $this->googlemaps->add_circle($circle);

        $data = array();
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('map/marker', $data);
    }

    private function _maps()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
	}

    private function _init()
    {
        $this->output->set_template('default');

        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

}
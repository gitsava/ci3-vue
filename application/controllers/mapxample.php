<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapxample extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('googlemaps'));
		$this->_maps();
	}

	public function index()
	{
		$marker = array();
		$marker['position'] = '37.4419, -122.1419';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function marker()
	{
		$marker = array();

		$marker['position'] = '37.429, -122.1519';
		$marker['infowindow_content'] = '1 - Hello World!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '37.409, -122.1319';
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '37.449, -122.1419';
		$marker['onclick'] = 'alert("You just clicked me!!")';

		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function polyline()
	{
		$polyline = array();
		$polyline['points'] = array('37.429, -122.1319',
					    '37.429, -122.1419',
					    '37.4419, -122.1219');
		$this->googlemaps->add_polyline($polyline);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function polygon()
	{
		$polygon = array();
		$polygon['points'] = array('37.425, -122.1321',
					   '37.4422, -122.1622',
					   '37.4412, -122.1322',
					   '37.425, -122.1021');
		$polygon['strokeColor'] = '#000099';
		$polygon['fillColor'] = '#000099';
		$this->googlemaps->add_polygon($polygon);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function circle()
	{
		$circle = array();
		$circle['center'] = '37.4419, -122.1419';
		$circle['radius'] = '50';
		$this->googlemaps->add_circle($circle);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function rectangle()
	{
		$rectangle = array();
		$rectangle['positionSW'] = '40.712216,-74.22655';
		$rectangle['positionNE'] = '40.773941,-74.12544';
		$this->googlemaps->add_rectangle($rectangle);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function groundoverlay()
	{
		$groundOverlay = array();
		$groundOverlay['image'] = 'http://maps.google.com/intl/en_ALL/images/logos/maps_logo.gif';
		$groundOverlay['positionSW'] = '40.712216,-74.22655';
		$groundOverlay['positionNE'] = '40.773941,-74.12544';
		$this->googlemaps->add_ground_overlay($groundOverlay);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function directions()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['directions'] = TRUE;
		$config['directionsStart'] = 'empire state building';
		$config['directionsEnd'] = 'statue of liberty';
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function cluster()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['cluster'] = TRUE;
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '32.429, -112.1419';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '35.429, -120.1419';
		$this->googlemaps->add_marker($marker);

		$marker = array();
		$marker['position'] = '54.429, -0.1419';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function geolocation()
	{
		$config = array();
		$config['center'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		centreGot = true;';
		$this->googlemaps->initialize($config);
		   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function drawing()
	{
		$config['center'] = 'Adelaide, Australia';
		$config['zoom'] = '13';
		$config['drawing'] = true;
		$config['drawingDefaultMode'] = 'circle';
		$config['drawingModes'] = array('circle','rectangle','polygon');
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function styling()
	{
		$config['center'] = '1600 Amphitheatre Parkway in Mountain View, Santa Clara County, California';
		$config['zoom'] = '13';
		$config['styles'] = array(
		  array("name"=>"Red Parks", "definition"=>array(
		    array("featureType"=>"all", "stylers"=>array(array("saturation"=>"-30"))),
		    array("featureType"=>"poi.park", "stylers"=>array(array("saturation"=>"10"), array("hue"=>"#990000")))
		  )),
		  array("name"=>"Black Roads", "definition"=>array(
		    array("featureType"=>"all", "stylers"=>array(array("saturation"=>"-70"))),
		    array("featureType"=>"road.arterial", "elementType"=>"geometry", "stylers"=>array(array("hue"=>"#000000")))
		  )),
		  array("name"=>"No Businesses", "definition"=>array(
		    array("featureType"=>"poi.business", "elementType"=>"labels", "stylers"=>array(array("visibility"=>"off")))
		  ))
		);
		$config['stylesAsMapTypes'] = true;
		$config['stylesAsMapTypesDefault'] = "Black Roads"; 
		$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function traffic()
	{
		$config['trafficOverlay'] = TRUE;
		$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function bicycling()
	{
		$config['bicyclingOverlay'] = TRUE;
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function panoramio()
	{
		$config['zoom'] = '7';
		$config['panoramio'] = TRUE;
		$config['panoramioTag'] = 'sunset';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function street()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['map_type'] = 'STREET';
		$config['streetViewPovHeading'] = 90;
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function kml()
	{
		$config['kmlLayerURL'] = 'http://api.flickr.com/services/feeds/geo/?g=322338@N20&lang=en-us&format=feed-georss';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function places()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;
		$config['placesLocation'] = '37.4419, -122.1419';
		$config['placesRadius'] = 200; 
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function places_input()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function get_coord_click()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function addmarker()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'createMarker_map({ map: map, position:event.latLng });';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function get_coord_drag()
	{
		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/marker', $data);
	}

	public function pass_coord_db()
	{
		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('map/pass', $data);
	}

	public function multimap()
	{
		// Map One
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 9;
		$config['map_name'] = 'map_one';
		$config['map_div_id'] = 'map_canvas_one';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$marker['infowindow_content'] = "I'm on Map One";
		$this->googlemaps->add_marker($marker);

		$data['map_one'] = $this->googlemaps->create_map();

		// Map Two
		$config['center'] = '39.1419, -123.0419';
		$config['zoom'] = 9;
		$config['map_name'] = 'map_two';
		$config['map_div_id'] = 'map_canvas_two';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '39.1419, -123.0419';
		$marker['infowindow_content'] = "I'm on Map Two";
		$this->googlemaps->add_marker($marker);

		$data['map_two'] = $this->googlemaps->create_map();
		$this->load->view('map/multimap', $data);
	}

	private function _maps()
	{
		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
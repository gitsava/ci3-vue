<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Map_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_coordinates()
    {
    	$return = array();
    	$query = $this->db->select('id,subdistrict_id,lat,lng,address,type')
            ->from('tb_home')
            ->get();
    	if ($query->num_rows()>0) {
    		foreach ($query->result() as $row) {
    			array_push($return, $row);
    		}
    	}
    	return $return;
    }

    public function get_subdistrict()
    {
        $return = array();
        $query = $this->db->select('id,district_id,lat,lng,zone')
            ->from('tb_subdistrict')
            ->get();
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                array_push($return, $row);
            }
        }
        return $return;
    }
}
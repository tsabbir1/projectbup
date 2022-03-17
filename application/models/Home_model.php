<?php
	class Home_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($slug=FALSE, $limit = FALSE, $offset = FALSE){

			if($limit){
				$this->db->limit($limit, $offset);
			}
			
			if($slug === FALSE){
				$this->db->order_by('sl', 'DESC');
				$query = $this->db->get('violation_record');
				return $query->result_array();
			}

			$query = $this->db->get_where('violation_record', array('sl' => $slug));
			return $query->row_array();
		}
	}

		
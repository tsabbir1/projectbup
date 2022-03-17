<?php
require APPPATH . 'libraries/REST_Controller.php';

class Item extends REST_Controller {

public function __construct() {
   parent::__construct();
   $this->load->database();
}


	public function index_get($id = 0){
		if(!empty($id)){
			$data = $this->db->get_where("violation_record", ['sl' => $id])->row_array();

		}else{
			$data = $this->db->get("violation_record")->result();
		}
	
		$this->response($data, REST_Controller::HTTP_OK);
	}


	public function index_post(){
		$input = $this->input->post();
		$this->db->insert('violation_record',$input); 
		$this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
	} 


	public function index_put($id){
		$input = $this->put();
		$this->db->update('violation_record', $input, array('sl'=>$id));
		$this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
	}


	public function index_delete($id){
		$this->db->delete('violation_record', array('sl'=>$id));
		$this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
	}



}
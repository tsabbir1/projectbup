<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	
	public function index($offset = 0){

			// Pagination Config

			$this->load->library('pagination');
			
			$config['base_url'] = base_url() . '/';
			$config['total_rows'] = $this->db->count_all_results('violation_record');
			$config['per_page'] = 20;
			$config['display_pages'] = TRUE;


			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";



    		$this->pagination->initialize($config);


			//transfer data
			$data['pagination']  = $this->pagination->create_links();
			$data['count']  = $this->db->count_all_results('violation_record');
			$data['trafic_record']= $this->home_model->get_posts(FALSE, $config['per_page'], $offset);
			
			
			
			$this->load->view('home',$data);
		}
		
		
		public function ajax_request($offset = 0){
			$live_count  = $this->db->count_all_results('violation_record');
			$count = $this->input->post('count');
			$count = (int)$count;
			
			if($live_count>$count){
				$limit=$live_count-$count;
				$count=$live_count;				
				$responce= $this->home_model->get_posts(FALSE, $limit, $offset);
				
				foreach ($responce as $row){
				echo'
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img id="imageresource'.$row["sl"].'" class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/png;base64, '.$row["img"].'" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text"><b style="color: #008000;">Location: '.$row["location"].'</b><br/>
                  <b style="color: #0066cc;">Timestamp: '.$row["date_time"].'</b><br/>
                  <br><b>Possible Violation: </b><br/><b>';
				  if($row["possible_violation"]=="Lane change and Over speed."){
					echo '<span style="color:#e6005c">'.$row["possible_violation"].'</span>';
				  }
				  else if($row["possible_violation"]=="Over Speed"){
					echo '<span style="color:#cc00ff">'.$row["possible_violation"].'</span>';
				  }
				  else{
					echo '<span style="color: #e67300;">'.$row["possible_violation"].'</span>';
				  }
					
					
				  echo'</b><br/>
                  Vehicle Class: '.strtoupper($row["type"]).'<br/>
                  Vehicle Speed: '.$row["speed"].' KM/H</p>
				  
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button id="'.$row["sl"].'" type="button" class="view btn btn-sm btn-outline-secondary">View</button>
                    </div>
                    <small class="text-muted">'.$count.'</small>
                  </div>
                </div>
              </div>
            </div>';
				}			
			}
			
			
		}
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Slots extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

		// $this->not_logged_in();

		$this->data['page_title'] = 'Slots';
		$this->load->model('model_slots');
	}


	public function iot()
	{
		// if (isset($_POST['value1']) && isset($_POST['value2'])) {
		// 	// Retrieve the values sent by the Arduino
		// 	$UltrasonicSensorReading1 = $_POST['value1'];
		// 	$UltrasonicSensorReading2 = $_POST['value2'];
		
		// 	// $data = array(
		// 	// 	'UltrasonicSensorReading1' => $this->input->post('UltrasonicSensorReading1'),
		// 	// 	'UltrasonicSensorReading2' => $this->input->post('UltrasonicSensorReading2')
		// 	// );
	
		// 	// $this->model_slots->create_iot($data);

		// 	// var_dump($this->model_slots->getSlotData());

		// 	echo "Received data - Ultrasonic Sensor 1: " . $UltrasonicSensorReading1 . ", Ultrasonic Sensor 2: " . $UltrasonicSensorReading2;
		//   } else {
		// 	echo "Incomplete data received";
		//   }

		  $this->load->view('slots/parking_design');
	}


	public function index()
	{

		if (!in_array('viewSlots', $this->permission)) {
			redirect('index.php/dashboard', 'refresh');
		}


		$slot_data = $this->model_slots->getSlotData();
		$this->data['slot_data'] = $slot_data;


		$this->render_template('slots/index', $this->data);
	}

	public function create()
	{

		if (!in_array('createSlots', $this->permission)) {
			redirect('index.php/dashboard', 'refresh');
		}

		$this->form_validation->set_rules('slot_name', 'Slot name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$data = array(
				'slot_name' => $this->input->post('slot_name'),
				'active' => $this->input->post('status'),
				'availability_status' => 1
			);

			$create = $this->model_slots->create($data);
			if ($create == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('index.php/slots/', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('index.php/slots/create', 'refresh');
			}
		} else {
			$this->render_template('slots/create', $this->data);
		}
	}

	public function edit($id = null)
	{
		if (!in_array('updateSlots', $this->permission)) {
			redirect('index.php/dashboard', 'refresh');
		}

		if ($id) {
			$this->form_validation->set_rules('slot_name', 'Slot name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if ($this->form_validation->run() == TRUE) {
				// true case
				$data = array(
					'slot_name' => $this->input->post('slot_name'),
					'active' => $this->input->post('status'),
					'availability_status' => 1
				);

				$update = $this->model_slots->edit($data, $id);
				if ($update == true) {
					$this->session->set_flashdata('success', 'Successfully updated');
					redirect('index.php/slots/', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('index.php/slots/edit/' . $id, 'refresh');
				}
			} else {
				// false case
				$slot_data = $this->model_slots->getSlotData($id);
				$this->data['slot_data'] = $slot_data;
				$this->render_template('slots/edit', $this->data);
			}
		}
	}

	public function delete($id = null)
	{
		if (!in_array('deleteSlots', $this->permission)) {
			redirect('index.php/dashboard', 'refresh');
		}

		if ($id) {
			if ($this->input->post('confirm')) {

				// $check = $this->model_groups->existInUserGroup($id);
				// if($check == true) {
				// 	$this->session->set_flashdata('error', 'Group exists in the users');
				//      		redirect('index.php/category/', 'refresh');
				// }
				// else {
				$delete = $this->model_slots->delete($id);
				if ($delete == true) {
					$this->session->set_flashdata('success', 'Successfully removed');
					redirect('index.php/slots/', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Error occurred!!');
					redirect('index.php/slots/delete/' . $id, 'refresh');
				}
				// }	
			} else {
				$this->data['id'] = $id;
				$this->render_template('slots/delete', $this->data);
			}
		}
	}

}

<?php

class Model_Slots extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSlotData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM slots WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM slots";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('slots', $data);
		return ($create == true) ? true : false;
	}

	// public function create_iot($data = '')
	// {
	// 	$create = $this->db->insert('parking_slot', $data);
	// 	return ($create == true) ? true : false;
	// }

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('slots', $data);
		return ($update == true) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('slots');
		return ($delete == true) ? true : false;
	}

	public function updateSlotAvailability($data, $id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$update = $this->db->update('slots', $data);
			return ($update == true) ? true : false;
		}
	}

	public function getAvailableSlotData()
	{
		$sql = "SELECT * FROM slots WHERE availability_status = ? AND active = ?";
		$query = $this->db->query($sql, array(1, 1));
		return $query->result_array();
	}

	public function getAllSlots()
	{
		$sql = "SELECT * FROM parking_slot WHERE UltrasonicSensorReading1 <> 0 AND UltrasonicSensorReading2 <> 0 ORDER BY timestamp DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function countTotalSlots()
	{
		$sql = "SELECT * FROM slots";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}

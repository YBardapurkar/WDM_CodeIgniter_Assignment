<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Events_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
	}

	// get all events
	function get_all_events() {
		$this->db->select('*');
		$query = $this->db->get('events');
		return $query->result();
	}

	// get event by id
	function get_event($eventId) {
		$data = array('id' => $eventId);
		$this->db->select('*');
		$query = $this->db->get_where('events', $data);
		return $query->row();
	}

	// get events of user
	function get_events_of_individual($userId) {
		$data = array('userevents.userId' => $userId);
		$this->db->select('*');
		$this->db->join('userevents', 'events.id = userevents.eventId');
		$query = $this->db->get_where('events', $data);
		return $query->result();
	}

	// get events of event
	function get_events_of_event($userId) {
		$data = array('createdBy' => $userId);
		$this->db->select('*');
		$query = $this->db->get_where('events', $data);
		return $query->result();
	}

	// confirm event, add to my events
	function confirm_event($userId, $eventId) {
		$data = array('userId' => $userId, 'eventId' => $eventId);
		$this->db->insert('userevents', $data);
	}

	// check if confirmed
	function check_if_confirmed($userId, $eventId) {
		$data = array('userId' => $userId, 'eventId' => $eventId);
		$this->db->select('*');
		$this->db->where($data);
		$query = $this->db->get('userevents');
		$result = $query->num_rows();	
		return $result > 0;
	}

	// remove event from my events
	function remove_event($userId, $eventId) {
		$data = array('userId' => $userId, 'eventId' => $eventId);
		$this->db->where($data);
		$this->db->delete('userevents');
	}

	// add event to table
	function add_event($eventName, $eventDate, $eventVenue, $eventDescription, $createdBy) {
		$data = array('name' => $eventName, 'eventDate' => $eventDate, 'venue' => $eventVenue, 'description' => $eventDescription, 'createdBy' => $createdBy);
		$this->db->insert('events', $data);
	}

	// update event
	function update_event($id, $eventName, $eventDate, $eventVenue, $eventDescription) {
		$this->db->set('name', $eventName);
		$this->db->set('eventDate', $eventDate);
		$this->db->set('venue', $eventVenue);
		$this->db->set('description', $eventDescription);
		$this->db->where('id', $id);
		$this->db->update('events');
	}

	// delete event from events and userevents
	function delete_event($eventId) {
		$this->db->trans_start();

		$data = array('eventId' => $eventId);
		$this->db->where($data);
		$this->db->delete('userevents');

		$data = array('id' => $eventId);
		$this->db->where($data);
		$this->db->delete('events');

		$this->db->trans_complete();

		return ($this->db->trans_status() === TRUE);
	}

}
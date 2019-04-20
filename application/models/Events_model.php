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

	// get events of user
	function get_events_of_individual($userId) {
		$data = array('userevents.userId' => $userId);
		$this->db->select('*');
		$this->db->join('userevents', 'events.id = userevents.eventId');
		$query = $this->db->get_where('events', $data);
		return $query->result();
	}

	// get events of user
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
	function add_event($eventName, $eventDate, $eventVenue, $eventDescription) {
		$data = array('eventName' => $eventName, 'eventDate' => $eventDate, 'eventVenue' => $eventVenue, 'eventDescription' => $eventDescription);
		$this->db->insert('events', $data);
	}

}
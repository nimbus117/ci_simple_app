<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Todo_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function get_all_entries() {
    $query = $this->db->order_by('order', 'ASC')->get('todos');
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

  function get_completed_entries(int $limit = 2, int $offset = 0) {
    $query = $this->db->order_by('task', 'DESC')->get_where('todos', array('completed' => 1, $limit, $offset));
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

  function update_entries($update_info, $update_criteria = array()) {
    $this->db->update('todos', $update_info, $update_criteria);
  }
}

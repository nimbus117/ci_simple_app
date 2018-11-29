<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Todos extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Todo_model');
  }

  public function index() {
    $all_todos = $this->Todo_model->get_all_entries();
    $data = array();
    $data['todos'] = $all_todos;
    $this->load->view('todos/index', $data);
  }
  public function update_completed() {
    foreach ($this->input->post('completed') as $todo_id) {
      echo 'The todo with id = ' .$todo_id.' is marked as completed.<br>';
    }
  }
}

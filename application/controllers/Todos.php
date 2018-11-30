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
    $update_not_completed = array('completed' => 0);
    $this->Todo_model->update_entries($update_not_completed);

    foreach ($this->input->post('completed') as $todo_id) {
      $update_completed = array('completed' => 1);
      $update_criteria = array('id' => $todo_id);
      $this->Todo_model->update_entries($update_completed, $update_criteria);
    }

    $this->load->helper('url');
    redirect('/');
  }
}

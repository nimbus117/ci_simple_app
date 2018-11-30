<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Todos extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Todo_model');
    $this->load->helper('url', 'form');
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

    redirect('/');
  }

  public function create() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('task', 'New task', 'required');
    $this->form_validation->set_rules('order', 'Priority', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    }
    else {
      $task = $this->input->post('task');
      $order = $this->input->post('order');
      $this->Todo_model->insert_entry($task, $order);
      redirect('/');
    }
  }

  public function delete() {
    $id = $this->uri->segment(3);
    $this->Todo_model->delete_entry($id);
    redirect('/');
  }
}

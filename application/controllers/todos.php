<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Todo extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Todo_model');
  }

  public function index() {
    $all_todos = $this.Todo_model->get_all_entries();
    $data = array();
    $data['todos'] = $all_todos;
    $this->load->view('todos/index', $data);
  }

  public function test() {
    echo 'Hello';
  }
}

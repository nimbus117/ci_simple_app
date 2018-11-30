<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Todo App</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/priority.css">
</head>
<body>
  <div class="container">
    <?php echo form_open('todos/update_completed'); ?>
    <h1>Todos</h1>
    <div class="list-group">
      <?php foreach($todos as $todo) { ?>
      <div class="list-group-item clearfix pri<?php echo $todo->order ?>">
          <?php echo form_checkbox('completed[]', $todo->id, $todo->completed, array('onclick' => "document.forms[0].submit()")); ?>
          <?php echo $todo->task; ?>
          <button type="button" class="close" aria-label="Close">
            <a href="<?php echo base_url()."todos/delete/".$todo->id;?>" style="color:inherit;text-decoration: none;">&times;</a>
          </button>
        </div>
      <?php } ?>
    </div>
    <?php echo form_close(); ?>
    <?php echo form_open('todos/create'); ?>
    </br>
    <div class="form-group">
      <?php echo form_input(array(
        'name' => 'task',
        'id' => 'task',
        'class' => 'form-control',
        'placeholder' => 'new task'
      ))?>
    </div>
    <div class="form-group">
      <?php
        $options = array(
          '1' => 'High Priority',
          '2' => 'Normal Priority',
          '3' => 'Low Priority',
        );
        echo form_dropdown('order', $options, 2, array('class' => 'custom-select'));
      ?>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <?php echo form_close(); ?>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple Todo App</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Todos</h1>
    <div class="list-group">
      <?php foreach($todos as $todo) { ?>
        <div class="list-group-item clearfix">
          <?php echo form_checkbox('completed', $todo->id, $todo->completed); ?>
          <?php echo $todo->task; ?>
        </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>

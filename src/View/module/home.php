<div class="container">
  <div class="row">
    <div class="col">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Tarea</th>
      <th scope="col">Status</th>
      <th scope="col">Fecha</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $tasks = new TaskController();
        foreach($tasks->all() as $task) {
    ?>
        <tr>
        <th scope="row"><?=$task['id'];?></th>
        <td><?=$task['title'];?></td>
        <td><?=$task['task'];?></td>
        <td><span class="badge <?=$tasks->classStatus($task['name']);?>"><?=$task['name'];?></span></td>
        <td><?=$task['create'];?></td>
        <td><a href="/edit/<?=$task['id'];?>">Modificar</a> | <a href="/delete/<?=$task['id'];?>">Eliminar</a></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
        </div></div></div>
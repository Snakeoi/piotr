<?php
function show_restaurant($id) {
  global $connect;
  $sql ="SELECT name FROM restauracje WHERE id='{$id}'";
      $result = $connect->query($sql);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $output = "<h2>{$row['name']}</h2>";
        }
      } else {
        header('Location: /index.php');
      }

    return $output;
}

function show_opinions($id) {
  global $connect;
  $sql ="SELECT name, rate, opinion FROM opinie WHERE restid='{$id}'";
      $result = $connect->query($sql);
      $output = '<h3>Opinie</h3>';
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $output .= "<p><b>{$row['name']}</b><br>Ocena: {$row['rate']}<br>{$row['opinion']}</p>";
        }
      } else {
        $output .="<p>Ten lokal nie ma jeszcze opini</p>";
      }
    return $output;
}

?>

<a href="index.php">Strona główna</a>

<?php echo(show_restaurant($_GET['id']));?>

<?php echo(show_opinions($_GET['id']));?>

<h3>Dodaj opinię</h3>
<form action="index.php?v=add&id=<?php echo($_GET['id']);?>" method="post">
  <label>Imię</label><br>
  <input type="text" name="name"><br>
  <label>Ocena</label><br>
  <input type="number" min="1" max="6" value="6" name="rate"><br>
  <label>Opinia</label><br>
  <textarea name="opinion"></textarea><br>
  <input type="submit" value="Dodaj opinię">
</form>

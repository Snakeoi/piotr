<?php
function show_restaurants(){
  global $connect;
  $sql ="SELECT id, name FROM restauracje";
      $result = $connect->query($sql);
      $output = '<h2>Lista restauracji</h2>';
      $output .= '<ul>';
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $output .= "<li><a href='index.php?v=restaurant&id={$row['id']}'>{$row['name']}</a></li>";
        }
      } else {
        $output .="<p>Nie ma restauracji.</p>";
      }
      $output .= '</ul>';

    return $output;
}

echo(show_restaurants());

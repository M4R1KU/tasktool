<div class="container">
<div class="row">
  <div class="col-md-4">
    <h2>Test Connection</h2>

<!--
      require_once('lib/ConnectionHandler.php');


      $query = 'SELECT * FROM USER ';

      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->execute();

      $result = $statement->get_result();
      if (!$result) {
          throw new Exception($statement->error);
      }

      $rows = array();
      while ($row = $result->fetch_object()) {
          $rows[] = $row;
      }

      echo '<ul>';
      foreach ($rows as $row ) {
          echo "<li>{$row->name} / {$row->email} / {$row->username} </li>";
      }
      echo '</ul>';
      -->

  </div>
  <div class="col-md-4">
    <h2>Info 2</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
 </div>
  <div class="col-md-4">
    <h2>Info 2</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
  </div>
</div>
</div>

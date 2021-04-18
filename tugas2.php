<html>  
  <head>  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>  
     <body>  
        <div class="container box">
          <h3 align="center"><b>DATATABLE PLAYLIST SPOTIFY</b></h3><br/>
          <?php
          $connect    = mysqli_connect("localhost", "root", "", "spotify"); 
          $query      = '';
          $table_data = '';
          $filename   = "spotifyplaylist.json";
          $data       = file_get_contents($filename); 
          $array      = json_decode($data, true); 
          $jsonData   = json_encode($array);
          file_put_contents('spotifyplaylist.json', $jsonData);
          foreach($array as $row){
          $query .= "INSERT INTO tbl_employee(name, playlist, track) VALUES ('".$row["name"]."', '".$row["playlist"]."', '".$row["track"]."'); ";
           $table_data .= 
           '<tr>
            <td>'.$row["name"].'</td>
            <td>'.$row["playlist"].'</td>
            <td>'.$row["track"].'</td>
            </tr>'; 
          }
          
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
          {
             echo '
              <table class="table table-bordered">
              <tr>
               <th width="35%">Name</th>
               <th width="30%">playlist</th>
               <th width="35%">track</th>
              </tr>';
               echo $table_data;  
               echo '</table>';
                    }
           ?>
      <style>
         .box
         {
          width:750px;
          padding:20px;
          background-color:#B7BDF6;
          border:3px solid black;
          margin-top:100px; 
         }
      </style>
      <br/>
     </div>  
     </body>  
     </html>  
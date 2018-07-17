<!DOCTYPE html>
<html lang="en">
<head>
  <title>SQUARIUM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		$link = new PDO('mysql:host=localhost;dbname=placa', 'root', '');  
	?>
	<div class="container-fluid">
    <div class="row">
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading"><center><img src="/arduino/models/imagen/banner1.jpg" width="1300px" height="250px"></center> </div>
        <div class="panel-body">
          <div class="col-lg-12">
            <div class="col-sm-3">
                <center><button onclick="location.href='/arduino/models/views/index1.php' " type="button" class="btn btn-warning btn-lg">GRAFICO T1 & T2</button></center>
            </div>
            <div class="col-sm-3">
                <center><button onclick="location.href='/arduino/models/views/index.php' " type="button" class="btn btn-success btn-lg">GRAFICO GENERAL</button></center>
            </div>
            <div class="col-sm-3">
              <center><button onclick="location.href='/arduino/models/views/index2.php' " type="button" class="btn btn-primary btn-lg">GRAFICO I-PH-OX</button></center>
            </div>
            <div class="col-sm-3">
             
              <center><button type="button" class="btn btn-info btn-lg"><a target="_blank" href="/arduino/models/SISTEMAS_DE_CONTROL_GRUPO_N1.pdf" style="color: white;">MANUAL USUARIO</a></button></center>
            </div>
          </div>
          <div class="col-lg-12">
              <h4><center>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</center></h4>
            <div class="col-md-6">
              <div class="panel panel-success">
                  <div class="panel-heading">
                    <center><img src="/arduino/models/imagen/t1.jpg" width="150" height="150"></center> 
                    <center><STRONG>SENSORES DE TEMPERATURA</STRONG> </center>
                  </div>
                  <div class="panel-body">
                    <?php foreach ($link->query('SELECT * FROM sensors order by id desc limit 1  ') as $row){ ?>
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;"><strong>TEMPERATURA S1</strong> </th>
                          <th style="text-align: center;"><strong>TEMPERATURA S2</strong> </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div>
                              <center><?php echo '<span style="color:black; font-size:30px;">'.$row["t1"].'</span>';?></center>
                            </div>
                          </td>
                          <td>
                            <div>
                                <center><?php echo '<span style="color:black; font-size:30px;">'.$row["t2"].'</span>';?></center>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                  <?php
                  }
                  ?>
                  </table>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="panel panel-danger">
                  <div class="panel-heading">
                    <center><img src="/arduino/models/imagen/oxi.jpg" width="300" height="150"></center>
                    <center><STRONG>SENSORES DE PH Y OXIGENO</STRONG> </center></div>
                  <div class="panel-body">
                    <?php foreach ($link->query('SELECT * FROM sensors order by id desc limit 1  ') as $row){ ?>
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;"><strong>ILUMINACIÓN</strong> </th>
                          <th style="text-align: center;"><strong> PH </strong> </th>
                          <th style="text-align: center;"><strong> OXÍGENO </strong> </th>
                        </tr>
                      </thead>
                      <tbody> 
                        <tr>
                          <td>
                            <div>
                                <center><?php echo '<span style="color:black; font-size:30px;">'.$row["ilumi"].'</span>';?></center>
                            </div>
                          </td>
                          <td>
                            <div>
                                <center><?php echo '<span style="color:black; font-size:30px;">'.$row["ph"].'</span>';?></center>
                            </div>
                          </td>
                          <td>
                            <div>
                                <center><?php echo '<span style="color:black; font-size:30px;">'.$row["oda"].'</span>';?></center>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                  <?php
                  }
                  ?>
                  </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    </div>      	
</div>
</div>
</div>
</div>
</div>  
<meta http-equiv="refresh" content="5" />
</body>
</html>
<!-- put in ./www directory -->

<html>
 <head>
  <title>DataBase</title>

  <!-- <meta charset="utf-8">  -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
    <?php
	
	//MySQL
    $conn = mysqli_connect('db', 'user', 'test', 'myDb');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    echo("MySQL");

    $query = "SELECT * From Person";
    $result = mysqli_query($conn, $query);

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array())
    {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();

    mysqli_close($conn);
	
	//PostgreSQL
	$conn = pg_connect("host=postgres_db dbname=myDb user=user password=test");

	if (!$conn) {
		echo "Failed to connect to PostgreSQL: " . pg_last_error();
		exit();
	}

	echo "PostgreSQL";

	$query = "SELECT * FROM Person";
	$result = pg_query($conn, $query);

	if (!$result) {
		echo "An error occurred.\n";
		exit();
	}

	echo '<table class="table table-striped">';
	echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
	while ($value = pg_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
		foreach ($value as $element) {
			echo '<td>' . htmlspecialchars($element) . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';

	pg_free_result($result);
	pg_close($conn);
	
    ?>
    </div>
</body>
</html>

<?php
$hostname = "sql2.njit.edu";
$username = "sk2545";
$password = "gkMQzyEKO";
$conn = NULL;
try 
{
    $conn = new PDO("mysql:host=$hostname;dbname=sk2545",$username, $password);
	echo "<b>Connected successfully</b>"."<br>";
	}
	catch(PDOException $e)
	{
	http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
	}
echo"<br>";
						  
function runQuery($query) {
	global $conn;
	    try {
   		$q = $conn->prepare($query);
		$q->execute();
		$results = $q->fetchAll();
		$q->closeCursor();
		return $results;	
		} catch (PDOException $e) {
		http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" .$e->getMessage());
		}	  
	}

$sql = "select * from accounts where id<6 ";
$results = runQuery($sql);
if(count($results) > 0)

{
        echo "No of records:5";
	echo "<table border=\"1\"><tr><th>Id</th><th>Email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
	foreach ($results as $row) {		
	echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["password"]."</td></tr>";
	}
	}
	else{
	echo '0 results';
	}

?>	

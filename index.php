<?php

//echo "<table style='border: solid 1px black;'>";
//echo
//"<tr><th>Id</th><th>Email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
            parent::__construct($it, self::LEAVES_ONLY); 
	        }

    function current() {
	    return "<td style='width:100px;border:1px solid black;'>" . parent::current(). "</td>";
	    }

    function beginChildren() { 
	    echo "<tr>"; 
	    } 

    function endChildren() { 
	    echo "</tr>" . "\n";
	    } 
}

$servername = "sql2.njit.edu";
$username = "sk2545";
$password = "gkMQzyEKO";
$dbname = "sk2545";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=sk2545", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	echo "<b>Connected successfully</b>"."<br>"; 
    	}
	catch(PDOException $e)
	{
	  echo "Connection failed: " . $e->getMessage()."<br>";
	}
echo "<br>";


echo "<table style='border: solid 1px black;'>";
echo
"<tr><th>Id</th><th>Email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";


try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT * FROM accounts where id<6"); 
	$stmt->execute();

	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
		echo $v;
		}	       
	}
	
	catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
	}
	
	
	echo "</table>";


echo $stmt;


?>














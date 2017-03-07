<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Number</th><th>User</th><th>Score</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

	 $DB_host = "ap-cdbr-azure-east-a.cloudapp.net";
	 $DB_user = "b3945d7f4038ce";
	 $DB_pass = "4561cc15";
	 $DB_name = "vrgame";

try {
    $conn = new PDO("mysql:host=$DB_host;dbname=$DB_name", $DB_user,  $DB_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT uid, username, ourgame FROM users2"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

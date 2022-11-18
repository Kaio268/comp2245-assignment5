<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$theCountry = $_GET['country'];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$theCountry%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['lookup'])) 
{
$theCity = $_GET['lookup'];
$stmt2 = $conn->query("SELECT cities.name AS cityName, cities.district AS cityDistrict, cities.population AS cityPopulation, countries.name  FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$theCountry%'");
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if (empty($theCountry)) 
{
echo "No country entered. Cannot fetch cities.";
}
elseif (!(empty($theCity))) 
{
echo "Results: <b>" .$theCountry . ".</b> <br>";

echo 
"<table>
<tr style>
<th>City</th> <th>District</th> <th>Population</th>
</tr>";

foreach ($results2 as $row): 
{

echo 
"<tr>
<td>" . $row['cityName'] . "</td>
<td>" .$row['cityDistrict'] . "</td>
<td>" .$row['cityPopulation'] ."</td>
</tr>";
}
endforeach;
echo "</table>";
}
}

elseif ( (isset($_GET['country']))) 
{
 
if (empty($theCountry)) 
{
echo "Nothing entered, displaying all countries";
}
elseif (!(empty($theCountry)))
{
echo "Results: <b>" .$theCountry . "</b> <br>";
}

echo "<table>
<tr> 
<th>Country</th> <th>Continent</th> <th>Independence year</th> <th>Head of State</th>
</tr>";

foreach ($results as $row): 
  echo 
  "<tr> 
  <td>" . $row['name'] ."</td>" 
  ."<td>" . $row['continent'] . "</td>" 
  ."<td>" . $row['independence_year'] . "</td>"
  ."<td>" . $row['head_of_state'] . "</td>"
  ."</tr>";
  endforeach;
  echo "</table>";
  }



?>




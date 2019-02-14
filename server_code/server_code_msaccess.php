<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=ISO-8859-1");

$conn = new COM("ADODB.Connection");
$conn->open("PROVIDER=Microsoft.Jet.OLEDB.4.0;Data Source=Northwind.mdb");

$rs = $conn->execute("SELECT CompanyName, City, Country FROM Customers");

$outp = "";
while (!$rs->EOF) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"Name":"'  . $rs["CompanyName"] . '",';
  $outp .= '"City":"'   . $rs["City"]        . '",';
  $outp .= '"Country":"'. $rs["Country"]     . '"}';
  $rs->MoveNext();
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo ($outp);
?>

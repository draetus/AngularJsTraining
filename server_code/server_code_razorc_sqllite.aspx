@{
Response.AppendHeader("Access-Control-Allow-Origin", "*")
Response.AppendHeader("Content-type", "application/json")
var db = Database.Open("Northwind");
var query = db.Query("SELECT CompanyName, City, Country FROM Customers");
var outp =""
var c = chr(34)
}
@foreach(var row in query){
if (outp != "") {outp = outp + ","}
outp = outp + "{" + c + "Name"    + c + ":" + c + @row.CompanyName + c + ","
outp = outp +       c + "City"    + c + ":" + c + @row.City        + c + ","
outp = outp +       c + "Country" + c + ":" + c + @row.Country     + c + "}"
}
outp ="{" + c + "records" + c + ":[" + outp + "]}"
@outp

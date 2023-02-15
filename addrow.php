<!DOCTYPE html>
<html>
<head>
<style>
table, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<p>Customer page</p>
 First Name: <input type="text" name="name" id="name" /><br/><br/>
        desc: <input type="text" name="desc" id="desc" /><br/><br/>
        
        Age: <input type="file" name="img" id="img" /><br/><br/>
        <button onclick="addRow();">Add Row</button>
<button onclick="myDeleteFunction()">Delete row</button>
     <br/>

<table id="myTable">
  <tr>
    <th>name</th>
  <th>desc</th>
  <th>image</th>

  </tr>
  
</table>
<br>



<script>
function addRow() {
  var name = document.getElementById('name').value;
                 var desc = document.getElementById('desc').value;
                  var img = document.getElementById('img').value;
                  
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[0];
                  
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(table.rows.length/2+1);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(-1);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
                  
                  // add values to the cells
                  cel1.innerHTML = name;
                  cel2.innerHTML = desc;
                  cel3.innerHTML = img;
  
}

function myDeleteFunction() {
  document.getElementById("myTable").deleteRow(-1);
}
</script>

</body>
</html>

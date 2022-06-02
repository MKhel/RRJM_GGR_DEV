

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>

<table id="customers">
  <tr>
    <th>Applicants Nam</th>
    <th>Particular</th>
    <th>Remarks</th>
    <th>Date Created</th>
  </tr>
  @foreach ($userDataActivity as $data)
        <tr>
            <td>{{$data->particular}}</td>
            <td>{{$data->particular}}</td>
            <td>{{$data->particular}}</td>
            <td>{{$data->particular}}</td>
        </tr>
        @endforeach
 
</table>

</body>
</html>



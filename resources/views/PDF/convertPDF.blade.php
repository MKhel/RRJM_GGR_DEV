

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

<h1>{{$userData->name}}</h1>
<img src="https://cdns.iconmonstr.com/wp-content/releases/preview/2018/240/iconmonstr-user-circle-thin.png" alt="Flowers in Chania" width="240" height="240">
<table id="customers">
  <tr>
    <th>Applicants Nam</th>
    <th>Particular</th>
    <th>Remarks</th>
    <th>Date Created</th>
  </tr>
  @foreach ($userActivities as $data)
        <tr class="border-2 p-2">
            @foreach ($data->applicants as $applicant)
            <td class="border-2 p-2">{{$applicant->last_name }}, {{$applicant->first_name}}</td>
            @endforeach
            
            <td class="border-2 p-2">{{$data->particular}}</td>
            <td class="border-2 p-2">{{$data->remarks}}</td>
            <td class="border-2 p-2 text-center">{{ $data->created_at->format('d M Y')}}</td>
        </tr>
        @endforeach
 
</table>

</body>
</html>



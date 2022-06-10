

<!DOCTYPE html>
<html>
<head>
<style>
html {
  -webkit-text-size-adjust: 100%; /* 2 */
  -moz-tab-size: 4; /* 3 */
  -o-tab-size: 4;
     tab-size: 4; /* 3 */
  font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; /* 4 */
}
#status-content {
  border-collapse: collapse;
  width: 100%;
}

 td {
  border: 1px solid rgb(71, 71, 71);
  padding: 8px;
}

#status-content tr:nth-child(even){background-color: #f2f2f2;}

#status-content tr:hover {background-color: #ddd;}

#status-content th {
  /* padding-top: 12px;
  padding-bottom: 12px; */
  border: 1px solid rgb(71, 71, 71);
  padding: 8px;
  text-align: center;
  font-size: small;
}
.status-header-content{
  padding-top: 1px;
  padding-left: 2px;
  padding-bottom: 1px;
  background-color: #04AA6D;
  color: white;
  font-size: small;
}
#header-image{
  top: 0px;
  right: 0px;
  float: right;
  position: absolute;
}
#header-container img{
  margin-top: 70px;
  margin-right: 10px;
  height: 200px;
  width: 200px;
  border: 3px solid black;
}
#header-text{
  text-align: left;
  margin: 0px;
  padding-left: 20px;
}
</style>
</head>
<body>
  
@foreach ($applicant as $applicants)
    <div class="status-header" >
      <div class="status-header-content" style="padding-left: 20px; ">
        <h2>Last Update: {{$applicants->updated_at->format('m-d-Y') }}</h2>
        {{-- <img style="float: right;" src="images/rrjmlogo.svg" id="photo" alt="user photo" width="200" height="200"> --}}
      </div>
    </div>
    <div id="header-container">
      <div id="header-text">
        <h1 style="margin-top: 2px; margin: 2px; padding-top: 4px; color:green;">#{{$applicants->sn_number}}</h1>
        <h1 style="margin: 2px; padding-top: 4px;">{{$applicants->last_name }}, {{$applicants->first_name}}</h1>
        <br>
        <p style="margin: 2px; font-weight: bold;">EMAIL: <span style="font-weight: normal;">{{$applicants->email_address }}</span> </p>
        <p style="margin: 2px; font-weight: bold;">CONTACT NUMBER: <span style="font-weight: normal;">{{$applicants->contact_number }}</span> </p>
        <p style="margin: 2px; font-weight: bold;">HOME ADDRESS: <span style="font-weight: normal;">{{$applicants->home_address }}</span> </p>
        <p style="margin: 2px; font-weight: bold;">CLASS:  <span style="font-weight: normal;">{{$applicants->class_name }}</span> </p>
      </div>
      <div id="header-image">
{{-- 
           <img src="{{asset('storage/'.$applicants->photo)}}" alt="profile">

            --}}
           <img src="{{public_path('storage/'.$applicants->photo)}}" alt="{{asset('storage/'.$applicants->photo)}}">
            {{-- <img src="{{URL::to('storage/'.$applicants->photo)}} : {{public_path('storage/'.$applicants->photo)}}" id="photo" alt="user photo" width="200" height="200"> --}}
            {{-- <img src="{{public_path('storage/'.$applicants->photo)}}" id="photo" alt="user photo" width="200" height="200"> --}}
        
            {{-- <img src="{{public_path('storage/'.$applicants->photo) ? asset('storage/'.$applicants->photo) : public_path('storage/'.$applicants->photo)}}" alt="profile"> --}}
      </div>
      
    </div> 
    <br>
    <hr>
    <div class="status-container">
      <div class="status-header" >
        <div class="status-header-content" style="padding-left: 20px; ">
          <h2>Status History</h2>
        </div>
      </div>
      <div id="status-content">
        <table >
          <thead >
            <tr>
              <th>DATE</th>
              <th>PARTICULAR</th>
              <th>REMARKS</th>
              <th>JOB APPLICATION STATUS</th>
              <th>BY:</th>
            </tr>
          </thead>
          @foreach ($applicants->useractivities as $applicant)
              
          
          <tbody>
            <tr>
              <td>{{$applicant->created_at->format('m-d-Y') }}</td>
              <td>
              @if ($applicant->role_id == '1' ) <span >Admin</span>
              @elseif ($applicant->role_id == '2') <span >Recruitment</span>
              @elseif ($applicant->role_id == '3') <span >Processing</span>
    
              @endif </td>  
              <td>{{$applicant->remarks }}</td>
              <td>{{$applicant->particular }}</td>
              <td>{{$applicant->user_name }}</td>
              
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>

@endforeach

{{-- <div class="d-flex flex-column">
  <div class="header-text">
    <h1 >{{$applicants->last_name }}, {{$applicants->first_name}}</h1>
    <h3 >Email: Meyeres@rrjm.com</h3>
  </div>
  <div class="header-image">
    <img class=" rounded-full" src="{{asset('storage/'.$applicants->photo)}}" alt="profile">
  </div>   
</div> --}}
{{-- <img class=" rounded-full" src="{{asset('storage/'.$applicants->photo)}}" alt="profile"> --}}
{{-- <img src="{{ public_path('storage/'.$applicants->photo)}}" alt="user photo" width="200" height="200">
<img src="{{ asset('storage/' . $applicants->photo) }}"> --}}



{{-- <table id="customers">
  <tr>
    <th>Applicants Nam</th>
    <th>Particular</th>
    <th>Remarks</th>
    <th>Date Created</th>
  </tr>
  
        <tr class="border-2 p-2">
           
            <td class="border-2 p-2">{{$applicants->last_name }}, {{$applicants->first_name}}</td>

            
            <td class="border-2 p-2">{{$applicants->middle_name}}</td>
            <td class="border-2 p-2">{{$applicants->last_name}}</td>
            <td class="border-2 p-2 text-center">{{ $applicants->created_at->format('d M Y')}}</td>
        </tr>
        @endforeach
 
</table> --}}

{{-- <script>
  const img = document.getElementById('photo');

  const src = img.getAttribute('src');

  if (!src) {
    console.log('img src is empty');
  } else {
    console.log('img src is NOT empty');
  }
</script> --}}
</body>

</html>



<div>
{{-- 
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="px-3 py-3 ">
              <div class="flex items-center justify-center">
                <div class="px-3 py-3 bg-white">
                  <div class="border-4 border-gray-600">
                    <div class="flex">
                      <div class="flex p-6 sm:px-20">
                        
                        <div class="p-3">
                        <div class="text-2xl">
                            Applicants
                        </div>
                        <div class="flex">
                          <div class="mt-6 text-gray-500">
                             selected
                          </div>
                          
                        </div>
                        </div>
                        </div>
                        <div class="px-3 py-3">
                          <a href="/">
                          <img width="50" src="http://127.0.0.1:8000/images/rrjmlogo.svg" alt="RRJM"> </a>
                          <div class="mt-6 text-gray-500">
                            100%
                         </div>
                        </div>
                      </div>
                    </div>

                    
                </div>

                
              </div>
                
            </div>
        
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="mt-4 py-3 px-5 bg-gray-50">Applicant per month</div>
                <canvas class="p-10" id="chartBar"></canvas>
              </div>
              
             
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              
              <script>
                const labelsBarChart = [
                  "January",
                  "February",
                  "March",
                  "April",
                  "May",
                  "June",
                ];
                const dataBarChart = {
                  labels: labelsBarChart,
                  datasets: [
                    {
                      label: "Asklepios", 
                      backgroundColor: "hsl(252, 82.9%, 67.8%)",
                      borderColor: "hsl(252, 82.9%, 67.8%)",
                      data: [0, 10, 5, 2, 20, 30, 45],
                    },
                  ],
                };
              
                const configBarChart = {
                  type: "bar",
                  data: dataBarChart,
                  options: {},
                };
              
                var chartBar = new Chart(
                  document.getElementById("chartBar"),
                  configBarChart
                );
              </script>
        </x-slot>
       

      --}}
      
      <div class="flex items-center justify-between px-4 py-4 sm:px-20 bg-white border-b border-gray-200">
        <div class=" text-2xl mt-8">
            Dashboard
        </div>
        <div class="mt-8">
            
        </div>
      </div>  
       
      <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden ">
                <x-jet-welcome>
                <x-slot name="content1" class="text-center">
                  <span class="text-6xl text-bold">{{$app_count->count()}}</span>
                </x-slot>
                <x-slot name="content2" class="text-center">
                  <span class="text-6xl text-bold">{{$class_count->count()}}</span>
                </x-slot>
                <x-slot name="content3" class="text-center">
                  <span class="text-6xl text-bold">{{$user_count->count()}}</span>
                </x-slot>
                <x-slot name="content4" class="text-center">
                  <span class="text-6xl text-bold">{{$deployed_count->count()}}</span>
                </x-slot>
              </x-jet-welcome>
              <div class="relative bg-white px-6 py-6 pt-10 pb-8 shadow-sm ">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">Announcements</h3>
              </div>
              @foreach ($posts as $post)
                    <div class="px-4 py-1 sm:px-6 bg-white">
                        <div class="mt-3 px-4 py-4 bg-gray-100 rounded-md">
                            <div class="text-sm text-gray-500">
                              Last Posted: {{ $post->created_at->diffForHumans()}}
                            </div>
                            <div class="mt-6 font-bold">
                                {{ $post->announcement_post }}
                            </div>
                            <div class="mt-6 text-gray-500 text-right">
                                Posted by: {{ $post->posted_by }}
                            </div>
                        </div>
                    </div>                        
              @endforeach
            </div>
            
        </div>
    </div>
</div>

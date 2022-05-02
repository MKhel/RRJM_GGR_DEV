<div>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="mt-4 py-3 px-5 bg-gray-50">Applicant per month</div>
                <canvas class="p-10" id="chartBar"></canvas>
              </div>
              
              <!-- Required chart.js -->
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              
              <!-- Chart bar -->
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
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-jet-welcome />
                
                </div>
                
            </div>
        </div>

     
</div>

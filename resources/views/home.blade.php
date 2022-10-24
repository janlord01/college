@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <div class="grid gap-4 p-4 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-4 sm:grid-cols-2 xs:grid-cols-1 break-words">
                    <div class="bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg border-1 rounded-md shadow-sm shadow-lg cursor-pointer text-gray-500 hover:text-blue-500">
                        <div class="das-icon relative flex justify-center mx-8 my-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                            <div class=" sm:text-center">
                                <p class="text-xs mb-1 mt-2 ml-2 text-gray-500 text-xs">STUDENTS</p>
                                <p class="text-xs font-bold text-gray-900">1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg border-1 rounded-md shadow-sm shadow-lg cursor-pointer text-gray-500 hover:text-green-500">
                        <div class="das-icon relative flex justify-center mx-8 my-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="" width="40" height="40" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                            </svg>
                            <div class=" sm:text-center">
                                <p class="text-xs mb-1 mt-2 ml-2 text-gray-500 text-xs">TEACHERS</p>
                                <p class="text-xs font-bold text-gray-900">50</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg border-1 rounded-md shadow-sm shadow-lg cursor-pointer text-gray-500 hover:text-purple-500">
                        <div class="das-icon relative flex justify-center mx-8 my-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                              </svg>
                            <div class=" sm:text-center">
                                <p class="text-xs mb-1 mt-2 ml-2 text-gray-500 md:text-sm"> PARENTS </p>
                                <p class="text-xs font-bold text-gray-900">700</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg border-1 rounded-md shadow-sm shadow-lg cursor-pointer text-gray-500 hover:text-red-500">
                        <div class="das-icon relative flex justify-center mx-8 my-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                              </svg>
                            <div class=" sm:text-center">
                                <p class="text-xs mb-1 mt-2 ml-2 text-gray-500 md:text-sm"> Employees </p>
                                <p class="text-xs font-bold text-gray-900">30</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid gap-4 p-4 md:grid-cols-2 border border-red-solid lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 break-words">
                    <div class=" flex-wrap">
                        <div class="float-left mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-stack text-green-500" viewBox="0 0 16 16">
                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                            </svg>
                        </div>
                        
                        <div class="flex-wrap text-3xl float-left mt-1">P1,000,000</div>
                        <div class="clear-both">
                            <span>Total Income</span>
                        </div>
                    </div>
                    <div class=" flex-wrap">
                        <div class="float-left mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash text-yellow-300" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                              </svg>
                        </div>
                        
                        <div class="flex-wrap text-3xl float-left mt-1">P500,000</div>
                        <div class="clear-both">
                            <span>Total Unpaid</span>
                        </div>
                    </div>
                    <div class=" flex-wrap">
                        <div class="float-left mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-coin text-purple-500" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                              </svg>
                        </div>
                        
                        <div class="flex-wrap text-3xl float-left mt-1">P500,000</div>
                        <div class="clear-both">
                            <span>Total Collected</span>
                        </div>
                    </div>
                    
                </div>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Month', 'MONTHLY TOTAL COLLECTED','MONTHLY OPERATIONAL EXPENSES','MONTHLY MARKETING EXPENSE'],
                        ['Feb 2022', '100000','10000','20000'],
                        ['March 2022', '100000','10000','20000'], 
                        ['April 2022', '100000','10000','20000'], 
                        
                       
                        ]);

                        var options = {
                        chart: {
                            title: 'School Payment(Monthly)',
                            subtitle: 'Sales, Paid, and Unpaid: Oct-July',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                </script>
                <div id="columnchart_material" class="my-8 m-auto h-1/2" style="height: 500px"></div>
                
                <table class="min-w-full w-full info-table table-auto border-collapse md:table mb-5">
                    <thead class="block md:table-header-group">

                        <tr class="border border-grey-300 md:border-none sm:hidden block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative tabletr">
                            <th style="border-right: 1px #c2c2c2 solid;" colspan="2" class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell"></th>
                            <th style="border-right: 1px #c2c2c2 solid;border-bottom: 1px #c2c2c2 solid;" colspan="2" class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell text-center">Account Receivable</th>
                            <th style="border-right: 1px #c2c2c2 solid;border-bottom: 1px #c2c2c2 solid;" colspan="2" class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell text-center">Cash Collected</th>
                        </tr> 
                        <tr class="border border-grey-300 md:border-none sm:hidden block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative tabletr">
                            <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Courses</th>
                            <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell" style="border-right: 1px #c2c2c2 solid;">No. of Students</th>
                            <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell" style="border-right: 1px #c2c2c2 solid;">Amount</th>
                            <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell" style="border-right: 1px #c2c2c2 solid;">Percentage</th>
                            <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell" style="border-right: 1px #c2c2c2 solid;">Amount</th>
                            <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Percentage</th>
                        </tr> 
                    </thead>
                    <tbody class="md:table-row-group">
                        <tr class="border border-grey-500 md:border-none block md:table-row">
                                
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold text-sm sm:inline block text-black pr-1">BSIT</p>
                                    </div>
                                    </div>
                            </td>
                            <td  class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                <span class="inline-block md:hidden font-bold pr-1 "> </span>1000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>600,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>60%
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>400,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>40%
                            </td>
                            
                        </tr>
                        <tr class="border border-grey-500 md:border-none block md:table-row">
                                
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold text-sm sm:inline block text-black pr-1">BSBA</p>
                                    </div>
                                    </div>
                            </td>
                            <td  class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                <span class="inline-block md:hidden font-bold pr-1 "> </span>1500
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>300,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>30%
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>700,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>70%
                            </td>
                            
                        </tr>
                        <tr class="border border-grey-500 md:border-none block md:table-row">
                                
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold text-sm sm:inline block text-black pr-1">COMSCI</p>
                                    </div>
                                    </div>
                            </td>
                            <td  class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                <span class="inline-block md:hidden font-bold pr-1 "> </span>500
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>500,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>50%
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>500,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>50%
                            </td>
                            
                        </tr>
                        <tr class="border border-grey-500 md:border-none block md:table-row">
                                
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold text-sm sm:inline block text-black pr-1">BS CRIM</p>
                                    </div>
                                    </div>
                            </td>
                            <td  class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                <span class="inline-block md:hidden font-bold pr-1 "> </span>3000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>500,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>50%
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>500,000
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block md:hidden font-bold pr-1 "></span>50%
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </section>
    </div>
</main>
@endsection

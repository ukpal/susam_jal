@extends('backend.layouts.default')
@section('page_title', 'Dashboard')
@section('content')

<style>
    #table{
        width: 100%
    }
    /* table {
        border-collapse: collapse;
        border-spacing: 10px 5px;
    } */
    td, th {
    border: 1px solid rgba(153, 153, 153, 0.534);
    height: 80px;
    width: 14.5%;
    /* padding: 0.5rem; */
    }
    /* .table>:not(caption)>*>*{
        padding: 2rem;
    } */
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h5 class="card-title mb-3">Calender</h5> --}}
                <div class="dropdown mb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Jump To:
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item {{($current_Month==1 ? 'active' : '')}}" href="{{url('calender').'/1/'.$year}}">January</a></li>
                      <li><a class="dropdown-item {{($current_Month==2 ? 'active' : '')}}" href="{{url('calender').'/2/'.$year}}">February</a></li>
                      <li><a class="dropdown-item {{($current_Month==3 ? 'active' : '')}}" href="{{url('calender').'/3/'.$year}}">March</a></li>
                      <li><a class="dropdown-item {{($current_Month==4 ? 'active' : '')}}" href="{{url('calender').'/4/'.$year}}">April</a></li>
                      <li><a class="dropdown-item {{($current_Month==5 ? 'active' : '')}}" href="{{url('calender').'/5/'.$year}}">May</a></li>
                      <li><a class="dropdown-item {{($current_Month==6 ? 'active' : '')}}" href="{{url('calender').'/6/'.$year}}">June</a></li>
                      <li><a class="dropdown-item {{($current_Month==7 ? 'active' : '')}}" href="{{url('calender').'/7/'.$year}}">July</a></li>
                      <li><a class="dropdown-item {{($current_Month==8 ? 'active' : '')}}" href="{{url('calender').'/8/'.$year}}">August</a></li>
                      <li><a class="dropdown-item {{($current_Month==9 ? 'active' : '')}}" href="{{url('calender').'/9/'.$year}}">September</a></li>
                      <li><a class="dropdown-item {{($current_Month==10 ? 'active' : '')}}" href="{{url('calender').'/10/'.$year}}">October</a></li>
                      <li><a class="dropdown-item {{($current_Month==11 ? 'active' : '')}}" href="{{url('calender').'/11/'.$year}}">November</a></li>
                      <li><a class="dropdown-item {{($current_Month==12 ? 'active' : '')}}" href="{{url('calender').'/12/'.$year}}">December</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{url('calender').'/'.($current_Month-1).'/'.$year}}">&lt;PREV</a>
                    </div>
                    <div class="col text-center">
                        <h3><strong>{{date("F", mktime(null, null, null, $current_Month, 1))}}</strong>, {{$year}}</h3>
                    </div>
                    <div class="col text-end">
                        <a href="{{url('calender').'/'.($current_Month+1).'/'.$year}}">NEXT&gt;</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class=" text-center " id="table" >
                    <tr class="bg-light fs-4">
                        
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                        <th class="text-danger">Sun</th>
                    </tr>
                    <tr>
                        <?php
                        // print_r($offDays);
                        // echo var_dump(date("Y/m/d"));
                        
                        $row_number = 1;
                        for($i = 1; $i <= $offset; $i++)
                        {
                        echo "<td></td>";
                        }
                        //  this will print the number of days.
                        for($day = 1; $day <= $numberOfDays; $day++)
                        {
                            $key = array_search($day, array_column($offDays, 'day'));
                            if( ($day + $offset - 1) % 7 == 0 && $day != 1)
                            {
                                echo "</tr> <tr>";
                                    // echo var_dump("$year".'/0'."$current_Month".'/'."$day");
                                $row_number++;
                            }
                            if(isset($offDays[$key]->day) && $offDays[$key]->day==$day){
                                echo "<td style='background-color:rgba(255, 0, 0, 0.34)'>" . $day."<br>".$offDays[$key]->description . "</td>";
                            }elseif(date("Y/m/d")==("$year".'/0'."$current_Month".'/'."$day")){
                                echo "<td style='background-color:rgba(0, 128, 0, 0.318)'>" . $day . "</td>";
                            }else{
                                echo "<td>" . $day . "</td>";
                            }
                            
                        }
                        while( ($day + $offset) <= $row_number * 7)
                        {
                        echo "<td></td>";
                        $day++;
                        }
                        ?>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>
</div>

@stop
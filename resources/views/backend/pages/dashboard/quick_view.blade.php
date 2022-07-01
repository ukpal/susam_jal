<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" style="background-color: #fcefee">
              Employees
            </div>
            <div class="card-body">
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text fs-3">
                  {{(empty($emps)) ? '0' : $emps}}
              </p>
              <a href="{{url('employees')}}" class="btn btn-primary">All Employees</a>
            </div>
        </div>
    </div>    
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" style="background-color: #e2f3f5">
              Users
            </div>
            <div class="card-body">
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text fs-3">
                {{(empty($users)) ? '0' : $users}}
              </p>
              <a href="{{url('users')}}" class="btn btn-primary">All Users</a>
            </div>
        </div>
    </div>    
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" style="background-color: #f0f0f0">
              Surveyors
            </div>
            <div class="card-body">
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text fs-3">
                {{(empty($surveyors)) ? '0' : $surveyors}}
              </p>
              <a href="{{url('surveyors')}}" class="btn btn-primary">All Surveyors</a>
            </div>
        </div>
    </div>    
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" style="background-color: #fffeb8">
              Surveys
            </div>
            <div class="card-body">
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text fs-3">
                {{(empty($surveys)) ? '0' : $surveys}}
              </p>
              <a href="{{url('all-survey')}}" class="btn btn-primary">All Surveys</a>
            </div>
        </div>
    </div>    
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" style="background-color: #ecfffb">
              Districts
            </div>
            <div class="card-body">
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text fs-3">
                {{(empty($districts)) ? '0' : $districts}}
              </p>
              <a href="{{url('all-survey')}}" class="btn btn-primary">All Districts</a>
            </div>
        </div>
    </div>    
</div>
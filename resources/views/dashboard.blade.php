 @extends('layouts.default')
 @section('title', 'Dashboard')
 @section('role', 'Admin')
     

 @section('content')
     
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
 </div>

 <!-- Content Row -->
 <div class="row">

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             Books</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$book_count}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-book fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             Categories</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$category_count}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-list fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     

     <!-- Pending Requests Card Example -->
     <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                             Users</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_count}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-user fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Content Row -->

 <div class="row">

    <div class="col">
        <div class="card shadow">
            <div class="card-header">
              Rent Logs
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">User</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Rent Date</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Actual Return Date</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="7" class="text-center"><div class="alert alert-danger">No data yet.</div> </td>
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
 </div>

 <!-- Content Row -->

 @endsection
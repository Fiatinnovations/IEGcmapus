@extends('layouts.master')
@section('content')

<section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3 float-left">
                        <div>
                                @if ($errors->any())
                            <div class="alert alert-danger">
                               <ul>
                                     @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                     @endforeach
                               </ul>
                         @endif
                         </div>
                        </div>
                        
                        @if (session('message'))
                        <div class="alert alert-success">
                           {{session('message')}}  
                        </div>                                         
                        @endif
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>
        </div>
    </section>



<section id="autofill">
        <div class="row">
            <div class="col-12">
                <div class="card">
                 
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                       
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered auto-fill dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 136px;">
                                            First Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 215px;">
                                            Last Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">
                                            University</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 33px;">
                                            Course</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 85px;">
                                            Admission status</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81px;">
                                            Action</th></tr>
                                </thead>
                                <tbody>   
                                    @foreach ($agentProspects as $prospect)
                                    <tr role="row" class="odd">
                                    <td class="sorting_1">{{$prospect->first_name}}</td>
                                    <td>{{$prospect->last_name}}</td>
                                    <td>{{$prospect->university->name}}</td>
                                    <td>{{$prospect->email}}</td>
                                    <td>{{$prospect->admission}}</td>
                                            <td>
                                            <button class="btn btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i></button>
                                            <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;"><a class="dropdown-item" href="{{route('prospect', $prospect->slug)}}"><i class="fas fa-eye"></i> View</a><a class="dropdown-item" href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Update</a><a onclick="return confirm('Do you want to delete this Prospect ?')" class="dropdown-item" href="{{route('deleteprospect', $prospect->slug)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                            </div>      
                                            </td>
                                        </tr>  
                                    @endforeach    
                               
                                </tbody>

                            </table></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
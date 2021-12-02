@extends('layouts.admin')
@section('content')
@section('employee_select','active') 
<div class="admin-head d-flex align-items-center justify-content-between pb-3">
    <h4 class="content-head">Employee List</h4>
    <div class=""><a href="{{url(route('employee-management.create'))}}" class="btn btn-primary">Add Employee</a></div>
</div>

<!-- My Brands Section HTML -->
<div class="my-brand-section overflow-hidden">
    <div class="table-responsive">
        <table id="dataTableExample" class="table">
            <thead>
                <tr>
                    <th class="">First Name</th>
                    <th class="">Last Name</th>
                    <th class="">Company Name</th>
                    <th class="">Email</th>
                    <th class="">Phone</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($employee ?? '')
                    @foreach($employee ?? '' as $Data) 
                        <tr>
                            <td class="rating-list">
                                <span>{{ucwords($Data->first_name)}}</span> 
                            </td>
                            <td class="rating-list">
                                <span>{{ucwords($Data->last_name)}}</span>
                            </td>
                            <td class="rating-list">
                                <span>{{ucwords($Data->name)}}</span>
                            </td>
                            <td class="rating-list">
                                <span>{{$Data->email}}</span> 
                            </td>
                            <td class="rating-list">
                                <span>{{$Data->phone}}</span> 
                            </td>
                            <td class="action-button" width="150px;">
                                <a href="{{url(route('employee-management.edit',$Data->id))}}" class="text-primary"  data-toggle="tooltip"  title="Edit">
                                    <img src="{{asset('img/blue-edit-icon.svg')}}" alt="Edit Icon" />
                                </a>
                                <form action="{{url(route('employee-management.destroy',$Data->id))}}" method="POST"> 
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="text-primary" onclick=" return confirm('Are you sure want to delete this record?');" data-toggle="tooltip" title="Delete"><img src="{{asset('img/blue-delete-icon.svg')}}" alt="Delete Icon" /></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
               @endif
            </tbody>
        </table>
        @if(count($employee) < 1) 
            <div class="no-record">No record found.</div>
        @endif
        <div class="pagination">{{$employee->links()}}</div>
    </div>
</div>
@endsection 
@extends('layouts.admin')
@section('content')
@section('employee_select','active')	
<h5 class="text-left pl-3">Edit Employee</h5>
<div class="admin-head d-flex align-items-center justify-content-end">
    <div class=""><a href="{{url(route('employee-management.index'))}}" class="btn btn-primary">Back</a></div>
</div>
<div class="col-6">
	@if($employee)
	<form action="{{route('employee-management.update',$employee->id)}}" method="post">
		@csrf
		@method('put')
		<div class="form-group">
			<label>Company List</label>
			<select class="form-control" name="company_id">
				@if($company_name ?? '')
					@foreach($company_name ?? '' as $Data)
						<option value="{{$Data->id}}" @if($Data->id == $employee->company) selected="selected" @endif>{{$Data->name}}</option>
					@endforeach
				@endif
			</select>
			@error('company_id')
				<span class="text-danger" role="alert">
					<strong>The category is required</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}">
			@error('first_name')
				<span class="text-danger" role="alert">
					<strong>{{$message}}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}">
			@error('last_name')
				<span class="text-danger" role="alert">
					<strong>{{$message}}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" value="{{$employee->email}}" readonly>
			@error('email')
				<span class="text-danger" role="alert">
					<strong>{{$message}}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label>Phone</label>
			<input type="text" name="phone" class="form-control" value="{{$employee->phone}}" readonly>
			@error('phone')
				<span class="text-danger" role="alert">
					<strong>{{$message}}</strong>
				</span>
			@enderror
		</div>
		<div class="text-left">
			<button type="submit" class="btn btn-success">Update</button>
		</div>
	</form>	
	@endif			
</div>
@endsection

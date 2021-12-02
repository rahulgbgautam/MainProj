@extends('layouts.admin')
@section('content')
@section('company_select','active') 
<div class="admin-head d-flex align-items-center justify-content-between pb-3">
    <h4 class="content-head">Company List</h4>
</div>

<!-- My Brands Section HTML -->
<div class="my-brand-section overflow-hidden">
    <div class="table-responsive">
        <table id="dataTableExample" class="table">
            <thead>
                <tr>
                    <th class="">Company Name</th>
                    <th class="">Email</th>
                    <th class="">Logo</th>
                    <th class="">Website</th>
                </tr>
            </thead>
            <tbody>
                @if($company ?? '')
                    @foreach($company ?? '' as $Data) 
                        <tr>
                            <td class="rating-list">
                                <span>{{ucwords($Data->name)}}</span> 
                            </td>
                            <td class="rating-list">
                                <span>{{$Data->email}}</span> 
                            </td>
                            <td class="rating-list">
                                <img src="{{showImage($Data->logo)}}" style="width: 60px;height: auto;">
                            </td>
                            <td class="rating-list">
                                <span>{{$Data->website}}</span> 
                            </td>
                        </tr>
                    @endforeach
               @endif
            </tbody>
        </table>
        @if(count($company) < 1) 
            <div class="no-record">No record found.</div>
        @endif
        <div class="pagination">{{$company->links()}}</div>
    </div>
</div>
@endsection 
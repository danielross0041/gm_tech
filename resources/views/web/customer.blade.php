@extends('web.layouts.main') @section('content')
<div class="" style="min-height: 540px;">
    <style>
        .table-responsive {
            height: 600px;
        }
    </style>
    <div class="main-wrapper container">
        <div class="page-wrapper page-wrapper-four" style="min-height: 540px;">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-two">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Recent Service Requests</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="table-responsive">
                                        <table class="table table-stripped table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($requests as $request)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#">
                                                                <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="http://gmenertechcorp.demo-orbitdesignagency.com/public/profile_image/1652220855.png" alt="User Image" />
                                                                {{$request->name}}
                                                            </a>
                                                        </h2>
                                                    </td>
                                                    <td>${{$request->invoice? $request->invoice->amount:'0'}}</td>
                                                    <td>{{date("M d,Y" ,strtotime($request->created_at))}}</td>
                                                    <td><span class="badge {{$request->is_paid == 0?'bg-fail-light':'bg-success-light'}} ">{{$request->is_paid == 0?'Unpaid':'Paid'}}</span></td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <!-- <a class="dropdown-item" href="#"><i class="far fa-edit me-2"></i>Edit</a> -->
                                                                
                                                                <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt me-2"></i>Delete</a> -->
                                                                @if($request->is_paid == 0)
                                                                <a class="dropdown-item" href="{{route('entry',$request->id)}}"><i class="fas fa-recycle me-2"></i>Process</a>
                                                                @else
                                                                <a class="dropdown-item" href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-id="{{$request->id}}" id="invoice_modal"><i class="far fa-eye me-2"></i>View</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="certificate-poppup" tabindex="-1" aria-labelledby="certificate-poppupLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="certification-set" id="invoice_modal_div">
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="certificate-logo">
                                <img src="{{asset('web/assets/img/logo-certificate.png')}}" class="img-fluid" alt="img" />
                                <ul>
                                    <li>Heating</li>
                                    <li>Air Conditioning</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

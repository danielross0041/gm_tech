@extends('web.layouts.main')
@section('content')

<div class="" style="min-height: 540px;">
    <section class="inner-tabs">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="technician">
                        <div class="content container">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title parts-css">Technicians</h3>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card invoices-tabs-card">
                                <div class="card-body card-body pt-0 pb-0">
                                    <div class="invoices-main-tabs">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8 col-md-8">
                                                <div class="invoices-tabs"></div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="invoices-settings-btn">
                                                    <a href="invoices-settings.html" class="invoices-settings-icon">
                                                        <i data-feather="settings"></i>
                                                    </a>
                                                    <a href="javavoid:;" id="add-tech-button" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i data-feather="plus-circle"></i> Add Technician </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-table">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-stripped table-hover datatable">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>S#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th >Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($techs as $key => $part)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$part->name}}</td>
                                                            <td>{{$part->email}}</td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item edit-tech" data-id="{{$part->id}}" data-name="{{$part->name}}" data-email="{{$part->email}}"><i class="far fa-edit me-2"></i>Edit</a>
                                                                        <a class="dropdown-item" href="{{route('delete_tech',$part->id)}}"><i class="far fa-edit me-2"></i>Delete</a>
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
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Parts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card invoices-add-card m-0">
                                <div class="card-body p-0">
                                    <form class="invoices-form" action="{{route('technician_submit')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="record_id" id="record_id" value="" />
                                        <div class="invoices-main-form">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Name</label>
                                                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name" required autocomplete="off"/>
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" required autocomplete="off"/>
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Password</label>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" required autocomplete="off"/>
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group float-right mb-0">
                                                    <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

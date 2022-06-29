@extends('web.layouts.main')
@section('content')
<div class="" style="min-height: 540px;">
    <section class="inner-tabs">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="content container">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs breadcrumb add-btns" id="myTab" role="tablist">
                                    <li class="breadcrumb-item active" role="presentation">
                                        <a href="javavoid:;" class="active" id="Parts-tab" data-bs-toggle="tab" data-bs-target="#Parts" type="button" role="tab" aria-controls="Parts" aria-selected="true">
                                            <i class="fa fa-cog" aria-hidden="true"> </i> Add Parts
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" role="presentation">
                                        <a href="javavoid:;" id="Labors-tab" data-bs-toggle="tab" data-bs-target="#Labors" type="button" role="tab" aria-controls="Labors" aria-selected="false" class="">
                                            <i class="fa fa-users" aria-hidden="true"> </i> Add Labors
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="Parts" role="tabpanel" aria-labelledby="Parts-tab">
                        <div class="content container">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title parts-css">Parts</h3>
                                    </div>
                                </div>
                            </div>
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
                                                    <a href="javavoid:;" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i data-feather="plus-circle"></i> Add Parts </a>
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
                                                            <th>Part ID</th>
                                                            <th>Values</th>
                                                            <th>Parts</th>
                                                            <th>Description</th>
                                                            <th>Components</th>
                                                            <th>Unit Price</th>
                                                            <th>Sell Price</th>
                                                            <th>Location</th>
                                                            <th>Quantity Price</th>
                                                            <th class="text-end">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($parts as $key => $part)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$part->value}}</td>
                                                            <td>{{$part->part}}</td>
                                                            <td>{{$part->description}}</td>
                                                            <td>{{$part->component}}</td>
                                                            <td>${{$part->unit_price}}</td>
                                                            <td>${{$part->sell_price}}</td>
                                                            <td>{{$part->location}}</td>
                                                            <td>{{$part->quantity_price}}</td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item edit-part" data-id="{{$part->id}}" data-value="{{$part->value}}" data-part="{{$part->part}}" data-description="{{$part->description}}" data-component="{{$part->component}}" data-unit_price="{{$part->unit_price}}" data-sell_price="{{$part->sell_price}}" data-location="{{$part->location}}" data-quantity_price="{{$part->quantity_price}}" ><i class="far fa-edit me-2"></i>Edit</a>
                                                                        <a class="dropdown-item" href="{{route('delete_part',$part->id)}}"><i class="far fa-edit me-2"></i>Delete</a>
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
                    <div class="tab-pane fade" id="Labors" role="tabpanel" aria-labelledby="Labors-tab">
                        <div class="content container">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title parts-css">Labors</h3>
                                    </div>
                                </div>
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
                                                        <a href="javavoid:;" data-bs-toggle="modal" data-bs-target="#laborModal" class="btn"> <i data-feather="plus-circle"></i> Add New Labor </a>
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
                                                                <th>ID</th>
                                                                <th>Tech</th>
                                                                <th>Work Date</th>
                                                                <th>Hours</th>
                                                                <th>Pay Type</th>
                                                                <th>Hourly Rate</th>
                                                                <th class="text-end">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($labours as $k => $labour)
                                                            <tr>
                                                                <td>{{++$k}}</td>
                                                                <td>{{$labour->tech}}</td>
                                                                <td>{{$labour->work_date}}</td>
                                                                <td>{{$labour->hours}}</td>
                                                                <td>{{$labour->pay_type}}</td>
                                                                <td>${{$labour->hourly_rate}}</td>
                                                                <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item edit-labour" data-id="{{$labour->id}}" data-tech="{{$labour->tech}}" data-work_date="{{$labour->work_date}}" data-hours="{{$labour->hours}}" data-pay_type="{{$labour->pay_type}}" data-hourly_rate="{{$labour->hourly_rate}}"  ><i class="far fa-edit me-2"></i>Edit</a>
                                                                        <a class="dropdown-item" href="{{route('delete_labour',$labour->id)}}"><i class="far fa-edit me-2"></i>Delete</a>
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="content container">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs breadcrumb add-btns" id="myTab" role="tablist">
                                    <li class="breadcrumb-item active" role="presentation">
                                        <a href="javavoid:;" class="active" id="work-tab" data-bs-toggle="tab" data-bs-target="#work" type="button" role="tab" aria-controls="work" aria-selected="true">
                                            <i class="fa fa-check-circle-o" aria-hidden="true"></i> Work Performed
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" role="presentation">
                                        <a href="javavoid:;" id="recomend-tab" data-bs-toggle="tab" data-bs-target="#recomend" type="button" role="tab" aria-controls="recomend" aria-selected="false">
                                            <i class="fa fa-check-circle-o" aria-hidden="true"></i> Recomendations
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" role="presentation">
                                        <a href="javavoid:;" id="Field-tab" data-bs-toggle="tab" data-bs-target="#Field" type="button" role="tab" aria-controls="Field" aria-selected="false">
                                            <i class="fa fa-check-circle-o" aria-hidden="true"></i> Field Notes
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="work" role="tabpanel" aria-labelledby="work-tab">
                        <div class="content container">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title parts-css">Work Performed</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="invoices-links active">
                                            <i data-feather="list"></i>
                                        </a>
                                        <a href="#" class="invoices-links">
                                            <i data-feather="grid"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card invoices-add-card">
                                        <div class="card-body">
                                            <div class="invoices-main-form">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Components</label>
                                                        <input class="form-control" type="text" name="work_component" id="work_component" placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Work Performed</label>
                                                            <input class="form-control" type="text" name="work_performed" id="work_performed" placeholder="" />
                                                            <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Current Work Performed</label>
                                                            <textarea name="current_work_performed" id="current_work_performed" rows="10" cols="80"></textarea>
                                                            <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
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
                    <div class="tab-pane fade" id="recomend" role="tabpanel" aria-labelledby="recomend-tab">
                        <div class="content container">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title parts-css">Recomendations</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="invoices-links active">
                                            <i data-feather="list"></i>
                                        </a>
                                        <a href="#" class="invoices-links">
                                            <i data-feather="grid"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card invoices-add-card">
                                        <div class="card-body">
                                            <form class="invoices-form" method="POST">
                                                <div class="invoices-main-form">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Components</label>
                                                            <input class="form-control" type="text" name="recom_component" id="recom_component" placeholder="" />
                                                            <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Recommendation</label>
                                                                <input class="form-control" type="text" name="recommendation" id="recommendation" placeholder="" />
                                                                <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Current Recommendation</label>
                                                                <textarea name="current_recommendation" id="current_recommendation" rows="10" cols="80"></textarea>
                                                                <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                            </div>
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
                    <div class="tab-pane fade" id="Field" role="tabpanel" aria-labelledby="Field-tab">
                        <div class="content container">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title parts-css">Field Notes</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card invoices-add-card">
                                        <div class="card-body">
                                            <form class="invoices-form" method="POST">
                                                <div class="invoices-main-form">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Components</label>
                                                            <input class="form-control" type="text" name="note_component" id="note_component" placeholder="" />
                                                            <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea name="current_note" id="current_note" rows="10" cols="80"></textarea>
                                                                <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                            </div>
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
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <section class="faqs-accordion">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 co-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Payments Details
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="payment-total">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <h2>Total</h2>
                                                            <div class="custom-input">
                                                                <label>Grand Total</label>
                                                                <input type="text" value="${{$amount}}" readonly="">
                                                            </div>
                                                            <div class="custom-input">
                                                                <label>Credits</label>
                                                                <input type="text" value="00" readonly="">
                                                            </div>
                                                            <div class="custom-input">
                                                                <label>Amount Due</label>
                                                                <input type="text" value="${{$amount}}" readonly="">
                                                            </div>
                                                            <h2>Payment Entry</h2>
                                                            <div class="custom-input">
                                                                <label>Amount</label>
                                                                <input type="text" value="${{$amount}}" readonly="">
                                                            </div>
                                                            <div class="custom-input">
                                                                <label>Payment Type</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected="">Open this select menu</option>
                                                                    <option value="1">One</option>
                                                                    <option value="2">Two</option>
                                                                    <option value="3">Three</option>
                                                                </select>
                                                            </div>
                                                            <div class="buttons-action">
                                                                <a href="javavoid:;" class="payment-btn"><img src="{{asset('web/assets/img/card-process.png')}}" class="img-fluid" alt="img" />Process Card</a>
                                                                <a href="javavoid:;" class="payment-btn"><img src="{{asset('web/assets/img/Accept-process.png')}}" class="img-fluid" alt="img" />Accept</a>
                                                                <a href="javavoid:;" class="payment-btn"><img src="{{asset('web/assets/img/cancel-process.png')}}" class="img-fluid" alt="img" />Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Work Order Preview
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="certification-set">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <div class="certificate-logo">
                                                                <img src="{{asset('web/assets/img/logo-certificate.png')}}" class="img-fluid" alt="img" />
                                                                <ul>
                                                                    <li>Air Conditioning &</li>
                                                                    <li>Heating Services</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="certificate-info">
                                                        <div class="row ">
                                                            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                <p>Name : {{$service->name}}</p>
                                                                <p>Email : {{$service->email}}</p>
                                                                <p>Jobsite : {{$service->location}}</p>
                                                                <a href="tel:{{$service->phone}}">{{$service->phone}}</a>
                                                            </div>
                                                            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                <p>Bill to : {{$service->location}}</p>
                                                            </div>
                                                            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                <h4>Invoice : 175558588</h4>
                                                                <p>Site : GM Ener Tech Corp 67 Valentine St, Glen Cove, NY 11542</p>
                                                                <a href="tel:123 456 7891">Tel: (516) 675-4345</a>
                                                                <a href="tel:123 456 7891">Email: info@gmenertech.com</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-start-center">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">TechName</th>
                                                                    <th scope="col">Terms</th>
                                                                    <th scope="col">TaxGroup</th>
                                                                    <th scope="col">PO</th>
                                                                    <th scope="col">PriceLevel</th>
                                                                    <th scope="col">Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($labours as $labour)
                                                                <tr>
                                                                    <td>{{$labour->tech}}</td>
                                                                    <td>DueNow</td>
                                                                    <td>Nassou</td>
                                                                    <td></td>
                                                                    <td>Standard</td>
                                                                    <td>{{date("M d,Y" ,strtotime($labour->work_date))}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- <div class="table-start">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Problem</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$service->problem}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> -->
                                                    <div class="table-center text-left">
                                                        <ul>
                                                            <li>Problem</li>
                                                            <li>
                                                                <p>{{$service->problem}}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="table-center text-left">
                                                        <ul>
                                                            <li>Work Performed</li>
                                                            <li>
                                                                <h6 id="work_performed_display"></h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- <div class="table-start">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Work Performed</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td id="work_performed_display"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> -->
                                                    <div class="table-center text-left">
                                                        <ul>
                                                            <li>Recomendation</li>
                                                            <li>
                                                                <h6 id="recommendation_display"></h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- <div class="table-start">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Recomendation</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td id="recommendation_display"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> -->
                                                    <div class="table-start-center">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Part</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Unit Price</th>
                                                                    <th scope="col">Ext Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $total = 0;
                                                                @endphp
                                                                @foreach($parts as $part)
                                                                <tr>
                                                                    <td>{{$part->part}}</td>
                                                                    <td>{{$part->quantity_price}}</td>
                                                                    <td>${{$part->sell_price}}</td>
                                                                    <td>${{($part->quantity_price*$part->sell_price)}}</td>
                                                                    @php
                                                                    $total += ($part->quantity_price*$part->sell_price);
                                                                    @endphp
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="table-start-center">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Labour</th>
                                                                    <th scope="col">Hour Rate</th>
                                                                    <th scope="col">Hours</th>
                                                                    <th scope="col">Ext Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($labours as $labour)
                                                                <tr>
                                                                    <td>{{$labour->tech}}</td>
                                                                    <td>${{$labour->hourly_rate}}</td>
                                                                    <td>{{$labour->hours}}</td>
                                                                    <td>${{($labour->hours*$labour->hourly_rate)}}</td>
                                                                    @php
                                                                    $total += ($labour->hours*$labour->hourly_rate);
                                                                    @endphp
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>Total: </td>
                                                                    <td>${{$amount}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="table-center-height">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Approval</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="table-center">
                                                        <ul>
                                                            <li>Terms Condition and Limitation</li>
                                                            <li>
                                                                <p>
                                                                    I HAVE THE AUTHORITY TO ORDER THE ABOVE DESCRIBED WORK. IT IS AGREED THAT THE SELLER WILL RETAIN TITLE TO ANY EQUIPMENT OR MATERIAL FURNISHED UNTIL FULL AND COMPLETE
                                                                    PAYMENT IS MADE, AND IF SETTLEMENT IS NOT MADE AS AGREED, THE SELLER SHALL HAVE THE RIGHT TO REMOVE SAME AND THE SELLER SHALL BE HELD HARMLESS FOR DAMAGES RESULTING FROM
                                                                    THE REMOVAL THEREOF. IF THIS INVOICE IS NOT PAID WITHIN 30 DAYS I AGREE TO PAY 1-5% PER MONTH {18% ANNUAL RATE) OR THE MAXIMUM ALLOWED IN THE STATE OF RESIDENCE ON THE
                                                                    UNPAID BALANCE. IF THIS INVOICE IS PLACED FOR COLLECLION, I AGREE TO PAY SELLER'S ATTORNEY FEES AND REASONABLE COURT COSTS.
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <button class="btn approve-btn" id="approve" data-amount = {{$amount}} data-id = {{$id}}>Approved</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                                    <form class="invoices-form" action="{{route('part_submit')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="request_id" value="{{$id}}" />
                                        <input type="hidden" name="record_id" id="record_id" value="" />
                                        <div class="invoices-main-form">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Values</label>
                                                    <input class="form-control" type="text" name="value" id="value" placeholder="" required />
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Parts</label>
                                                        <input class="form-control" type="text" name="part" id="part" placeholder="" required />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input class="form-control" type="text" name="description" id="description" required placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Components</label>
                                                    <input class="form-control" type="text" name="component" id="component" required placeholder="" />
                                                    <!-- <select class="form-select" name="components">
														<option>-- Select --</option>
														<option value="1">Quo aspernatur odit</option>    
														<option value="2">Aliquip porro ipsa</option>    
													</select> -->
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Unit Price</label>
                                                        <input class="form-control" name="unit_price" required type="number" id="unit_price" placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Sell Price</label>
                                                        <input class="form-control" name="sell_price" required type="number" id="sell_price" placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Location</label>
                                                    <input class="form-control" type="text" name="location" id="location" required placeholder="" />
                                                    <!-- <select class="form-select" name="location">
														<option>-- Select --</option>
														<option value="location1">Location1</option>
														<option value="location2">Location2</option>
														<option value="location3">Location3</option>
														<option value="location4">Location4</option>
														<option value="location5">Location5</option>
													</select> -->
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Quantity Price</label>
                                                        <input class="form-control" name="quantity_price" required type="number" id="quantity_price" placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group float-right mb-0">
                                                    <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Add Parts</button>
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
    <div class="modal fade" id="laborModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Labor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card invoices-add-card m-0">
                                <div class="card-body p-0">
                                    <form class="invoices-form" method="POST" action="{{route('labour_submit')}}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="{{$id}}" />
                                        <input type="hidden" name="record_id" id="labour_record_id" value="" />
                                        <div class="invoices-main-form">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Tech</label>
                                                    <input class="form-control" type="text" name="tech" id="tech" required placeholder="" />
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Work Date</label>
                                                        <input class="form-control" type="date" name="work_date" id="work_date" placeholder="" required />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Hours</label>
                                                        <input class="form-control" type="number" name="hours" id="hours" required placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Pay Type</label>
                                                    <input class="form-control" type="text" name="pay_type" id="pay_type" required placeholder="" />
                                                    <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Hourly Rate</label>
                                                        <input class="form-control" type="number" name="hourly_rate" id="hourly_rate" required placeholder="" />
                                                        <span class="text-danger" style="font-weight: bold; font-style: italic; font-family: calibri;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group float-right mb-0">
                                                <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Add Labor</button>
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

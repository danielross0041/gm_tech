@extends('web.layouts.main')
@section('content')
<div class="page-wrapper-four">
	<div class="content container-fluid">
		<div class="row">
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card card-two">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-1 bg-one">
								<i class="fas fa-dollar-sign"></i>
							</span>
							<div class="dash-count">
								<div class="dash-title">Amount Due</div>
								<div class="dash-counts">
									<p>1,642</p>
								</div>
							</div>
						</div>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>1.15%</span> since last week</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card card-two">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-2 bg-two">
								<i class="fas fa-users"></i>
							</span>
							<div class="dash-count">
								<div class="dash-title">Customers</div>
								<div class="dash-counts">
									<p>3,642</p>
								</div>
							</div>
						</div>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>2.37%</span> since last week</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card card-two">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-3 bg-three">
								<i class="fas fa-file-alt"></i>
							</span>
							<div class="dash-count">
								<div class="dash-title">Invoices</div>
								<div class="dash-counts">
									<p>1,041</p>
								</div>
							</div>
						</div>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>3.77%</span> since last week</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card card-two">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-4 bg-four">
								<i class="far fa-file"></i>
							</span>
							<div class="dash-count">
								<div class="dash-title">Estimates</div>
								<div class="dash-counts">
									<p>2,150</p>
								</div>
							</div>
						</div>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>8.68%</span> since last week</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-7 d-flex">
				<div class="card card-two flex-fill">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="card-title">Sales Analytics</h5>

						</div>
					</div>
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
							<div class="w-md-100 d-flex align-items-center mb-3 flex-wrap flex-md-nowrap">
								<div>
									<span>Total Sales</span>
									<p class="h3 text-primary me-5">$1000</p>
								</div>
								<div>
									<span>Receipts</span>
									<p class="h3 text-success me-5">$1000</p>
								</div>
								<div>
									<span>Expenses</span>
									<p class="h3 text-danger me-5">$300</p>
								</div>
								<div>
									<span>Earnings</span>
									<p class="h3 text-dark me-5">$700</p>
								</div>
							</div>
						</div>
						<div id="sales_chart"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-5 d-flex">
				<div class="card card-two flex-fill">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="card-title">Invoice Analytics</h5>

						</div>
					</div>
					<div class="card-body">
						<div id="invoice_chart"></div>
						<div class="text-center text-muted">
							<div class="row">
								<div class="col-4">
									<div class="mt-4">
										<p class="mb-2 text-truncate"><i class="fas fa-circle text-primary me-1"></i> Invoiced</p>
										<h5>$ 2,132</h5>
									</div>
								</div>
								<div class="col-4">
									<div class="mt-4">
										<p class="mb-2 text-truncate"><i class="fas fa-circle text-success me-1"></i> Received</p>
										<h5>$ 1,763</h5>
									</div>
								</div>
								<div class="col-4">
									<div class="mt-4">
										<p class="mb-2 text-truncate"><i class="fas fa-circle text-danger me-1"></i> Pending</p>
										<h5>$ 973</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row">
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
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="#"><img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="http://gmenertechcorp.demo-orbitdesignagency.com/public/profile_image/1652220855.png" alt="User Image">Gm Tech</a>
												</h2>
											</td>
											<td>$118</td>
											<td>23 May 2022</td>
											<td><span class="badge bg-success-light">Paid</span></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="far fa-edit me-2"></i>Edit</a>
														<a class="dropdown-item" href="#"><i class="far fa-eye me-2"></i>View</a>
														<a class="dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt me-2"></i>Delete</a>
														<a class="dropdown-item" href="entry.php"><i class="fas fa-recycle  me-2"></i>Process</a>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</div>
@endsection

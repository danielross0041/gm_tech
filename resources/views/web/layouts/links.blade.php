

<?php $logo = App\Models\logo::where('is_active',1)->orderBy('id','desc')->first(); ?>
@if($logo)
@php $path = $logo->image; @endphp
@else
@php $path = "web/images/logo.png"; @endphp
@endif

<link rel="icon" type="image/x-icon" href="{{asset($path)}}">






<link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">





<link rel="stylesheet" href="{{asset('web/assets/css/bootstrap.min.css')}}">

	<link rel="stylesheet" href="{{asset('web/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('web/assets/plugins/fontawesome/css/all.min.css')}}">

	<link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}">


	<!-- <link rel="stylesheet" href="{{asset('web/assets/plugins/datatables/datatables.min.css')}}"> -->

	<!-- <link rel="stylesheet" href="{{asset('web/assets/css/bootstrap-datetimepicker.min.css')}}"> -->
	<style type="text/css">	
		
		.apexcharts-legend {	
			display: flex;	
			overflow: auto;	
			padding: 0 10px;	
		}	
		.apexcharts-legend.position-bottom, .apexcharts-legend.position-top {	
			flex-wrap: wrap	
		}	
		.apexcharts-legend.position-right, .apexcharts-legend.position-left {	
			flex-direction: column;	
			bottom: 0;	
		}	
		.apexcharts-legend.position-bottom.apexcharts-align-left, .apexcharts-legend.position-top.apexcharts-align-left, .apexcharts-legend.position-right, .apexcharts-legend.position-left {	
			justify-content: flex-start;	
		}	
		.apexcharts-legend.position-bottom.apexcharts-align-center, .apexcharts-legend.position-top.apexcharts-align-center {	
			justify-content: center;  	
		}	
		.apexcharts-legend.position-bottom.apexcharts-align-right, .apexcharts-legend.position-top.apexcharts-align-right {	
			justify-content: flex-end;	
		}	
		.apexcharts-legend-series {	
			cursor: pointer;	
			line-height: normal;	
		}	
		.apexcharts-legend.position-bottom .apexcharts-legend-series, .apexcharts-legend.position-top .apexcharts-legend-series{	
			display: flex;	
			align-items: center;	
		}	
		.apexcharts-legend-text {	
			position: relative;	
			font-size: 14px;	
		}	
		.apexcharts-legend-text *, .apexcharts-legend-marker * {	
			pointer-events: none;	
		}	
		.apexcharts-legend-marker {	
			position: relative;	
			display: inline-block;	
			cursor: pointer;	
			margin-right: 3px;	
			border-style: solid;
		}	
		
		.apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{	
			display: inline-block;	
		}	
		.apexcharts-legend-series.apexcharts-no-click {	
			cursor: auto;	
		}	
		.apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {	
			display: none !important;	
		}	
		.apexcharts-inactive-legend {	
			opacity: 0.45;	
		}
	</style>
@yield('link')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
	
</style>
	

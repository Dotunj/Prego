@extends('layouts.master')

@section('content')
@include('layouts.partials.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	@include('layouts.partials.alerts')
	<h1 class="page-header">Projects</h1>

	<div class="col-lg-6">
		@if($projects)
		<div class="row">
		@foreach($projects as $project)
		<div class="col-md-3" style="border:1px solid #ccc; margin-left:5px;">
			<h2>{!! $project->project_name !!}</h2>
			<p> Due: {!! date_format(new DateTime($project->due_date), "D, m Y") !!}</p>
			<p> Status: {!! $project->project_status !!}</p>
			<p> Tasks: 0</p>
			<p> Comments: 0 </p>
			<p> Attachments: 0</p>
		</div>
		@endforeach
	</div>  
		@endif

		@if($projects->isEmpty())
		<h3> There are currently no Projects </h3>
		@endif
	</div>

	<a class="btn btn-info" href="{{route('projects.create')}}">New Project</a>
</div>
@endsection
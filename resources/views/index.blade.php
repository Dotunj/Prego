@extends('layouts.master')

@section('content')
 <h1> Project Management for Human beings </h1>
 <p> The promise of Prego is simple. All your projects and todos on one screen without having to filter by team or users.</p>
 
 <p><img src="{{asset ('images/project.jpg')}}" /></p>

  <a class="btn btn-large btn-info" href="/auth/register"> Sign Up </a>

  <p class="login"> Already signed up? <a class="btn btn-large btn-info" href="/auth/signin">Login</p>

  @endsection
@extends('errors::illustrated-layout')

@section('title', __('No hubo suerte'))
@section('code', '404')
@section('message', __('No hemos encontrado eso'))
@section('image')
<img src="{{asset('images/oops.png')}}">
@endsection

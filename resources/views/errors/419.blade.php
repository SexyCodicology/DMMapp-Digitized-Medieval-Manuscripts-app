@extends('errors::bootstrap')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('This page  has expired'))
@section('latin-message', __('post festum'))
@section('translation', __('after the feast'))
@section('source', __('Ipse dixit'))

@section('button')
    <a href="/" type="button" class="btn btn-primary">Go home</a>
@endsection

@extends('user.master')


@section('title', __('admin.attachments'))

@section('page-title', __('admin.attachments'))

@section('content')
    @livewire('user.search-attachment')
@endsection


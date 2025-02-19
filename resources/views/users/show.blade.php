{{-- use section content --}}
@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        <div class="card overflow-hidden">
            <div class="card-body pt-3">
                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <span>Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Explore</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Feed</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Terms</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Support</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Settings</span></a>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="#">View Profile </a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="mt-3">
            @include('shared.success-message')
            @include('shared.user-card')
            <hr>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header pb-0 border-0">
                <h5 class="">Search</h5>
            </div>
            <div class="card-body">
                <input placeholder="..." class="form-control w-100" type="text">
            </div>
        </div>
    </div>
</div>
@endsection

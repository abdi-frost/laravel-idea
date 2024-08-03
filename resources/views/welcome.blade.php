{{-- use layout layout --}}
@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card overflow-hidden">
            @include('shared.left-sidebar')
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="#">View Profile </a>
            </div>
        </div>
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.submit-idea')
        <hr>
        <div class="mt-3">
            @foreach($ideas as $idea)
              @include('shared.idea-card')
            @endforeach
            <div class="mt-4 d-flex justify-content-center">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header pb-0 border-0">
                <h5 class="">Search</h5>
            </div>
            @include('shared.search-bar')
        </div>
        <div class="card mt-3">
            <div class="card-header pb-0 border-0">
                <h5 class="">Who to follow</h5>
            </div>
            <div class="card-body">
                <div class="hstack gap-2 mb-3">
                    <div class="avatar">
                        <a href="#!"><img class="avatar-img rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="#!">Mario Brother</a>
                        <p class="mb-0 small text-truncate">@Mario</p>
                    </div>
                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#">
                        <i class="fa-solid fa-plus"> </i>
                    </a>
                </div>
                <div class="hstack gap-2 mb-3">
                    <div class="avatar">
                        <a href="#!"><img class="avatar-img rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="">
                        </a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="#!">Mario Brother</a>
                        <p class="mb-0 small text-truncate">@Mario</p>
                    </div>
                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                            class="fa-solid fa-plus"> </i></a>
                </div>
                <div class="d-grid mt-3">
                    <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="card m-1">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name}}" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('profile', $idea->user->id) }}"> {{ $idea->user->name}} </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                    @csrf
                    {{-- apply delete method using blade directive --}}
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">x</button>
                </form>
            </div>
        </div>
        {{-- a tag to route idea/id --}}
        <a href={{ route('ideas.show', $idea->id) }} class="m-1 btn btn-link btn-sm">view</a>
        <a href={{ route('ideas.edit', $idea->id) }} class="m-1 btn btn-link btn-sm">Edit</a>
    </div>
    <div class="card-body">
        @if($editing ?? false)
        <div class="row">
            <form method="post" action="{{ route('ideas.update', $idea->id) }}" class="mb-3">
                @csrf
                @method('PUT')
                <textarea name="content" class="form-control" id="content" rows="3">
                    {{ $idea->content }}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mt-3">
                    <button class="btn btn-dark"> Update </button>
                </div>
            </form>
        </div>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea['content'] }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea['likes'] }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock"></span>
                    {{ $idea['created_at']}}
                </span>
            </div>
        </div>
        <div>
            @include('shared.comment-box')
            <hr>            
            @foreach ($idea->comments as $comment)
                @include('shared.comment-card')
            @endforeach
        </div>
    </div>
</div>
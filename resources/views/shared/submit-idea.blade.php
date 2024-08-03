@auth    
<div>
    <h4> Share yours ideas </h4>
    <div class="row">
        <form method="post" action="{{ route('ideas.create') }}" class="mb-3">
            @csrf
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="">
                <button class="btn btn-dark mt-2"> Share </button>
            </div>
        </form>
    </div>
</div>
@endauth
@guest
<div class="info">
    <a href="/login">Login</a> to share your ideas
</div>
@endguest
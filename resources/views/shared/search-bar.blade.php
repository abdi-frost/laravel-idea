<div class="card-body">
    <form method="GET" action="{{ route('dashboard') }}">
        <input value="{{ request('search', '') }}" placeholder="..." class="form-control w-100" name="search" type="text"
            id="search">
        <button type="submit" class="btn btn-dark mt-2"> Search</button>
    </form>
</div>
@if ($errors->any())
    <section class="alert-messages my-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
            </button>
        </div>
    </section>

@endif

@if (session('success'))
    <section class="alert-messages my-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
            </button>
        </div>
    </section>
@endif

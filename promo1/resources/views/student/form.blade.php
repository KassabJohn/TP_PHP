@extends("application")

@section('page-title')
    @yield('page-title')
@endsection

@section('page-content')
    <div class="container mb-5 mt-3">
        <form method="POST" action="@yield('action')">
            @yield('method')
            @csrf
            <div class="form-row mb-5">
                <div class="col">
                    <label for="firstname">Firstname</label>
                    <input type="text" required class="form-control" name="firstname" id="firstname" value="@yield("firstname")">
                </div>
                <div class="col">
                    <label for="lastname">Lastname</label>
                    <input type="text" required class="form-control" name="lastname" id="lastname" value="@yield("lastname")">
                </div>
                <div class="col">
                    <label for="email">email</label>
                    <input type="text" required class="form-control" name="email" id="email" value="@yield("email")">
                </div>
            </div>
            <input type="hidden" name="promo_id" value="@yield("promo_id")">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

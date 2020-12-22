@extends("application")
@section('page-title')
    @yield('page-title')
@endsection
@section('page-content')
    <div class="container mb-5 mt-3">
        <form method="POST" action="@yield('action')">
            @yield('method')
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="promo">promo</label>
                    <input type="text" required class="form-control" name="promo" id="promo" value="@yield("promo")">
                </div>
                <div class="col">
                    <label for="schoolname">schoolname</label>
                    <input type="text" required class="form-control" name="schoolname" id="schoolname" value="@yield("schoolname")">
                </div>
            </div>

            <div class="form-group">
                <label for="moodle">Moodle de la promo</label>
                <input type="text" required class="form-control" name="moodle" id="moodle" value="@yield("moodle")">
            </div>
            <div class="form-group">
                <label for="description">Description (200 characters max.)</label>
                <input type="text" required class="form-control" name="description" id="description" value="@yield("description")">
            </div>

            <div class="form-group">
                <label for="specialite">specialite</label>
                <select class="form-control" name="specialite" id="specialite">
                    <option>Informatique</option>
                    <option>3D Design</option>
                    <option>Jeux-vidéos</option>
                    <option>Son & Audio</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

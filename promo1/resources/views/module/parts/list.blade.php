<a class="btn btn-outline-success mt-3" href="{{ route("module.create") }}">Add Module</a>

<table class="table table-bordered mt-3">
    <thead>
    <tr>
        <th scope="col">Module</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

    @foreach($modules as $module)
        <tr>
            <td>{{ $module->promo }}</td>
            <td>{{ $module->description }}</td>

            <td class="d-flex" style="size: inherit">
                <a class="btn btn-outline-success mr-2" href="{{ route("module.show", $module) }}">Show</a>
                <a class="btn btn-outline-info mr-2" href="{{ route("module.edit", $module) }}">Edit</a>
                <form action="{{ route("module.destroy", $module->id) }}" method="post">
                    <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

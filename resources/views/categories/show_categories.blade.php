<table class="table table-striped">
    @if(isset($categories))
            <thead>
                <th>Name</th>
                <th>Parent</th>
                <th>Description</th>
                <th>Active</th>
                <th>Menu</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($categories as $n)
                <tr>
                    <td>{{ $n->name }}</td>
                    <td>{{ $n->parent }}</td>
                    <td>{{ $n->description }}</td>
                    <td>{{ $n->is_active }}</td>
                    <td>{{ $n->id_cat_types }}</td>
                    <td>
                        <a href="categories/{{ $n->id }}/edit" class="btn btn-warning btn-xs">Edit</a>
                        <form action="{{ route('categories.destroy', $n->id) }}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger btn-xs" value="Activar"></input>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        @endif
</table>
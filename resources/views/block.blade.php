<table class="table table-bordered">

    <thead>

    <tr>

        <th width="100px">ID</th>

        <th>Название</th>

    </tr>

    </thead>

    <tbody>

    @foreach ($data as $cat)

    <tr>

        <td>{{ $cat->id }}</td>

        <td>{{ $cat->name }}</td>

    </tr>

    @endforeach

    </tbody>

</table>

{!! $data->links() !!}

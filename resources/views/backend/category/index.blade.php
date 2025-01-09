@extends('backend.layouts.app')

@section('content')
    <h1>Category</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <a class= "btn btn-primary" href="{{ route('category.create') }}" role="button"> New Category </a>
    </div>
    <table border="1" class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->type }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <img src="{{ $category->hasMedia('') ? $category->getMedia('')[0]->getFullUrl() : '' }}" alt="" srcset="" width="100" class="img-thumbnail">
                </td>
                <td>
                    <a href ="{{ route('category.edit', $category->id) }}">Edit</a>
                </td>
                <td>
                    <a class ='btn btn-danger btn-sm' href="{{ route('category.delete', $category->id) }}" onclick="confirmation(event)">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- {{ $category->links() }} --}}
    {{-- <script type="text/javascript">
        function confirmation(event) {
            debugger;
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            
            swal({
                title: "Are you sure to delete this?",
                text: "You won't be able to revert this delete",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                } else {
                    console.log("Deletion cancelled");
                }
            });
        }
    </script> --}}
</div>
@endsection

<style>
    .table {
        margin-top: 20px;
    }
    .table thead th {
        background-color: #faa2b0;
        color: #000000;
        border-bottom: 2px solid #f57e92;
    }
    .table tbody tr:hover {
        background-color: #ffe6e6;
    }
    .table td {
        vertical-align: middle;
    }
    .img-thumbnail {
        border: none;
        border-radius: 5px;
        padding: 5px;
    }
    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }
</style>
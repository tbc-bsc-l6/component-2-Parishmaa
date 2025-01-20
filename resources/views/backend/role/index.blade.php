@extends('backend.layouts.app')

@section('content')
    <div class="col py-3">
        <h1 style="color:#ff6c84">Role</h1>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-6  py-3">
            {{-- <a href="{{ route('role.create') }}" class="btn btn-primary" style="color:pink">Assign a Role</a> --}}

            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <form id="updateUserRoleForm{{ $user->id }}" class="d-flex gap-2 text-center " action="{{ route('role.updateUserRole',) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                    @php
                                        $userRoles=$user->roles->pluck('id')->toArray() ?? [];
                                    @endphp
                                    <select class="form-control" name="roleId" id="roleOptionValue{{ $user->id }}">
                                        <option value="{{ null }}" class="form-control">Choose Option</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ in_array($role->id,$userRoles)?'selected':'' }}>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button onclick="validationRoleAssign({{ $user->id }})" type="button" class="btn btn-sm btn-primary" style="padding:4px 8px;">Update</button>
                            </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         
        </div>
    </div>
    <script>
        function validationRoleAssign(userId){
            let selectTag=document.getElementById('roleOptionValue'+userId);
            if(!selectTag.value){
                alert('Please select role!')
            }else{
                event.target.innerHTML="Updating..";
                document.getElementById('updateUserRoleForm'+userId).submit();
            }
        }
    </script>
@endsection

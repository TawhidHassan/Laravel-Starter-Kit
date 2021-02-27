@extends('layouts.backend.app')

@section('title','Roles')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-check icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ isset($role) ? 'Edit' : 'Create New' }} Role</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('app.roles.index') }}" class="btn-shadow btn btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-arrow-circle-left fa-w-20"></i>
                        </span>
                        Back to list
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <!-- form start -->
                <form id="roleFrom" role="form" method="POST"
                      action="{{ isset($user) ? route('app.users.update',$role->id) : route('app.users.store') }}">
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Manage Roles</h5>
                        <div class="from-group">
                        <label for="name">Role Name</label>
                        <input id="name" type="text" class="from-control @error('name') is-invalid @enderror" 
                        name="name" value="{{$user->name ?? old('name')}}" required autofocus/>

                        @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                         </span>
                        @enderror
                        </div>


                        
                        <button type="submit" class="btn btn-primary">
                            @isset($role)
                                <i class="fas fa-arrow-circle-up"></i>
                                <span>Update</span>
                            @else
                                <i class="fas fa-plus-circle"></i>
                                <span>Create</span>
                            @endisset
                        </button>
                    </div>
                    
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        // Listen for click on toggle checkbox
        $('#select-all').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
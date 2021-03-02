@extends('layouts.backend.app')

@section('title','Roles')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@endpush
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
                    <a href="{{ route('app.users.index') }}" class="btn-shadow btn btn-danger">
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
             <!-- form start -->
            <form id="roleFrom" role="form" method="POST"
                action="{{ isset($user) ? route('app.users.update',$user->id) : route('app.users.store') }}"
                enctype="multipart/form-data">
              @csrf
              @if (isset($user))
                  @method('PUT')
              @endif
              <div class="row">
                  <div class="col-md-8">
                      <div class="main-card mb-3 card">
                          <div class="card-body">
                              <h5 class="card-title">User Info</h5>

                              <label for="name">User Name</label>
                                <input id="name" type="text" class="from-control @error('name') is-invalid @enderror" 
                                name="name" value="{{$user->name ?? old('name')}}" required autofocus/>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                <br>
                                <label for="name">User Email</label>
                                <input id="email" type="text" class="from-control @error('email') is-invalid @enderror" 
                                name="email" value="{{$user->email ?? old('email')}}" required autofocus/>
        
                                @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{$message}}</strong>
                                 </span>
                                @enderror

                                <br>
                                <label for="name">Password</label>
                                <input id="password" type="text" class="from-control @error('password') is-invalid @enderror" 
                                name="password" value="{{$user->password ?? old('password')}}" required autofocus/>
        
                                @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{$message}}</strong>
                                 </span>
                                @enderror
                                <br>
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="text" class="from-control @error('password_confirmation') is-invalid @enderror" 
                                name="password_confirmation"  required autofocus/>
        
                                @error('password_confirmation')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{$message}}</strong>
                                 </span>
                                @enderror


                               
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <div class="col-md-4">
                      <div class="main-card mb-3 card">
                          <div class="card-body">
                              <h5 class="card-title">Select Role and Status</h5>
                              <select name="role" label="Select Role">
                                @foreach($roles as $key=>$role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                              </select>
                            <br>
                              <label for="name">Avatar</label>
                              <input id="avatar" type="file" class="dropify from-control @error('password') is-invalid @enderror" 
                              name="avatar" />
      
                              @error('avatar')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                               </span>
                              @enderror
                              <br>

                              <div class="form-check form-switch">
                                <input class="form-check-input" name="status" type="checkbox" id="status">
                                <label class="form-check-label" for="status">Status</label>
                              </div>

                                <br>
                                <button label="Reset" class="btn-danger" icon-class="fas fa-redo" on-click="resetForm('userFrom')">Reset</button>


                                @isset($user)
                                    <button type="submit" label="Update" icon-class="fas fa-arrow-circle-up">Update</button>
                                @else
                                    <button type="submit" label="Create" icon-class="fas fa-plus-circle">Create</button>
                                @endisset


                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
                    
                </form>



            <div class="main-card mb-3 card">
               
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

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
        $('.dropify').dropify();
    </script>
@endpush
@extends('layouts.backend.app')

@section('title','Dashboard')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    @role('admin')
                    admin Dashboard
                    @else
                    user Dashboard
                    @endrole
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Users</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success">22</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Roles</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning">{22</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Pages</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger">22</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Menus</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info">22</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Last Logged In Users</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Last Login At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td class="text-center text-muted">#2/td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                         src="" alt="User Avatar">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">sifat</div>
                                                <div class="widget-subheading opacity-7">
                                                    {{-- @if ($user->role)
                                                        <span class="badge badge-info">admin</span>
                                                    @else --}}
                                                        <span class="badge badge-danger">No role found :(</span>
                                                    {{-- @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">and@gmail.cpm</td>
                                <td class="text-center">12:22Pm</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href=""><i
                                            class="fas fa-eye"></i>
                                        <span>Details</span>
                                    </a>
                                </td>
                            </tr>
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
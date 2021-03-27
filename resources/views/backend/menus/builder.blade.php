@extends('layouts.backend.app')

@section('title','Menu Builder')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Menu Builder ({{ $menu->name }})</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block">
                    <a href="{{ route('app.menus.index') }}" class="btn-shadow btn btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-arrow-circle-left fa-w-20"></i>
                        </span>
                        {{ __('Back to list') }}
                    </a>

                    <a href="{{ route('app.menus.item.create',$menu->id) }}" class="btn btn-shadow btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create Menu Item</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            {{-- how to use callout --}}
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How To Use:</h5>
                    <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
                </div>
            </div>

            <div class="main-card mb-3 card">
                <div class="card-body menu-builder">
                    <h5 class="card-title">Drag and drop the menu Items below to re-arrange them.</h5>
                    <div class="dd">
                        <ol class="dd-list">
                            @forelse ($menu->menuItems as $item)
                                <li class="dd-item" data-id="{{$item->id}}">
                                    <div class="pull-right item_actions">
                                        <a class="btn btn-info btn-sm" href="{{ route('app.menus.item.edit',['id'=>$menu->id,'itemId'=>$item->id]) }}">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>
    
                                        <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteData({{ $item->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                       <span>Delete</span>
                                       </button>
                                        <form id="delete-form-{{ $item->id }}"
                                                  action="{{ route('app.menus.item.destroy',['id'=>$menu->id,'itemId'=>$item->id]) }}"
                                                  method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                    </div>
                                    <div class="dd-handle">
                                        @if ($item->type=='divider')
                                        <strong>Divider: {{$item->divider_title}}</strong> 
                                         @elseif(($item->type=='item'))
                                         <span>{{$item->title}}</span>
                                         <small>{{$item->url}}</small>
                                         @endif
                                    </div>
                                   
                                    @if (!$item->childs->isEmpty())
                                    <ol class="dd-list">
                                        @foreach ($item->childs as $childItem)
                                            <li class="dd-item" data-id="{{$childItem->id}}">
                                                <div class="pull-right item_actions">
                                                    <a class="btn btn-info btn-sm" href="{{ route('app.menus.item.edit',['id'=>$menu->id,'itemId'=>$childItem->id]) }}">
                                                        <i class="fas fa-edit"></i>
                                                        <span>Edit</span>
                                                    </a>
                
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteData({{ $childItem->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                   <span>Delete</span>
                                                   </button>
                                                    <form id="delete-form-{{ $childItem->id }}"
                                                              action="{{ route('app.menus.item.destroy',['id'=>$menu->id,'itemId'=>$childItem->id]) }}"
                                                              method="POST" style="display: none;">
                                                            @csrf()
                                                            @method('DELETE')
                                                        </form>
                                                </div>
                                                <div class="dd-handle">
                                                    @if ($childItem->type=='divider')
                                                    <strong>Divider: {{$childItem->divider_title}}</strong> 
                                                     @elseif(($childItem->type=='item'))
                                                     <span>{{$childItem->title}}</span>
                                                     <small>{{$childItem->url}}</small>
                                                     @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                    @else
                                        
                                    @endif
                                    
                                    
                                </li>
                            @empty
                                <div class="text-center">
                                    <strong>No menu item found...</strong>
                                </div>
                            @endforelse
                        </ol>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
    $(function () {
        $('.dd').nestable({maxDepth: 2});
        $('.dd').on('change', function (e) {
            $.post('{{ route('app.menus.order',$menu->id) }}', {
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                iziToast.success({
                    title: 'Success',
                    message: 'Successfully updated menu order.',
                });
            });
        });
    });
</script>
@endpush
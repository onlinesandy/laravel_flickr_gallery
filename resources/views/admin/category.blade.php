
@extends('admin.layouts.app')

@section('content')
<style>
    .bank_row{
        padding: 15px 5px; 
        clear: both;
    }
    .remove_bank_row{
        font-size: 20px;
        color:#fff;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            

            @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('message.type') }}">
                <i class="mdi mdi-check-circle-outline"></i> {{ Session::get('message.text') }}
            </div>
            @endif
            @if ($errors->any())

            <div class="alert alert-danger">
                <ul style="padding: 0px;margin: 0px;list-style-type: none;">
                    @foreach ($errors->all() as $error)
                    <li style="font-size:13px;"><i class="mdi mdi-alert-circle-outline"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Category List      
                        <span class="badge badge-primary float-right" style="margin-right:5px;cursor: pointer;" data-toggle="modal" data-target="#addCategoryModal"><i class="mdi mdi-plus"></i> Add Category</span>
                    </h5>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name </th>
                            <th scope="col">Category Tag </th>
                            <th scope="col">Category Description </th>
                            <th scope="col">Status</th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sr=1;
                        @endphp
                        @if(isset($categories) && count($categories)> 0)
                        @forelse ($categories as $cat)
                        <tr>
                            <th scope="row">{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</th>

                            <td>{{$cat->name}}</td>
                            <td>{{$cat->tag}}</td>
                            <td>{{$cat->description}}</td>
                            <td>
                                @if($cat->stats=='')
                                <span class="badge badge-success">Active</span>
                                @else    
                                <span class="badge badge-warning">De-Active</span>
                                @endif    
                            </td>
                            <td>
                                <a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick="editCategory('{{$cat->id}}','{{$cat->name}}');">
                                    <span class="badge badge-primary"><i class="mdi mdi-pencil"></i></span>
                                </a>
                                @if($cat->stats=='')
                                <a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Deactivate" onclick="updateCategoryStatus('0','{{$cat->id}}');">
                                    <span class="badge badge-success"><i class="mdi mdi-check"></i></span>
                                </a>
                                @else
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Activate" onclick="updateCategoryStatus('1','{{$cat->id}}');">
                                    <span class="badge badge-warning"><i class="mdi mdi-close"></i></span>
                                </a> 
                                @endif
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="confirmCategoryDelete('{{$cat->id}}');">
                                    <span class="badge badge-danger"><i class="mdi mdi-delete"></i></span>
                                </a> 

                            </td>

                        </tr>

                        @endforeach
                        @else
                        <tr><td colspan="4"> No Records Found</td></tr>
                        @endif
                    </tbody>
                </table>
                <div class="col-md-12">
                    <nav>{{ $categories->appends(Request::except('page'))->links() }}</nav>
                </div>

            </div>
        </div>

    </div>      
</div>
<div class="modal" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/addcategory" method="post">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" autocomplete="off" class="form-control" id="cat_name" name="cat_name" placeholder="Enter Category Name" required="required">
                    </div>
                    
                    <div class="form-group">
                        <label>Category Description</label>
                        <input type="text" autocomplete="off" class="form-control" id="cat_des" name="cat_des" placeholder="Enter Category Description">
                    </div>
                    <div class="border-top">
                        <div class="card-body" style="padding-left:0px;">
                            {{ csrf_field() }}
                            <input type="hidden" name="catID" id="catID" value=""/>
                            <button type="submit" class="btn btn-primary" id="addCategoryBtn">Add</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection

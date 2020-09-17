
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

                    <h5 class="card-title">Bank List      
                        <span class="badge badge-primary float-right" style="margin-left:10px;cursor: pointer;" data-toggle="modal" data-target="#uploadBankModal"><i class="mdi mdi-upload"></i> Upload</span> 
                        <span class="badge badge-primary float-right" style="margin-right:5px;cursor: pointer;" data-toggle="modal" data-target="#addBankModal"><i class="mdi mdi-plus"></i> Add Bank</span>
                    </h5>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bank Name </th>
                            <th scope="col">Status</th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sr=1;
                        @endphp
                        @if(isset($banks) && count($banks)> 0)
                        @forelse ($banks as $bank)
                        <tr>
                            <th scope="row">{{ ($banks->currentPage()-1) * $banks->perPage() + $loop->index + 1 }}</th>

                            <td>{{$bank->name}}</td>
                            <td>
                                @if($bank->stats=='')
                                <span class="badge badge-success">Active</span>
                                @else    
                                <span class="badge badge-warning">De-Active</span>
                                @endif    
                            </td>
                            <td>
                                <a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick="editBank('{{$bank->id}}','{{$bank->name}}');">
                                    <span class="badge badge-primary"><i class="mdi mdi-pencil"></i></span>
                                </a>
                                @if($bank->stats=='')
                                <a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Deactivate" onclick="updateBankStatus('0','{{$bank->id}}');">
                                    <span class="badge badge-success"><i class="mdi mdi-check"></i></span>
                                </a>
                                @else
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Activate" onclick="updateBankStatus('1','{{$bank->id}}');">
                                    <span class="badge badge-warning"><i class="mdi mdi-close"></i></span>
                                </a> 
                                @endif
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="confirmBankDelete('{{$bank->id}}');">
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
                    <nav>{{ $banks->appends(Request::except('page'))->links() }}</nav>
                </div>

            </div>
        </div>

    </div>      
</div>
<div class="modal fade" id="uploadBankModal" tabindex="-1" role="dialog" aria-labelledby="uploadBankModal">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bank File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/importbank" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">File Upload</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input name="bankFile" type="file" class="custom-file-input" id="validatedCustomFile" required="">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <p><a href="/downloadSample?sampleFileUrl=/sample/SampleBank.xls">Sample Download</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body" style="padding-left:0px;">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="addBankModal">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBankLabel">Add Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/addbank" method="post">
                    <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" autocomplete="off" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" required="required">
                    </div>
                    <div class="border-top">
                        <div class="card-body" style="padding-left:0px;">
                            {{ csrf_field() }}
                            <input type="hidden" name="bankID" id="bankID" value=""/>
                            <button type="submit" class="btn btn-primary" id="addBankBtn">Add</button>
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

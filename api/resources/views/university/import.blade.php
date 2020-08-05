@extends('layouts.main')

@section('left-menu')
    @include('university.left-menu')
@endsection

@section('content')
    @if(session('message'))
        <div class="alert @if(!session('error'))alert-success @else alert-danger @endif"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon @if(!session('error')) ion-ios-checkmark @else ion-ios-close @endif alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                <span>{{ session('message') }}</span>
            </div><!-- d-flex -->
        </div><!-- alert -->
    @endif

    <div class="sl-pagebody">
        <div class="row mg-10">
            <a href="{{ asset('template.xlsx')  }}" download="template" class="btn btn-light">Download template</a>
        </div>
        <form autocomplete="off" action="{{ route('import_universities') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-control-label">Import universities list: </label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" name="file">
                @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Submit</button>
            </div><!-- form-layout-footer -->
        </form>
    </div>
@endsection

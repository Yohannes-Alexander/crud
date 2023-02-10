@extends('crud.template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Data</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('annual.index') }}"> Back</a>
            </div>
            <div ><hr style="height:1px;border-width:0;color:gray;background-color:gray;margin-top: 3em;margin-bottom:-5%"></div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('annual.update',$annual->ID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID</strong>
                <input type="text" value="{{ $annual->ID }}" name="ID" class="form-control" placeholder="ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee ID</strong>
                <input type="text" value="{{ $annual->EmpID }}" name="EmpID" class="form-control" placeholder="Employee ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Review Date</strong>
                <input type="date" value="{{ $annual->ReviewDate }}" name="ReviewDate" class="form-control" placeholder="Review Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
@endsection
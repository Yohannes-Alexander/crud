@extends('crud.template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Data</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('employee.index') }}"> Back</a>
            </div>
            <div ><hr style="height:1px;border-width:0;color:gray;background-color:gray;margin-top: 3em;margin-bottom:-5%">
                </div>
                {{-- <hr style="height:1px;border-width:0;color:gray;background-color:gray;margin-top: 3em;margin-bottom:-5%"> --}}
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

    <form action="{{ route('employee.update',$employee->ID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID</strong>
                {{-- <input type="text" value="{{ $employee->ID }}" name="ID" class="form-control" placeholder="ID"> --}}
                <input type="text" value="{{ $employee->ID }}" name="ID" class="form-control" placeholder="ID" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name</strong>
                <input type="text" value="{{ $employee->FirstName }}" name="FirstName" class="form-control" placeholder="FirstName">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name</strong>
                <input type="text" value="{{ $employee->LastName }}" name="LastName" class="form-control" placeholder="LastName">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hire Date</strong>
                <input type="date" value="{{ $employee->HireDate }}" name="HireDate" class="form-control" placeholder="HireDate">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Termination Date</strong>
                <input type="date" value="{{ $employee->TerminationDate }}" name="TerminationDate" class="form-control" placeholder="TerminationDate">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salary</strong>
                <input type="text" value="{{ $employee->Salary }}" name="Salary" class="form-control" placeholder="Salary" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
@endsection
@extends('crud.template')

@section('content')
    <div class="row mt-5 mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD Table Employees</h2>
            </div>
            <div class="float-right">
                <a href="/annual"><button type="button" class="btn btn-info">Table AnnualReviews</button>
                </a>
            </div>
        </div>
    </div>
    <div class="float-left">
        <a class="btn btn-success" href={{ route('employee.create') }}> New Data</a><br><br>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
        {{-- <button type="button" class="alert alert-success" aria-label="Close"></button> --}}
      </div>
    @endif
    @if ($message = Session::get('alert'))
    <div class="alert alert-danger" role="alert">
        {{ $message }}
      </div>
    @endif
    <?php
        $i = 0;
    ?>
    <table class="table table-striped">
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">ID</th>
            <th class="text-center">FirstName</th>
            <th class="text-center">LastName</th>
            <th class="text-center">HireDate</th>
            <th class="text-center">TerminationDate</th>
            <th class="text-center">Salary</th>
            <th class="text-center">Action</th>
        </tr>


        @foreach ($employee as $emp)
        <tr>
            <td class="text-center">{{ $i+1 }}</td>
            <td class="text-center">{{ $emp->ID }}</td>
            <td class="text-center">{{ $emp->FirstName }}</td>
            <td class="text-center">{{ $emp->LastName }}</td>
            <td class="text-center">{{ $emp->HireDate }}</td>
            <td class="text-center">{{ $emp->TerminationDate }}</td>
            <td class="text-center">{{ $emp->Salary }}</td>
            <td class="text-center">
                {{-- <a class="btn btn-primary btn-sm" href="{{ url('/'.$ann->ID.'/edit')}}">Edit</a> --}}
                <form method="POST" action="{{ route('employee.destroy',$emp->ID) }}" >

                   {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                   {{-- <button class="btn btn-primary btn-sm" href="{{ route('annual.edit',$ann->ID) }}"></button>  --}}
                   <a class="btn btn-primary btn-sm" href="{{ route('employee.edit',$emp->ID) }}">Edit</a>
                    
                    @method('delete')
                    @csrf
                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                    

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php
            $i = $i+1;
        ?>
        @endforeach
    </table>

@endsection
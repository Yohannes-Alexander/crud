@extends('crud.template')

@section('content')
    <div class="row mt-5 mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD Table AnnualReview</h2>
            </div>
            <div class="float-right">
                <a href="/employee"><button type="button" class="btn btn-info">Table Employee</button>
                </a>
            </div>
        </div>
    </div>
    <div class="float-left">
        <a class="btn btn-success" href={{ route('annual.create') }}> New Data</a><br><br>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
        <button type="button" class="alert alert-success" aria-label="Close"></button>
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
            {{-- <th width="20px" class="text-center">ID</th> --}}
            <th class="text-center">No.</th>
            <th class="text-center">ID</th>
            <th class="text-center">Employee ID</th>
            <th class="text-center">Review Date</th>
            <th class="text-center">Action</th>
            {{-- <th class="text-center">First Name</th> --}}
            {{-- <th>NIS</th> --}}
            {{-- <th width="280px"class="text-center">Nama Siswa</th> --}}

        </tr>


        @foreach ($annual as $ann)
        <tr>
            <td class="text-center">{{ $i+1 }}</td>
            <td class="text-center">{{ $ann->ID }}</td>
            <td class="text-center">{{ $ann->EmpID }}</td>
            <td class="text-center">{{ $ann->ReviewDate }}</td>
            <td class="text-center">
                {{-- <a class="btn btn-primary btn-sm" href="{{ url('/'.$ann->ID.'/edit')}}">Edit</a> --}}
                <form method="POST" action="{{ route('annual.destroy',$ann->ID) }}" >

                   {{-- <a class="btn btn-info btn-sm" href="{{ route('sisw.show',$siswa->id) }}">Show</a> --}}

                   {{-- <button class="btn btn-primary btn-sm" href="{{ route('annual.edit',$ann->ID) }}"></button>  --}}
                   <a class="btn btn-primary btn-sm" href="{{ route('annual.edit',$ann->ID) }}">Edit</a>
                    
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

    {{-- {!! $annual->links() !!} --}}

@endsection
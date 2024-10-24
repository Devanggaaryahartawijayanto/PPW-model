<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />


</head>
<body>
    <h1>Data Buku</h1>
    @if (Session::has('created'))
        <div class="alert alert-success">{{Session::get('created')}}</div>    
    @endif 

    @if (Session::has('updated'))
        <div class="alert alert-success">{{Session::get('updated')}}</div>    
    @endif 

    @if (Session::has('deleted'))
        <div class="alert alert-success">{{Session::get('deleted')}}</div>    
    @endif 

    @if ($cari)
    @if (count($data_buku))
        <div class="alert alert-success">Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata: <strong>{{ $cari }}</strong>
        </div>
    @else
        <div class="alert alert-warning">
            <h4>Data {{ $cari }} tidak ditemukan</h4>
            <a href="/buku" class="btn btn-warning">Kembali</a>
        </div>
    @endif
    @endif
    


    <a href="{{route('buku.create')}}" class="btn btn-primary ">Tambah Buku</a>

    <form action="{{route('buku.search')}}">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
        
    <table class="container">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>price</th>
                <th>published_date</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>       
            @foreach ($data as $index => $buku)
                <tr>
                    <td>{{ $buku->id }}</td>
                    <td>{{ $buku->title }}</td>
                    <td>{{ $buku->author }}</td>
                    <td>{{ "Rp".number_format($buku->price,2,',','.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->published_date)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{route('buku.edit',$buku->id)}}" class="btn btn-primary">Detail</a>
                    </td>
                    <td>
                        <form action="{{route('buku.destroy',$buku->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick='return confirm("Yakin deck?")' type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>price</th>
                <th>published_date</th>
                <th>Action</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    
    <div>{{$data_buku->links()}}</div>
    <div><strong>Total Books: {{ $jumlah_buku }}</strong></div>
    <h1>Total Price: {{ "Rp.".number_format($total_harga,2,',','.') }} </h1>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-data').DataTable();
        });
    </script>
</body>
</html>
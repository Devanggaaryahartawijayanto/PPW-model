<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Bootstrap 5 icons CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <title>Data Buku</title>

    <style>
        table tr td{
    vertical-align: middle;
    }

    td button{
        margin: 5px;
    }

    td button i{
        font-size: 20px;
    }


    .modal-header{
        background: #0d6efd;
        color: #fff;
    }

    .modal-body form {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 0;
    }

    .modal-body form .imgholder{
        width: 200px;
        height: 200px;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
    }

    .imgholder .upload{
        position: absolute;
        bottom: 0;
        left: 10;
        width: 100%;
        height: 100px;
        background: rgba(0,0,0,0.3);
        display: none;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .upload i{
        color: #fff;
        font-size: 35px;
    }

    .imgholder:hover .upload{
        display: flex;
    }

    .imgholder .upload input{
        display: none;
    }

    .modal-body form .inputField{
        flex-basis: 68%;
        border-left: 5px groove blue;
        padding-left: 20px;
    }

    form .inputField > div{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    form .inputField > div label{
        font-size: 20px;
        font-weight: 500;
    }

    #userForm form .inputField > div label::after{
        content: "*";
        color: red;
    }

    form .inputField > div input{
        width: 75%;
        padding: 10px;
        border: none;
        outline: none;
        background: transparent;
        border-bottom: 2px solid blue;
    }

    .modal-footer .submit{
        font-size: 18px;
    }


    #readData form .inputField > div input{
        color: #000;
        font-size: 18px;
    }
    </style>
  </head>
  <body>



    <!-- Bagian Buku -->
    <section class="p-3">
      <div class="container">
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

        @if(Auth::check()&&Auth::user()->role=='admin')
            <div class="d-flex justify-content-end">
                <a href="{{route('buku.create')}}" class="btn btn-primary">Tambah Buku</a>
            </div>
        @endif


        <table class="table table-striped table-hover mt-3 text-center table-bordered" id="datatablePro">
          <thead>
              <tr>
                  <th>id</th>
                  <th>image</th>
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
                      <td><img src="{{ asset('storage/'.$buku->photo) }}" alt="" width="100"></td>
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
        </table>

        
        <div><strong>Total Books: {{ $jumlah_buku }}</strong></div>
        <h1>Total Price: {{ "Rp.".number_format($total_harga,2,',','.') }} </h1>

      </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatablePro').DataTable();
        } );
    </script>

    <script>
        $(document).ready(function() {
            $('#table-data').DataTable();
        });
    </script>
  </body>
</html>

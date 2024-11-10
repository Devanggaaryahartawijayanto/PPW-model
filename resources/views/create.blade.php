<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <h4>Tambah Data Buku</h4>
            <form action="{{route('buku.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="title"  class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td><input type="text" name="author"  class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="price"  class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td><input type="date" name="published_date"  class="form-control" ></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><input id="photo" type="file" name="photo"  class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}"> 
                        @if ($errors->has('photo'))
                        <span class="text-danger">{{$errors->first('photo')}}</span>
                        @endif
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{('/buku')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>

</body>
</html>
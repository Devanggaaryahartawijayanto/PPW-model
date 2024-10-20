<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


</head>
<body>
    <div class="container">
        <h4>Edit Data Buku</h4>
        <form action="{{route('buku.update',$buku->id)}}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="title" value="{{$buku->title}}" class="form-control"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input type="text" name="author" value="{{$buku->author}}" class="form-control"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="price" value="{{$buku->price}}" class="form-control"></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td><input type="date" name="published_date" value="{{$buku->published_date}}" class="form-control"></td>
                </tr>
            </table>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{('/buku')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    
</body>
</html>
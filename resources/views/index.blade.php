<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

<style>
    table{
        margin-top: 20px;
        margin-left:235px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: center
    }

    p{
        margin-top: 20px;
        margin-left:235px;
    }

    button{
        background-color: blue;
        color: white;
    }

    /* Add a black background color to the top navigation */
    .topnav {
    background-color: #333;
    overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
    background-color: #ddd;
    color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
    background-color: blue;
    color: white;
    }

    footer{
        background-color: #333
    }
</style>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>price</th>
                <th>published_date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books_data as $index => $buku)
                <tr>
                    <td>{{ $buku->id }}</td>
                    <td>{{ $buku->title }}</td>
                    <td>{{ $buku->author }}</td>
                    <td>{{ "Rp.".number_format($buku->price,2,',','.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->published_date)->format('d-m-Y') }}</td>
                    <td><button href="/buku/{{ $buku->id }}">Detail</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total Books: {{ $jumlah_buku }}</p>
    <p>Total Price: {{ "Rp.".number_format($total_harga,2,',','.') }} </p>

    <footer>
        <p>Author: Hege Refsnes</p>
        <p><a href="mailto:hege@example.com">hege@example.com</a></p>
    </footer>
</body>
</html>
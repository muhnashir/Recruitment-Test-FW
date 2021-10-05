<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #emp{
            font-family: Arial, Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%
        }#emp td, #emp th{
            border: 1px solid #ddd;
            padding : 8px;
        }
        #emp tr:nth-child(even){
            background-color : #0bfdfd;
        }
        #emp th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4caf50;
            color: #fff;
        }
    </style>
</head>

<body>
    <table id="emp">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Perusahaan</th>
                <th>email</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td><img src="{{ url($item->logoPath)}}" alt="" style="width:80px"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

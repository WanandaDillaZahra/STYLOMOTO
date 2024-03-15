<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Pengguna</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center; /* Tengahkan teks pada tabel */
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        h1 {
            text-align: center; /* Tengahkan teks pada h1 */
        }
    </style>
</head>

<body>
    <h1>Daftar Data Pengguna</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Role</th>
        </tr>
        @foreach($User as $users)
        <tr>
            <td>{{ $users->username }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->role }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
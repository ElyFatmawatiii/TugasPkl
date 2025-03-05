<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>

<body>
    <h4>Ini Halaman Students</h4>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($students as $student)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ ucfirst($student->gender) }}</td>
                <td>{{ ucfirst($student->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
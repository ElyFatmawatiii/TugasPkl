<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 350px;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
        }

        .data-box {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .data-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-box td {
            padding: 5px 0;
            font-size: 16px;
            font-weight: bold;
            vertical-align: top;
        }

        .label {
            width: 30%;
            font-weight: normal;
        }

        .status-diterima {
            color: green;
        }

        .status-ditolak {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Pencarian</h1>

        @if(!empty($pendaftaran))
        <div class="data-box">
            <table>
                <tr>
                    <td class="label">NISN</td>
                    <td>: <strong>{{ $pendaftaran->nisn }}</strong></td>
                </tr>
                <tr>
                    <td class="label">Nama</td>
                    <td>: {{ $pendaftaran->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td class="label">Status</td>
                    <td>: <strong class="{{ $pendaftaran->status == 'Diterima' ? 'status-diterima' : 'status-ditolak' }}">{{ $pendaftaran->status }}</strong></td>
                </tr>
            </table>
        </div>
        @else
        <script>
            Swal.fire({
                text: 'Data tidak ditemukan!',
            }).then(() => {
                window.location.href = "{{ url()->previous() }}";
            });
        </script>
        @endif
    </div>
</body>

</html>

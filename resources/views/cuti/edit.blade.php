<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Form</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Cuti
                </div>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li>{{ $error }}</li>
                    </div>
                    
                @endforeach
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $cuti->name }}</td>
                        </tr>
                        <tr>
                            <th>Mulai Cuti</th>
                            <td>:</td>
                            <td>{{$sdate->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Akhir Cuti</th>
                            <td>:</td>
                            <td>{{$edate->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{ $cuti->notes }}</td>
                        </tr>
                    </table>
                    
                </div>
                <div class="card-footer">
                    <a href="{{ route('cuti.approve',$cuti->id) }}" class="btn btn-success">Approve</a>
                    <a class="btn btn-danger">Reject</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan link JS Bootstrap (Popper.js dan jQuery juga diperlukan) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>

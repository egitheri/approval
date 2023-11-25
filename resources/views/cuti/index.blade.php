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
        <a href="{{ route('logout') }}" class="text-center">Logout</a><br><br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Cuti
                    @if ($user->role == 'user')
                        <a href="{{ route('cuti.create') }}">Tambah</a>
                    @endif
                    
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <table class="table">
                        <thead>
                            
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Mulai Cuti</th>
                                <th>Akhir Cuti</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Disetujui Oleh</th>
                                <th>Tanggal Disetujui</th>
                                @if ($user->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key+1; }}</td>
                                <td>{{ $item->name; }}</td>
                                <td>{{ $item->sdate; }}</td>
                                <td>{{ $item->edate; }}</td>
                                <td>{{ $item->notes; }}</td>
                                <td>{{ $item->status; }}</td>
                                <td>{{ $item->approve_name; }}</td>
                                <td>{{ $item->approve_date; }}</td>
                                @if ($user->role == 'admin')
                                    <td><a href="{{ route('cuti.detail', $item->id)  }}" class="btn btn-success">Detail</a></td>
                                @endif
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
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

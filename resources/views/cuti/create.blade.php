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
                    <!-- Mulai formulir -->
                    <form action="{{ route('cuti.store') }}" method="post">
                        @csrf
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user }}" placeholder="Masukkan nama" required>
                        </div>
                        <!-- Mulai Cuti -->
                        <div class="mb-3">
                            <label for="sdate" class="form-label">Mulai Cuti</label>
                            <input type="date" class="form-control" id="sdate" name="sdate" value="{{ old('sdate') }}" required>
                        </div>
                        <!-- Akhir Cuti -->
                        <div class="mb-3">
                            <label for="edate" class="form-label">Akhir Cuti</label>
                            <input type="date" class="form-control" id="edate" name="edate" value="{{ old('edate') }}" required>
                        </div>
                        <!-- Keterangan -->
                        <div class="mb-3">
                            <label for="notes" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="notes" name="notes">
                        </div>
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- Akhir formulir -->
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

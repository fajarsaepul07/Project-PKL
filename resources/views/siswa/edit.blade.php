<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>
<body>
    <h2>Edit Siswa</h2>
    <hr>
    <form action="/siswa/{{ $siswa['id'] }}" method="POST">
        @csrf
        @method('PUT')

        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="XI RPL 1" {{ $siswa['kelas'] == 'XI RPL 1' ? 'selected' : '' }}>XI RPL 1</option>
            <option value="XI RPL 2" {{ $siswa['kelas'] == 'XI RPL 2' ? 'selected' : '' }}>XI RPL 2</option>
            <option value="XI RPL 3" {{ $siswa['kelas'] == 'XI RPL 3' ? 'selected' : '' }}>XI RPL 3</option>
        </select>
        <br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $siswa['nama'] }}" required>
        <br><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>

    <a href="/siswa">Kembali</a>
</body>
</html>

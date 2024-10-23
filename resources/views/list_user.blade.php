@extends('layouts.app') 

@section('content') 
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
<div style="margin: 20px auto; max-width: 1000px; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; margin-bottom: 20px; font-size: 24px; color: #333;">Daftar Pengguna</h2>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead style="background-color: #4CAF50; color: white;">
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Nama</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">NPM</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Kelas</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Foto</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">IPK</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user) 
                <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px;">{{ $user->id }}</td>
                    <td style="padding: 12px;">{{ $user->nama }}</td>
                    <td></td>
                    <td style="padding: 12px;">{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
                    <td style="padding: 12px;"><img src="{{ asset('upload/img/' . $user->foto) }}" class="pp" alt="PP" style="width: 150px; object-fit: cover;"></td>
                    <td style="padding: 12px;">{{ $user->ipk }}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a>

                        <!-- Delete Form -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style='display:inline-block;'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection

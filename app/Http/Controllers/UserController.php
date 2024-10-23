<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index() 
    { 
        $users = $this->userModel->getUser(); // Mengambil semua data user

        $data = [ 
            'title' => 'Daftar Pengguna', 
            'users' => $users, // Mengirimkan data ke view
        ]; 

        return view('list_user', $data); 
    }

    public function create(){
        $kelas = $this->kelasModel->getKelas(); // Mengambil semua data kelas
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data); // Mengembalikan view create_user
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi untuk IPK
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
        ]);

        // Handle upload foto
        $filename = null;
        if ($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('upload/img'), $filename); // Menyimpan file foto di folder 'upload/img'
        }

        // Menyimpan data ke database termasuk path foto dan IPK
        $this->userModel->create([
            'nama' => $req->input('nama'),
            'kelas_id' => $req->input('kelas_id'),
            'ipk' => $req->input('ipk'), // Simpan IPK
            'foto' => $filename, // Menyimpan path foto
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id) {
        $user = $this->userModel->getUser($id); // Mengambil data user berdasarkan ID

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data); // Mengembalikan view profile
    }

    public function edit($id){
        $user = $this->userModel->getUser($id); // Mengambil user berdasarkan ID
        $kelas = $this->kelasModel->getKelas(); // Mengambil data kelas
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title')); // Mengembalikan view edit_user
    }

    public function update(Request $req, $id) {
        $user = $this->userModel->findOrFail($id); // Mengambil user berdasarkan ID

        $req->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi untuk IPK
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
        ]);

        // Update data user
        $user->nama = $req->input('nama');
        $user->kelas_id = $req->input('kelas_id');
        $user->ipk = $req->input('ipk'); // Simpan IPK

        if ($req->hasFile('foto')) {
            $fileName = time() . '_' . $req->foto->getClientOriginalName();
            $req->foto->move(public_path('upload/img'), $fileName);
            $user->foto = $fileName; // Simpan path foto
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id){
        $user = $this->userModel->findOrFail($id); // Mengambil user berdasarkan ID
        $user->delete(); // Hapus user

        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
    }
}

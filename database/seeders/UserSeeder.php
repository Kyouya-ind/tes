<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'username' => 'pupu',
            'password' => Hash::make('123'),
        ]);

        $user = User::create([
            'username' => '123',
            'password' => Hash::make('123'),
        ]);

        Siswa::create([
            'id_user' => $user->id_user,
            'nama' => 'pupu',
            'nisn' => '123',
            'kelas' => 'XII',
            'jurusan' => 'RPL 1',
        ]);

    }
}
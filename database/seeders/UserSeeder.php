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
            'username' => 'rahmatyo',
            'password' => Hash::make('123'),
        ]);

        $user = User::create([
            'username' => '123',
            'password' => Hash::make('123'),
        ]);

        Siswa::create([
            'id_user' => $user->id_user,
            'nama' => 'rahmatyo',
            'nisn' => '123',
            'kelas' => 'XII',
            'jurusan' => 'RPL 1',
        ]);

        $user1 = User::create([
            'username' => '321',
            'password' => Hash::make('321'),
        ]);

        Siswa::create([
            'id_user' => $user1->id_user,
            'nama' => 'rizki',
            'nisn' => '321',
            'kelas' => 'XII',
            'jurusan' => 'RPL 1',
        ]);
    }
}
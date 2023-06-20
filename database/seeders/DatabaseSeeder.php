<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Centro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Storage::deleteDirectory('activos');
        Storage::makeDirectory('activos');

        $this->call(RoleSeeder::class);

         \App\Models\User::factory()->create([
             'name' => 'admin superfix ',
             'email' => 'admin@superfix.com',
             'cargo' => 'Administrador',
             'zone' => 'PASTO',
             'password' => '$2y$10$5VcscokPu09VEchKDGkcJuOrUNk7l1MzF.fhvwhhLiJeMTmooOpDW'
         ])->assignRole('Admin');

         \App\Models\User::factory()->create([
             'name' => 'Mesa de ayuda 1',
             'email' => 'mesa@giro.com',
             'cargo' => 'Auxiliar de mesa de ayuda',
             'zone' => 'PASTO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Tecnico Pasto 1',
             'email' => 'tec@giro.com',
             'cargo' => 'Auxiliar de soporte',
             'zone' => 'PASTO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Tecnico Pasto 2',
             'email' => 'tec2@giro.com',
             'cargo' => 'Auxiliar de soporte',
             'zone' => 'PASTO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Tecnico Tumaco 1',
             'email' => 'tecm@giro.com',
             'cargo' => 'Auxiliar de soporte',
             'zone' => 'TUMACO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Tecnico Tumaco 2',
             'email' => 'tecm2@giro.com',
             'cargo' => 'Auxiliar de soporte',
             'zone' => 'TUMACO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Tecnico Ipiales 1',
             'email' => 'teci@giro.com',
             'cargo' => 'Auxiliar de soporte',
             'zone' => 'IPIALES',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Tecnico Ipiales 2',
             'email' => 'teci2@giro.com',
             'cargo' => 'Auxiliar de soporte',
             'zone' => 'IPIALES',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'lider pasto 1',
             'email' => 'lider1@giros.com',
             'cargo' => 'Lider Comercial',
             'zone' => 'PASTO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'lider pasto 2',
             'email' => 'lider2@giros.com',
             'cargo' => 'Lider Comercial',
             'zone' => 'PASTO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'lider tumaco 1',
             'email' => 'lider3@giros.com',
             'cargo' => 'Lider Comercial',
             'zone' => 'TUMACO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'lider tumaco 2',
             'email' => 'lider4@giros.com',
             'cargo' => 'Lider Comercial',
             'zone' => 'TUMACO',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'lider ipiales ',
             'email' => 'lider5@giros.com',
             'cargo' => 'Lider Comercial',
             'zone' => 'IPIALES',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'lider tuquerres',
             'email' => 'lider6@giros.com',
             'cargo' => 'Lider Comercial',
             'zone' => 'TUQUERRES',
         ]);

         \App\Models\Centro::factory()->create([
            'code' => '1679',
            'name' => 'OFICINA IMBILI'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1681',
            'name' => 'OFICINA CANDELILLAS'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '2163',
            'name' => 'IPIALES NUEVO'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1088',
            'name' => 'OFICINA TUMACO'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '2166',
            'name' => 'CENTRO PASTO NUEVO'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '2167',
            'name' => 'SANDONA NUEVO'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1111',
            'name' => 'LOGISTICA'
         ]);
    }
}

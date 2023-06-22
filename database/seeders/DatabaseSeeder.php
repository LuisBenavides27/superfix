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
            'name' => 'IMBILI'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1681',
            'name' => 'CANDELILLAS'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1088',
            'name' => 'TUMACO'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1089',
            'name' => 'SALAHONDA'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '1091',
            'name' => 'LLORENTE'
         ]);

         \App\Models\Centro::factory()->create([
            'code' => '2145',
            'name' => 'CHARCO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2146',
            'name' => 'ISCUANDE NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2147',
            'name' => 'SATINGA NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2148',
            'name' => 'MOSQUERA NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2149',
            'name' => 'LA TOLA NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2150',
            'name' => 'BARBACOAS NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2151',
            'name' => 'SAN JOSE NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2152',
            'name' => 'MAGUI NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2153',
            'name' => 'LA UNION NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2154',
            'name' => 'SAN PABLO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2155',
            'name' => 'LA CRUZ NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2156',
            'name' => 'TAMINANGO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2157',
            'name' => 'BUESACO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2158',
            'name' => 'BELEN NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2159',
            'name' => 'LEIVA NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2161',
            'name' => 'ROSARIO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2162',
            'name' => 'REMOLINO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2163',
            'name' => 'IPIALES NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2164',
            'name' => 'TUQUERRES NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2165',
            'name' => 'SAMANIEGO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2166',
            'name' => 'CENTRO PASTO NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2167',
            'name' => 'SANDONA NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2170',
            'name' => 'TANGUA NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2171',
            'name' => 'CHACHAGUI NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2172',
            'name' => 'RICAURTE NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2418',
            'name' => 'MITU'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2441',
            'name' => 'LINARES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2461',
            'name' => 'PANDIACO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2488',
            'name' => 'BOMBONA-PASTO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2444',
            'name' => 'SAN LORENZO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2445',
            'name' => 'SAN BERNARDO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2451',
            'name' => 'TARAIRA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2455',
            'name' => 'TERMINAL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2490',
            'name' => 'AV COLOMBIA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '1719',
            'name' => 'SAN JUAN COSTA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2501',
            'name' => 'COMFAMILIAR'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2520',
            'name' => 'PUERTO ASIS'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2522',
            'name' => 'MOCOA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2524',
            'name' => 'LA HORMIGA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2526',
            'name' => 'ORITO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2528',
            'name' => 'VILLA GARZON'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2530',
            'name' => 'LS MERCED'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2531',
            'name' => 'CHAMBU'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2532',
            'name' => 'SANTA ISABEL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2538',
            'name' => 'OBANDO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2541',
            'name' => 'SUR TUMACO'
        ]);

        \App\Models\Centro::factory()->create([
            'code' => '2543',
            'name' => 'NORTE TUMACO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '1090',
            'name' => 'CHAJAL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2448',
            'name' => 'CARURU'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2545',
            'name' => 'PTO CAICEDO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2547',
            'name' => 'PTO GUZMAN'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2549',
            'name' => 'PTO LEGIZAMO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2611',
            'name' => 'LA DORADA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '2613',
            'name' => 'SOTOMAYOR'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3349',
            'name' => 'CONSACA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3366',
            'name' => 'SAN JOSE ALBAN'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3554',
            'name' => 'SOTOMAYOR'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3583',
            'name' => 'COLON'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3587',
            'name' => 'SAN FRANCISCO '
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3821',
            'name' => 'PRADO MAR'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3340',
            'name' => 'NARIÑO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3343',
            'name' => 'EL TAMBO '
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3355',
            'name' => 'GENOVA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3585',
            'name' => 'SANTIAGO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3624',
            'name' => 'PROVD_NARIÑO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3824',
            'name' => 'BERRUECOS'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3302',
            'name' => 'SANTANA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3317',
            'name' => 'SIBUNDOY NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3346',
            'name' => 'LA FLORIDA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3352',
            'name' => 'ANCUYA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3435',
            'name' => 'YACUANQUER NVO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3690',
            'name' => 'PUERTO UMBRIA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3371',
            'name' => 'GUALTAL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3373',
            'name' => 'EL PIÑAL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3692',
            'name' => 'EL PEÑOL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3699',
            'name' => 'GUAITARILLA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3700',
            'name' => 'GUACHAVEZ'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3701',
            'name' => 'SAPUYES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3736',
            'name' => 'PIEDRANCHA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3738',
            'name' => 'LA LLANADA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3894',
            'name' => 'CARTAGO NARIÑO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '4324',
            'name' => 'CATAMBUCO '
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '4381',
            'name' => 'PTO COLON'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3902',
            'name' => 'OSPINA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '4651',
            'name' => 'IMUES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5152',
            'name' => 'TABLON GOMEZ'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5150',
            'name' => 'LA ESTANCIA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5151',
            'name' => 'LAS MESAS'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5159',
            'name' => 'ALDANA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5161',
            'name' => 'FUNES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5166',
            'name' => 'ILES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5039',
            'name' => 'ROSAL DEL MONTE'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5154',
            'name' => 'GUACHUCAL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5156',
            'name' => 'POTOSI'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5158',
            'name' => 'GUALMATAN'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5155',
            'name' => 'CUMBAL'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5165',
            'name' => 'CONTADERO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5157',
            'name' => 'CARLOSAMA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5162',
            'name' => 'PUERRES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5163',
            'name' => 'CORDOBA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5164',
            'name' => 'SAN JUAN'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5176',
            'name' => 'PUPIALES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '6062',
            'name' => 'CHUCUNES'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '5692',
            'name' => 'SANTA ANA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '3820',
            'name' => 'PARQUE NARIÑO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '8649',
            'name' => 'GENOY NUEVO'
        ]);
               
        \App\Models\Centro::factory()->create([
            'code' => '6655',
            'name' => 'PUERTO OSPINA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '6093',
            'name' => 'TUQUERRES ESP'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '8952',
            'name' => 'GUALMATAN FARM'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '6780',
            'name' => 'UNICENTRO'
        ]);
              
        \App\Models\Centro::factory()->create([
            'code' => '16801',
            'name' => 'EL ENCANO'
        ]);
                        
        \App\Models\Centro::factory()->create([
            'code' => '20296',
            'name' => 'ROBLES CDA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '24009',
            'name' => 'YURUPARI'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '19858',
            'name' => 'PATIA'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '41068',
            'name' => 'MOVIL PASTO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '41057',
            'name' => 'MOVIL TUMACO'
        ]);
        
        \App\Models\Centro::factory()->create([
            'code' => '42391',
            'name' => 'ORIENTE TUMACO'
        ]);

         \App\Models\Centro::factory()->create([
            'code' => '1111',
            'name' => 'LOGISTICA'
         ]);
         \App\Models\Centro::factory()->create([
            'code' => '2222',
            'name' => 'SEDE ADMINISTRATIVA'
         ]);
    }
}

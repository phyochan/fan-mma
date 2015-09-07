<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use   \App\User;
use \App\Request;
use \App\Sends;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->call('AdminSeeder');

        Model::reguard();
    }
}



class AdminSeeder extends Seeder{

    public function run(){


        User::create([

            'name' => 'phyochan',
            'nickname' => 'Phyo Chan',
            'email' => 'phyochandeveloper@gmail.com',
            'password' => Hash::make('phyo12345'),

        ]);

        User::create([

            'name' => 'nyipaing',
            'nickname' => 'Nyi Paing',
            'email' => 'nyipaing2015@gmail.com',
            'password' => Hash::make('nyipaing12345'),

        ]);


        User::create([

            'name' => 'naymyint',
            'nickname' => 'Nay Myint',
            'email' => 'emovious.kg.92@gmail.com',
            'password' => Hash::make('naymyint12345'),

        ]);

        User::create([

            'name' => 'thantzinphyo',
            'nickname' => 'Thant Zin Phyo',
            'email' => 'thantzinphyo11@gmail.com',
            'password' => Hash::make('thantzinphyo12345'),

        ]);



    }
}


class RequestSeeder extends Seeder{

    public function run(){


        $faker = Faker\Factory::create();


        for($i = 0; $i < 20; $i++){

            Request::create([

                'songname' => 'test',
                'name' => $faker -> name,
                'singer' => $faker -> name,
                'email' => $faker -> email,


            ]);

        }


    }
}

class UgSeeder extends Seeder{

    public function run(){


        $faker = Faker\Factory::create();


        for($i = 0; $i < 20; $i++){

            Sends::create([

                'songname' => 'test',
                'name' => $faker -> name,
                'singer' => $faker -> name,
                'email' => $faker -> email,
                'mp3' => "http://localhost:8000/upload/send/mp3/8 Days, 8 months, 8 hours.mp3"


            ]);

        }


    }
}

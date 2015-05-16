<?php


use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserStorySeeder extends Seeder {

    private $faker;

    public function __construct(){

        $this->faker = Faker::create('au_AU');

    }

    private function createUser($overrides = [], $seed = null){


        $faker = $this->faker;

        if ($seed){
            $faker->seed($seed);
        }

        $userInfo = array_merge([
            'user_id' => $faker->uuid,
            'email' => $faker->email,
            'password' => Hash::make('password'),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'phone' => $faker->optional(0.5)->phoneNumber,
            'mobile' => $faker->optional(0.5)->phoneNumber,
        ], $overrides);

        $user = new User($userInfo);

        $user->timestamps = true;
        $user->save();

    }

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        $this->createUser([
            'email'=>'john.smith@example.com'
        ]);

        foreach(range(0, 99) as $index){

            $this->createUser();

        }



	}

}
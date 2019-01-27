<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //call uses table seeder class
  		$this->call('teams');
        //this message shown in your terminal after running db:seed command
        $this->command->info("teams table seeded :)");
        //call uses table seeder class
  		$this->call('users');
        //this message shown in your terminal after running db:seed command
        $this->command->info("users table seeded :)");
    }
}
class teams extends Seeder {
   public function run()
   {
     //insert some dummy records
     DB::table('teams')->insert(array(
         array('name'=>'Member 1','image'=>'1548573830_first.jpg'),
         array('name'=>'Member 2','image'=>'1548573830_sec.jpg'),
         array('name'=>'Member 3','image'=>''),
         array('name'=>'Member 4','image'=>'1548573831_team1.png'),
         array('name'=>'Member 5','image'=>'1548573831_team2.png'),
         array('name'=>'Member 6','image'=>'1548573832_team4.png'),
         array('name'=>'Member 7','image'=>''),
         array('name'=>'Member 8','image'=>'')
    ));
   }
}
class users extends Seeder {
   public function run()
   {
     //insert some dummy records
     DB::table('users')->insert(array(
         array('name'=>'demo','email'=>'demo@gmail.com','password'=>'$2y$10$yScwVLnRrqvIukeoc7rlPum3oPkNpqgeA4iBLCVwNY5pPAB5pzeiC','remember_token'=>'OY5zLBDpNIZlf8DalJKo0hiQvAtAjVCRvAmHgePUexfwAxxLof6fEENbSx7A')
    ));
   }
}
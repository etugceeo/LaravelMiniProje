<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;//DB sınıfını kullanmak için gerekli

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->truncate();
        //DB::table('company')->insert(['company_name'=>'Şişecam','...']);

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Settings;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ここでは内容の変わらないレコードを作る（factoryを通していないので、ダミーではない）
        Settings::create([
            'site_name' => 'Laravel Todo',
            'contact_number' => '91709918',
            'contact_email' => 'info_todo@laravel.com',
            'address' => 'Bangalore,Karnataka'
        ]);
    }
}

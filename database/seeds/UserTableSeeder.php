<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'realName' => '�����й����۳�������Ա',
            'nickName' => '����Ƽ',
            'email' => 'star2208@126.com',
            'password' => md5('yca123456'),
            'headImage' => ''
        ]);
    }
}

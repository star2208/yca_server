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
            'realName' => '少年中国评论超级管理员',
            'nickName' => '邵钟萍',
            'email' => 'star2208@126.com',
            'password' => md5('yca123456'),
            'headImage' => ''
        ]);
    }
}

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
        $arr = array ('super_admin'=>0,'admin'=>0,'manager'=>0);
        DB::table('users')->insert([
            'realName' => '少年中国评论超级管理员',
            'nickName' => '邵中平',
            'email' => '3063440744@qq.com',
            'password' => md5('yca1988szp51'),
            'headImage' => '/upload/icon.png',
            'level' => json_encode(arr)
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $member = new \App\Models\Member([
            'name' => 'Jakub',
            'email' => 'jakubkovacik210@gmail.com',
            'contact' => '+421917588526',
            'joined' => '2023-06-11'
        ]);
        $member->save();

        $member = new \App\Models\Member([
            'name' => 'Ivana',
            'email' => 'ivanka123@gmail.com',
            'contact' => '0915301006',
            'joined' => '2023-06-10'
        ]);
        $member->save();

        $member = new \App\Models\Member([
            'name' => 'Janko',
            'email' => 'Janko@gmail.com',
            'contact' => '+420123456',
            'joined' => '2023-05-02'
        ]);
        $member->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class TypeFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tf1 = new \App\TypeFood();
        $tf1->name =  'ต้มยำกุ้ง';
        $tf1->save();

        $tf2 = new \App\TypeFood();
        $tf2->name =  'กระเพราหมูกรอบ';
        $tf2->save();

        $tf3 = new \App\TypeFood();
        $tf3->name =  'ข้าวผัดรวม';
        $tf3->save();

        $tf4 = new \App\TypeFood();
        $tf4->name =  'ของหวาน';
        $tf4->save();

        $tf5 = new \App\TypeFood();
        $tf5->name =  'เครื่องดื่ม';
        $tf5->save();
    }
}

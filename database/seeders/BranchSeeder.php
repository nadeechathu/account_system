<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'branch_name' => 'Kegalle',
                'branch_code' => 'S01',
                'branch_status' => '1',
            ],
            [
                'branch_name' => 'Deraniyagala',
                'branch_code' => 'S02',
                'branch_status' => '1',
            ],
        ];
    
        DB::table('branches')->insert($data);
    }
}

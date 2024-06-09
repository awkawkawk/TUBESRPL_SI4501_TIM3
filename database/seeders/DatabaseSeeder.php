<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\NewsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\SchoolsTableSeeder;
use Database\Seeders\TargetsTableSeeder;
use Database\Seeders\CampaignsTableSeeder;
use Database\Seeders\DonationsTableSeeder;
use Database\Seeders\HistoriesTableSeeder;
use Database\Seeders\ItemDonationsTableSeeder;
use Database\Seeders\MethodPaymentsTableSeeder;
use Database\Seeders\MoneyDonationsTableSeeder;
use Database\Seeders\TahapPencairanTableSeeder;
use Database\Seeders\RequestPencairanTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(CampaignsTableSeeder::class);
        $this->call(TargetsTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(ItemDonationsTableSeeder::class);
        $this->call(MethodPaymentsTableSeeder::class);
        $this->call(MoneyDonationsTableSeeder::class);
        $this->call(RequestPencairanTableSeeder::class);
        $this->call(TahapPencairanTableSeeder::class);
        $this->call(HistoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
    }

}

<?php

namespace Nemooon\Glitter\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'glitter:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the commands necessary to prepare Glitter for use';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $store = \Nemooon\Glitter\Store::create([
            'slug' => 'my-store',
            'name' => 'My Store',
        ]);

        $role = \Nemooon\Glitter\Role::create([
            'store_id' => $store->getKey(),
            'name' => 'Admin',
            'description' => '',
        ]);

        $member = \Nemooon\Glitter\Member::create([
            'name' => 'nemooon',
            'email' => 'n@on-lab.jp',
            'password' => bcrypt('password'),
        ]);

        $customer = \Nemooon\Glitter\Customer::create([
            'name' => 'nemooon',
            'email' => 'n@on-lab.jp',
            'password' => bcrypt('password'),
        ]);

        $customer->stores()->attach($store);
        $customer->roles()->attach($role);
    }
}

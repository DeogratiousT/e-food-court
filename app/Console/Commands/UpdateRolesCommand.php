<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class UpdateRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all Roles and Abilities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (config('roles.roles') as $role) {
            Role::updateOrCreate(['name'=>$role]);
        }

       return $this->info('Roles updated successfully');
    }
}

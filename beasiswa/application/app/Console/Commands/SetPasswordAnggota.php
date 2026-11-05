<?php
namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class SetPasswordAnggota extends Command {

    protected $name = 'member:setPassword';
    protected $description = 'Set Password Member';

    //

    public function handle() {
        $accounts = User::where('CREATEDAT',"2021-07-10 00:00:00.000")
                    ->get();
        foreach ($accounts as $account){
            $password = explode('-',str_replace(' ', '', $account->password));
            \Log::info(json_encode($password));
            $convertPassword = $password[0].$password[3].$password[2].$password[1];
            $account->password = bcrypt($convertPassword);
            $account->save();
        }
    }
}

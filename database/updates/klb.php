<?php

use App\Models\User;

class klb{

    public function editarNome()
    {
        User::where('id', 2)->update(['name' => 'KLB']);
    }
}
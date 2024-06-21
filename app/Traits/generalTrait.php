<?php
namespace App\Traits;

use App\Models\roles;
use Exception;

trait GeneralTrait{
    public function roleList(){
        try{
            $roles = roles::all();
            return $roles;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
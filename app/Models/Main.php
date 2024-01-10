<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\MainStoreEvent;
class Main extends Model
{
    protected $table = "mains";
    protected $fillable = [];

    public static function store($data)
    {
        return self::create($data);
    }

    public function updateData($data)
    {
        $this->update($data);
        return $this;
    }
}

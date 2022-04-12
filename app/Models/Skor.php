<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Skor extends Model
{
    protected $fillable = ['skor'];
    public function allData()
    {
        return DB::table('skors')->get();
    }

    public function detailData($id)
    {
        return  DB::table('skors')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('skors')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('skors')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('skors')->where('id', $id)->delete();
    }
}
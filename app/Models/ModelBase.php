<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class ModelBase
{
    protected $table;

    public function all()
    {
        return DB::table($this->table)->get();
    }
    public function one($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }
    public function count()
    {
        return DB::table($this->table)->count();
    }

    public function countElem($field, $sort, $count)
    {
        return DB::table($this->table)->orderBy($field, $sort)->limit($count)->get();
    }

    public function save($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }

    public function value($id, $value)
    {
        return DB::table($this->table)->where('id', $id)->value($value);
    }
    public function paginate($field, $sort, $count)
    {
        return DB::table($this->table)->orderBy($field, $sort)->paginate($count);
    }
}

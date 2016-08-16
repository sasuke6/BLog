<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    public function tree()
    {
        $category = $this->all();
        return $this->getTree($category, 'cate_name', 'cate_id', 'cate_pid');
    }

    public function getTree($data, $field_name, $field_id = 'id', $field_pid = 'pid', $pid = 0)
    {
        $array = array();
        foreach ($data as $tmp => $real) {
            if ($real->$field_pid == $pid) {
                $data[$k]["_" . $field_name] = $data[$k][$field_name];
                $array[] = $data[$tmp];
                foreach ($data as $tmpSe => $realSe) {
                    if ($realSe->$field_pid == $real->$field_id) {
                        $data[$tmpSe]["_" . $field_name] = '___' . $data[$tmpSe][$field_name];
                        $array[] = $data[$tmpSe];
                    }
                }
            }
        }

        return $array;
    }
}

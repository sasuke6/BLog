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
        $category = $this->orderBy('cate_order', 'asc')->get();
        $tmp =  $this->getTree($category, 'cate_name', 'cate_id', 'cate_pid',0);
        return $tmp;
    }

    public function getTree($data, $field_name, $field_id, $field_pid, $pid)
    {
        $array = array();
        foreach ($data as $tmp => $real) {
            if ($real->$field_pid == $pid) {
                $data[$tmp]["_".$field_name] = $data[$tmp][$field_name];
                $array[] = $data[$tmp];
                foreach ($data as $tmpSe => $realSe) {
                    if ($realSe->$field_pid == $real->$field_id) {
                        $data[$tmpSe]["_" . $field_name] = "|————".$data[$tmpSe][$field_name];
                        $array[] = $data[$tmpSe];
                    }
                }
            }
        }


        return $array;
    }
}

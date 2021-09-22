<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function delete() {
        unlink('.' . $this->file_path);
        parent::delete();
    }
}

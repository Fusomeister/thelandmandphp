<?php

namespace App\Models;

use Database\Model;
use DB;

class Links extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'PK_linksId';
    
    public function getLinks()
    {
        $data = DB::table('links')->get();
        
        return $data;
    }
    
    public function addLink($newLink)
    {
        DB::table('links')->insert($newLink);
    }
    
    public function DeleteLink($id)
    {
        DB::table('links')->where('PK_linksId', $id)->delete();
    }
    
    public function GetLinkFromId($id)
    {
        $data = DB::table('links')->where('PK_linksId', $id)->first();
        
        return $data;
    }
    
    public function UpdateLinks($id, $newLink)
    {
        DB::table('links')->where('PK_linksId', $id)->update($newLink);
    }
}
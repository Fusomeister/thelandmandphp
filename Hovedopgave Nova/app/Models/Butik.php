<?php

namespace App\Models;

use Database\Model;
use DB;

class Butik extends Model
{
    
    public function GetCategories()
    {
        $data = DB::table('categories')->get();
        
        return $data;
    }
    
    public function GetProducts()
    {
        $data = DB::table('products')->get();
        
        return $data;
    }
    
    public function SearchProducts($id)
    {
        $data = DB::table('products')->where('FK_pCatId', $id)
                ->leftJoin('images', 'products.FK_pImageId', '=', 'images.PK_imageId')
                ->get();
        
        return $data;
    }
    
    public function AddProduct($newProduct)
    {
        DB::table('products')->insert($newProduct);
    }
    
    public function DeleteProduct($id)
    {
        DB::table('products')->where('PK_productId', $id)->delete();
    }
    
    public function FindProduct($id)
    {
        $data = DB::table('products')->where('PK_productId', $id)->first();
        
        return $data;
    }
    
    public function EditProduct($id, $newProduct)
    {
        DB::table('products')->where('PK_productId', $id)->update($newProduct);
    }
    
    public function AddCategory($newCategory)
    {
        DB::table('categories')->insert($newCategory);
    }
    
    //Also remove products with FK_pCatId = $id
    public function DeleteCategory($id)
    {
        DB::table('products')->where('FK_pCatId', $id)->delete();
        
        DB::table('categories')->where('PK_catId', $id)->delete();
    }
        
    public function ProductsPlusPictures()
    {
        $data = DB::table('products')
                ->leftJoin('images', 'products.FK_pImageId', '=', 'images.PK_imageId')
                ->get();
        
        return $data;
    }
    
    public function GetImages()
    {
        $data = DB::table('images')->get();
        
        return $data;
    }
    
    public function AddPicture($newPicture)
    {
        DB::table('images')->insert($newPicture);
    }
    
    public function ShoppingCart($id)
    {
        $data = DB::table('products')
                ->where('PK_productId', $id)
                ->leftJoin('images', 'products.FK_pImageId', '=', 'images.PK_imageId')
                ->leftJoin('categories', 'products.FK_pCatId', '=', 'categories.PK_catId')                
                ->first();
        
        return $data;
    }
}
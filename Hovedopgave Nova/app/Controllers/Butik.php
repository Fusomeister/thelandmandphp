<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Butik as ButikModel;

use Helpers\Session as oldSession;
use Session;
use Helpers\Password;
use Helpers\Url;
use Redirect;

class Butik extends \App\Core\Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        
        $this->model = new ButikModel;
    }
    
    public function index()
    {
        $getCategories = $this->model->GetCategories();
        $getProducts = $this->model->ProductsPlusPictures();
        
        return View::make('Butik/index')
                ->shares('title', 'Butik')
                ->withCategory($getCategories)
                ->withProducts($getProducts);
    }
    
    public function SearchProduct($id)
    {
        $getCategories = $this->model->GetCategories();
        $getSearched = $this->model->SearchProducts($id);
        
        return View::make('Butik/index')
                ->shares('title', 'Butik')
                ->withCategory($getCategories)
                ->withProducts($getSearched);
    }
    
    //GET /butik/addProduct
    public function AddProduct()
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $getCategories = $this->model->GetCategories();
            $getImages = $this->model->GetImages();

            return View::make('Butik/createProduct')
                    ->shares('title', 'Opret Produkt')
                    ->withCategory($getCategories)
                    ->withImages($getImages);
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //POST
    public function AddProductPost()
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $name = $_POST['navn'];
            $desc = $_POST['pDesc'];
            $price = $_POST['price'];
            $antal = $_POST['antal'];
            $category = $_POST['category'];
            $picture = $_POST['selectbasic'];

            if(strpos($price, ","))
            {
                $price = str_replace(",", ".", $price);
            }

            $newProduct = array(
                'name' => $name,
                'pDesc' => $desc,
                'price' => $price,
                'antal' => $antal,
                'FK_pCatId' => $category,
                'FK_pImageId' => $picture
            );

            $this->model->AddProduct($newProduct);
            Return Redirect::to('/butik');     
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
      
    public function DeleteProduct($id)
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $this->model->DeleteProduct($id);     
            return Redirect::back();
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //GET
    public function EditProduct($id)
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $getCategories = $this->model->GetCategories();
            $findProduct = $this->model->FindProduct($id);

            return View::make('Butik/editProduct')
                    ->shares('title', 'Rediger Produkt')
                    ->withCategory($getCategories)
                    ->withProduct($findProduct);
        }
        else
        {
            Return redirect::to('/');
        }        
    }
    
    public function EditProductPost($id)
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $name = $_POST['navn'];
            $desc = $_POST['pDesc'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if(strpos($price, ","))
            {
                $price = str_replace(",", ".", $price);
            }

            $newProduct = array(
                'name' => $name,
                'pDesc' => $desc,
                'price' => $price,
                'FK_pCatId' => $category
            );

            $this->model->EditProduct($id, $newProduct);
            Return Redirect::to('/butik');
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //GET /butik/createCategory
    public function CreateCategory()
    {
        if(oldSession::get('isAdmin') == '1')
        {
            
            return View::make('Butik/createCategory')
                    ->shares('title', 'Opret Kategori');
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //POST
    public function CreateCategoryPost()
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $name = $_POST['category'];

            $newCategory = array('C_name' => $name);

            $this->model->AddCategory($newCategory);
            Return Redirect::to('/butik');
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //GET
    public function deleteCategory()
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $getCategories = $this->model->GetCategories();
            
            return View::make('Butik/deleteCategory')
                    ->shares('title', 'Slet kategori')
                    ->withData($getCategories);
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //POST (skal skiftes til post)
    public function DeleteCategoryPost($id)
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $this->model->DeleteCategory($id);

            return Redirect::to('/butik/deleteCategory');
        }
        else
        {
            Return redirect::to('/');
        }
    }
    
    //GET
    public function AddPicture()
    {
        if(oldSession::get('isAdmin') == 1)
        {
            return View::make('Butik/createImage')
                    ->shares('title', 'Opret Billede');
        }
        else
        {
            return redirect::to('/');
        }
    }
    
    //POST
    public function AddPicturePost()
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $imageUrl = $_POST['url'].'.jpg';
            $desc = $_POST['desc'];

            $newPicture = array(
                'url' => $imageUrl,
                'iDesc' => $desc
            );

            $this->model->AddPicture($newPicture);
            Return redirect::to('/butik');
        }
        else
        {
            return redirect::to('/');
        }
    }
    
    //POST
    public function AddProductToCart($id)
    {      
        Session::push('cart', $id);
        Return redirect::to('/butik');           
    }
    
    //GET
    public function ShoppingCart()
    {
        $selectedProducts = Session::get('cart');
        $shoppingCart = array();
        $totalPrice = 0.00;
        
        //take IDs and get objs in array
        if($selectedProducts == null)
        {
            $data = 0;
        }
        else
        {
            foreach($selectedProducts as $id)
            {
                $shoppingCart[] = $this->model->ShoppingCart($id);
            }
        }
        
        //count the price
        foreach($shoppingCart as $item)
        {
            $totalPrice = $totalPrice + $item->price;
        }
        $herafMoms = $totalPrice / 100 * 25;

        return View::make('Butik/ShoppingCart')
                ->shares('title', 'Indkøbskurv')
                ->withData($shoppingCart)
                ->withPrice($totalPrice)
                ->withMoms($herafMoms);
    }
    
    //GET
    public function RemoveItemFromCart($id)
    {
        $getCurrentSession = Session::get('cart');
        unset($getCurrentSession[$id]);
        Session::forget('cart');
        
        foreach($getCurrentSession as $item)
        {
            Session::push('cart',$item);
        }
        Return redirect::to('/butik/shoppingCart');
    }
    
    public function ProductTest()
    {
        //Session::flush();
        //Session::push('key', 'value1');
        //Session::push('key', 'value2');
//  Session::push('key', 'value3');
//        Session::push('key', 'value4');
        //$getProducts = $this->model->ProductsPlusPictures();
        
        //pr($getProducts);
        $dat[] = 1;
        $data[] = $this->model->ShoppingCart('9') + $dat;
        //$ide = Session::remove('cart', '9');

        
        //$getStuff = $this->model->ShoppingCart($id);
        pr($data);
        //Session::flush();
        //$data = Session::get('cart');
        
//        foreach($data as $d)
//        {
//            echo $d . ' ';
//        }
    }
}

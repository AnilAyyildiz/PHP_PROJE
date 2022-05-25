<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function countmessage(){
        return Message::where("status","New")->count();
    }
    public function index(){
        return view("admin.index");
    }
}

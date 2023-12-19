<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\State;
use App\Models\GenreCategory;
use App\Models\SexCategory;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Purchase;


class ItemController extends Controller
{
    public function index()
    {
        $sold_items = Purchase::get('item_id')->toArray();
        $sold_items_id = [];
        foreach($sold_items as $item){
            $sold_items_id[] = $item['item_id'];
        }
        $items = Item::whereNotIn('id', $sold_items_id)->orderBy('created_at', 'desc')->get();

        $favorites = Favorite::where('user_id', Auth::id())->get('item_id')->toArray();

        $favorite_items_id = [];
        foreach ($favorites as $item) {
            $favorite_items_id[] = $item['item_id'];
        }
        $favorite_items = Item::whereIn('id', $favorite_items_id)->whereNotIn('id', $sold_items_id)->get();

        return view("items", compact("items", "favorite_items"));
    }

    public function search(Request $request)
    {
        $sold_items = Purchase::get('item_id')->toArray();
        $sold_items_id = [];
        foreach ($sold_items as $item) {
            $sold_items_id[] = $item['item_id'];
        }
        $items = Item::whereNotIn('id', $sold_items_id)->orderBy('created_at', 'desc')->KeywordSearch($request->keyword)->get();

        $favorites = Favorite::where('user_id', Auth::id())->get('item_id')->toArray();

        $favorite_items_id = [];
        foreach ($favorites as $item) {
            $favorite_items_id[] = $item['item_id'];
        }
        $favorite_items = Item::whereIn('id', $favorite_items_id)->whereNotIn('id', $sold_items_id)->KeywordSearch($request->keyword)->get();

        return view("items", compact("items", "favorite_items"));
    }
    public function detail($id)
    {
        $item = Item::with(['brand', 'color', 'state', 'sex_category', 'genre_category'])->find($id);
        if (Favorite::where('user_id', Auth::id())->where('item_id', $id)->get()->isEmpty()) {
            $favorite = False;
        } else {
            $favorite = True;
        }
        ;
        $favorite_count = Favorite::where('item_id', $id)->count();
        $comment_count = Comment::where('item_id', $id)->count();
        return view("detail", compact("item", "favorite", "favorite_count", "comment_count"));
    }

    public function sell()
    {
        $states = State::all();
        $colors = Color::all();
        $genre_categories = GenreCategory::all();
        $sex_categories = SexCategory::all();
        $brands = Brand::all();
        return view("sell", compact("states", 'genre_categories','sex_categories', 'brands', 'colors'));
    }
    public function sell_register(Request $request)
    {
        $time = \Carbon\Carbon::now();

        Item::create($request->all());
        $request->file('image')->storeAS("public/img/", $time . ".jpg");
        Item::latest()->first()->update(['image' => "storage/img/" . $time . ".jpg"]);
        return redirect('/');
    }
    public function favorite(Request $request)
    {
        $user_id = Auth::id();
        $item_id = $request->item_id;
        Favorite::create(['user_id' => $user_id, 'item_id' => $item_id]);
        return redirect('/item/' . $item_id);
    }
    public function unfavorite(Request $request)
    {
        $user_id = Auth::id();
        $item_id = $request->item_id;
        Favorite::where('user_id', $user_id)->where('item_id', $item_id)->delete();
        return redirect('/item/' . $item_id);
    }

    public function comment($id)
    {
        $item = Item::with(['brand', 'color', 'state'])->find($id);
        if (Favorite::where('user_id', Auth::id())->where('item_id', $id)->get()->isEmpty()) {
            $favorite = False;
        } else {
            $favorite = True;
        }
        ;
        $favorite_count = Favorite::where('item_id', $id)->count();
        $comment_count = Comment::where('item_id', $id)->count();
        $comments = Comment::with('user')->where('item_id', $id)->get();
        return view("comment", compact("item", "favorite", "favorite_count", "comment_count", "comments"));
    }
    public function comment_upload(Request $request)
    {
        $user_id = Auth::id();
        $item_id = $request->item_id;
        $content = $request->content;
        Comment::create(['user_id'=> $user_id, 'item_id'=> $item_id, 'content'=> $content]);
        return redirect('/item/' . $item_id . '/comment');
    }
    public function comment_delete(Request $request)
    {
        $comment_id = $request -> comment_id;
        Comment::find($comment_id) -> delete();
        $item_id = $request->item_id;
        return redirect('/item/' . $item_id . '/comment');
    }

}
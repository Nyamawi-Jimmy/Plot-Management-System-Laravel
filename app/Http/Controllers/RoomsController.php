<?php

namespace App\Http\Controllers;

use App\Models\Blocks;
use App\Models\Post;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mockery\Exception;

class RoomsController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            "room_id" => ["integer", Rule::exists('blocks', "id")],
            "name" => ["string"],
            "block" => ["string"],
            "category" => ["string"],
            "rent" => ["integer"],
            "deposit" => ["integer"]
        ]);

        Room::create($data);


        return redirect("rooms");

    }

    public function create()
    {
        $rooms = Room::all();

        return view("pages.rooms", compact('rooms'));
    }

    public function list()
    {
        $rooms = Room::orderByDesc("created_at")
            ->get();

        return view("pages.rooms", [
            "rooms" => $rooms
        ]);
    }


}

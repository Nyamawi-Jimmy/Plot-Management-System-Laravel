<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Validation\Rule;

class RoomsController
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

    }

        public function create()
    {
        $room = Room::all();

        return view("create", [
            "users" => $room
        ]);

    }

}

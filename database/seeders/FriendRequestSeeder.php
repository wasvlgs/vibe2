<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FriendRequest;

class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can create sample friend requests for testing
        FriendRequest::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'status' => 'pending',
        ]);
        
        // Add more requests as necessary...
    }
}

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Document;
use Faker\Factory as Faker;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        return;
      
        // Create conversations
        for ($i = 0; $i < 5; $i++) {
            Conversation::create([
                'student_id' => 1,//$faker->randomElement(User::where('role', 'student')->pluck('id')->toArray()),
                'supervisor_id' =>1// $faker->randomElement(User::where('role', 'supervisor')->pluck('id')->toArray()),
            ]);
        }

        // Create messages
        for ($i = 0; $i < 20; $i++) {
            Message::create([
                'conversation_id' => $faker->randomElement(Conversation::pluck('id')->toArray()),
                'sender_id' => 1,//$faker->randomElement(User::pluck('id')->toArray()),
                'message' => $faker->sentence,
               ]);
        }

        // Create documents
        for ($i = 0; $i < 10; $i++) {
            Document::create([
                'message_id' => $faker->randomElement(Message::pluck('id')->toArray()),
                'file_name' => $faker->word . '.pdf',
                'description' => $faker->paragraph(2),
                'document_type' => "Doc",
                'file_type' => 'application/pdf',
                'file_path' => 'path/to/document.pdf',
            ]);
        }
    }
}
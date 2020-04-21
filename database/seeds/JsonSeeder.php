<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class JsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $pagesObj = json_decode(file_get_contents('./pages.json'));
        } catch (\Exception $e) {
            $this->command->line('You must have a pages.json file in the seeders directory for this command to work.');
            return -1;
        }

        foreach ($pagesObj as $pageObj) {
            Page::create(
                [
                    'name' => $pageObj->title,
                    'slug' => $pageObj->text,
                    'user_id' => 1,
                    'wiki_id' => 26,
                    'team_id' => 1,
                ]
            );
        }

        $this->command->line(
            sprintf('Imported %d pages from pages.json', count($pagesObj))
        );
    }
}

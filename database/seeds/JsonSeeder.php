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
                    'slug' => $this->slugify($pageObj->title),
                    'outline' => $pageObj->text,
                    'user_id' => 1,
                    'wiki_id' => 27,
                    'team_id' => 1,
                ]
            );
        }

        $this->command->line(
            sprintf('Imported %d pages from pages.json', count($pagesObj))
        );
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

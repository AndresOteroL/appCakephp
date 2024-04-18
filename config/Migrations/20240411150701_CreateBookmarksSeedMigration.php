<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class CreateBookmarksSeedMigration extends AbstractMigration
{
   public function up(){
    $faker = \Faker\Factory::create();
    $bookmarksTable = TableRegistry::getTableLocator()->get('Bookmarks');


    for ($i = 0; $i < 200; $i++) {
        $title = $faker->sentence($nbWords = 3, $variableNbWords = true);
        $description = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
        $url= $faker->url;
        $created = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
        $modified = $faker->dateTimeBetween($startDate = $created, $endDate = 'now');
        $user_id = $faker->numberBetween(1,50);


        $bookmarks = $bookmarksTable ->newEntity([
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'created' => $created,
            'modified' => $modified,
            'user_id'=>$user_id

        ]);

        $bookmarksTable ->save($bookmarks);
    }

   }
}

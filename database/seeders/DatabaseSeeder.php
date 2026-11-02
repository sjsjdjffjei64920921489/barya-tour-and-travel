<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tours = [
            [
                'title' => 'Murchison Falls & Nile Safari',
                'slug' => 'murchison-falls-nile-safari',
                'destination' => 'Murchison Falls National Park, Uganda',
                'category' => 'Safari',
                'duration' => '4 days',
                'price' => 980,
                'currency' => 'USD',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/e/ef/Top_of_Murchison_falls.jpg/960px-Top_of_Murchison_falls.jpg',
                'image_credit' => 'Jingo Faizal · CC BY-SA 4.0',
                'image_credit_url' => 'https://commons.wikimedia.org/wiki/File:Top_of_Murchison_falls.jpg',
                'summary' => 'See the Nile squeeze through the falls, then explore Uganda’s largest national park.',
                'description' => 'Discover Murchison Falls National Park on game drives and a Nile boat excursion. Wildlife sightings vary by season and are never guaranteed.',
                'itinerary' => "Day 1: Travel to the park and settle in\nDay 2: Game drive and Nile boat excursion\nDay 3: Explore the falls and surrounding park\nDay 4: Return to Kampala or Entebbe",
                'is_published' => true,
            ],
            [
                'title' => 'Bwindi Gorilla Forest Journey',
                'slug' => 'bwindi-gorilla-forest-journey',
                'destination' => 'Bwindi Impenetrable National Park, Uganda',
                'category' => 'Gorilla trekking',
                'duration' => '3 days',
                'price' => 1850,
                'currency' => 'USD',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/e/ec/Gorila_de_monta%C3%B1a_%28Gorilla_beringei_beringei%29%2C_parque_nacional_de_la_Selva_Impenetrable_de_Bwindi%2C_Uganda%2C_2024-02-02%2C_DD_80.jpg/960px-Gorila_de_monta%C3%B1a_%28Gorilla_beringei_beringei%29%2C_parque_nacional_de_la_Selva_Impenetrable_de_Bwindi%2C_Uganda%2C_2024-02-02%2C_DD_80.jpg',
                'image_credit' => 'Diego Delso · CC BY-SA 4.0',
                'image_credit_url' => 'https://commons.wikimedia.org/wiki/File:Gorila_de_monta%C3%B1a_(Gorilla_beringei_beringei),_parque_nacional_de_la_Selva_Impenetrable_de_Bwindi,_Uganda,_2024-02-02,_DD_80.jpg',
                'summary' => 'Step into an ancient rainforest for a once-in-a-lifetime gorilla trekking experience.',
                'description' => 'Travel to Bwindi with an experienced local team and prepare for a guided forest trek. Gorilla permits are limited, must be arranged in advance, and are subject to Uganda Wildlife Authority availability and current requirements.',
                'itinerary' => "Day 1: Travel to Bwindi and prepare for the trek\nDay 2: Permit briefing and guided gorilla trek\nDay 3: Relaxed morning and return journey",
                'is_published' => true,
            ],
            [
                'title' => 'Queen Elizabeth Wildlife Safari',
                'slug' => 'queen-elizabeth-wildlife-safari',
                'destination' => 'Queen Elizabeth National Park, Uganda',
                'category' => 'Wildlife',
                'duration' => '4 days',
                'price' => 1100,
                'currency' => 'USD',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/5/55/035_Uganda_kobs_mating_at_Queen_Elizabeth_National_Park_Photo_by_Giles_Laurent.jpg/960px-035_Uganda_kobs_mating_at_Queen_Elizabeth_National_Park_Photo_by_Giles_Laurent.jpg',
                'image_credit' => 'Giles Laurent · CC BY-SA 4.0',
                'image_credit_url' => 'https://commons.wikimedia.org/wiki/File:035_Uganda_kobs_mating_at_Queen_Elizabeth_National_Park_Photo_by_Giles_Laurent.jpg',
                'summary' => 'Explore savannah, crater lakes, and the wildlife-rich Kazinga Channel.',
                'description' => 'Experience Queen Elizabeth National Park with guided game drives and a boat trip along the Kazinga Channel. Sightings depend on season and conditions.',
                'itinerary' => "Day 1: Arrive in the park\nDay 2: Game drive and Kazinga Channel boat trip\nDay 3: Explore the crater lakes region\nDay 4: Return journey",
                'is_published' => true,
            ],
            [
                'title' => 'Kibale Chimpanzee Forest Trek',
                'slug' => 'kibale-chimpanzee-forest-trek',
                'destination' => 'Kibale Forest National Park, Uganda',
                'category' => 'Nature',
                'duration' => '3 days',
                'price' => 760,
                'currency' => 'USD',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/8/86/013_Alpha_male_chimpanzee_at_Kibale_forest_National_Park_Photo_by_Giles_Laurent.jpg/960px-013_Alpha_male_chimpanzee_at_Kibale_forest_National_Park_Photo_by_Giles_Laurent.jpg',
                'image_credit' => 'Giles Laurent · CC BY-SA 4.0',
                'image_credit_url' => 'https://commons.wikimedia.org/wiki/File:013_Alpha_male_chimpanzee_at_Kibale_forest_National_Park_Photo_by_Giles_Laurent.jpg',
                'summary' => 'Walk beneath the forest canopy in one of East Africa’s best-known primate habitats.',
                'description' => 'Join a guided forest walk in Kibale, home to chimpanzees and other primates. Chimpanzee sightings are not guaranteed, and permits are subject to availability and current park requirements.',
                'itinerary' => "Day 1: Arrive near Kibale Forest\nDay 2: Guided chimpanzee tracking experience\nDay 3: Community visit or nature walk and return",
                'is_published' => true,
            ],
            [
                'title' => 'Jinja & the River Nile',
                'slug' => 'jinja-river-nile-adventure',
                'destination' => 'Jinja, Uganda',
                'category' => 'Adventure',
                'duration' => '3 days',
                'price' => 520,
                'currency' => 'USD',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/2/22/River_Nile%2C_Jinja%2C_Uganda_3.jpg/960px-River_Nile%2C_Jinja%2C_Uganda_3.jpg',
                'image_credit' => 'Owobusingye · CC BY 4.0',
                'image_credit_url' => 'https://commons.wikimedia.org/wiki/File:River_Nile,_Jinja,_Uganda_3.jpg',
                'summary' => 'Mix riverside relaxation with optional adventures around Jinja.',
                'description' => 'Discover Jinja’s Nile-side scenery and choose from locally operated activities. Any water-based activity should be booked with a qualified operator and depends on conditions.',
                'itinerary' => "Day 1: Arrive in Jinja and explore town\nDay 2: Riverside time or optional guided activity\nDay 3: Slow morning and return to Kampala",
                'is_published' => true,
            ],
            [
                'title' => 'Rwenzori Mountain Foothills',
                'slug' => 'rwenzori-mountain-foothills',
                'destination' => 'Rwenzori Mountains, Uganda',
                'category' => 'Adventure',
                'duration' => '4 days',
                'price' => 890,
                'currency' => 'USD',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/2/2c/Rwenzori_night_Kitasamba.jpg/960px-Rwenzori_night_Kitasamba.jpg',
                'image_credit' => 'Rafał Kozubek · CC BY-SA 4.0',
                'image_credit_url' => 'https://commons.wikimedia.org/wiki/File:Rwenzori_night_Kitasamba.jpg',
                'summary' => 'Discover mountain landscapes and guided trails on the legendary Rwenzori range.',
                'description' => 'Explore the foothills and lower trails with local guides. This sample itinerary is not a summit climb; route choice, fitness, weather, and park requirements should be confirmed before travel.',
                'itinerary' => "Day 1: Arrive in the Rwenzori foothills\nDay 2: Guided lower-foothill nature walk\nDay 3: Local culture and scenic trail\nDay 4: Return journey",
                'is_published' => true,
            ],
        ];

        $legacySlugs = [
            'serengeti-great-migration',
            'kilimanjaro-machame-route',
            'zanzibar-island-escape',
            'ngorongoro-crater-discovery',
            'tarangire-elephant-country',
            'lake-manyara-nature-trail',
        ];

        foreach ($tours as $index => $tour) {
            $existing = Tour::where('slug', $tour['slug'])->first()
                ?? Tour::where('slug', $legacySlugs[$index])->first();

            if ($existing) {
                $existing->update($tour);
            } else {
                Tour::create($tour);
            }
        }
    }
}

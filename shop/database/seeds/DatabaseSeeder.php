<?php

use Illuminate\Database\Seeder;
use App\Models\{User, Address, Category, Product, Shop, State, Page, Order};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('products')->insert([
            'id' => 10,
            'name' => 'Halo reach',
            'price' => 50,
            'active' => true,
            'quantity' => 30,
            'code' => 'ABCDE-TYUE3-17V8Y-TPF4Y-GPT9Y',
            'quantity_alert' => 10,
            'image' => 'halo_reach.jpg',
            'description' => 'Halo: Reach est un jeu vidéo de tir à la première personne développé par Bungie et édité par Microsoft. Officiellement dévoilé lors de la conférence Microsoft de l E3 2009, le jeu est sorti en septembre 2010 au niveau mondial exclusivement sur Xbox 360.',
            'category_id' => 10,
        ]);

        DB::table('categories')->insert([
            'id' => 10,
            'name' => 'Bungie',
            'slug' => 'Bungie',
        ]);


        DB::table('products')->insert([
            'id' => 11,
            'name' => 'Counter Strike : Global Offensive',
            'price' => 20,
            'active' => true,
            'quantity' => 150,
            'code' => 'YUTH2-TYUE3-87RTY-TPF4Y-WUYZA',
            'quantity_alert' => 50,
            'image' => 'cs_go.png',
            'description' => 'Jeu de tir à la première personne.',
            'category_id' => 11,
        ]);

        DB::table('categories')->insert([
            'id' => 11,
            'name' => 'Valve',
            'slug' => 'Valve',
        ]);

        
        DB::table('products')->insert([
            'id' => 12,
            'name' => 'Euro Truck Simulator 2',
            'price' => 60,
            'active' => true,
            'quantity' => 500,
            'code' => 'YUTH2-TYUE3-87RTY-TPF4Y-WUYZA',
            'quantity_alert' => 30,
            'image' => 'fs19.jpg',
            'description' => 'Euro Truck Simulator 2 est un jeu de simulation de poids lourd et la suite d Euro Truck Simulator développé par SCS Software pour Windows, Linux et Mac OS; sorti le 19 octobre 2012. Il place le joueur dans la peau d un routier devant effectuer des livraisons de diverses marchandises dans plusieurs villes d Europe.',
            'category_id' => 12,
        ]);

        DB::table('categories')->insert([
            'id' => 12,
            'name' => 'SCS Software',
            'slug' => 'SCS Software',
        ]);
*/





        


        State::insert([
            ['name' => 'Attente chèque', 'slug' => 'cheque', 'color' => 'blue', 'indice' => 1],
            ['name' => 'Attente mandat administratif', 'slug' => 'mandat', 'color' => 'blue', 'indice' => 1],
            ['name' => 'Attente virement', 'slug' => 'virement', 'color' => 'blue', 'indice' => 1],
            ['name' => 'Attente paiement par carte', 'slug' => 'carte', 'color' => 'blue', 'indice' => 1],
            ['name' => 'Erreur de paiement', 'slug' => 'erreur', 'color' => 'red', 'indice' => 0],
            ['name' => 'Annulé', 'slug' => 'annule', 'color' => 'red', 'indice' => 2],
            ['name' => 'Mandat administratif reçu', 'slug' => 'mandat_ok', 'color' => 'green', 'indice' => 3],
            ['name' => 'Paiement accepté', 'slug' => 'paiement_ok', 'color' => 'green', 'indice' => 4],
            ['name' => 'Expédié', 'slug' => 'expedie', 'color' => 'green', 'indice' => 5],
            ['name' => 'Remboursé', 'slug' => 'rembourse', 'color' => 'red', 'indice' => 6],
        ]);
        Shop::insert([
            [
                'name' => 'MegaGaming',
                'address' => '14 rue de la poupée qui tousse 31000 Toulouse',
                'email' => 'contact@megagaming.fr',
                'phone' => '06 10 20 30 40',
                'holder' => 'STE HAURT',
                'bic' => 'CMCIFRPP',
                'iban' => 'FR7612548029989876543210917',
                'bank' => 'CIC',
                'bank_address' => '1 Grande Rue Saint-Michel 31400 Toulouse',
                'facebook' => 'https://www.facebook.com/MegaGaming',
                'home' => 'Informations'
            ],
        ]);
        factory(User::class, 20)
            ->create()
            ->each(function ($user) {
                $user->addresses()->createMany(
                    factory(Address::class, mt_rand(2, 3))->make()->toArray()
                );
            });
        $user = User::find(1);
        $user->firstname = 'Admin';
        $user->name = 'Admin';
        $user->email = 'admintest@fgainza.fr';
        $user->admin = true;
        $user->save();

        $users = User::all();
        foreach ($users as $e) {
            $addresses = $e->addresses;
            $e->principale = $addresses->first()->id;
            $e->save();
            foreach ($addresses as $address) {
                DB::table('address_user')->insert(array(
                    'user_id' => $e->id,
                    'address_id' => $address->id
                ));
            }
        }

        // factory(Product::class, 6)->create();
        factory(Category::class, 5)->create()->each(function ($category) {
            $i = rand(2, 7);
            while (--$i) {
                $category->products()->save(factory(Product::class)->make());
            }
        });

        $items = [
            ['mentions-legales', 'Mentions légales'],
            ['conditions-generales-de-vente', 'Conditons générales de vente'],
            ['politique-de-confidentialite', 'Politique de confidentialité'],
            ['respect-environnement', 'Respect de l\'environnement'],
            ['mandat-administratif', 'Mandat administratif'],
        ];
        foreach ($items as $item) {
            factory(Page::class)->create([
                'slug' => $item[0],
                'title' => $item[1],
            ]);
        }
        factory(Order::class, 30)
            ->create()
            ->each(function ($order) {
                $address = $order->user->addresses()->take(1)->get()->makeHidden(['id', 'user_id'])->toArray();
                $order->adresses()->create($address[0]);
                if (mt_rand(0, 1)) {
                    $address = $order->user->addresses()->skip(1)->take(1)->get()->makeHidden(['id', 'user_id'])->toArray();
                    $address[0]['facturation'] = false;
                    $order->adresses()->create($address[0]);
                }
                $total = 0;
                $product = Product::find(mt_rand(1, 3));
                $quantity = mt_rand(1, 3);
                $price = $product->price * $quantity;
                $code = $product->code;
                $total = $price;
                $order->products()->create(
                    [
                        'name' => $product->name,
                        'total_price_gross' => $price,
                        'quantity' => $quantity,
                        'code' => $code,
                    ]
                );
                if (mt_rand(0, 1)) {
                    $product = Product::find(mt_rand(4, 6));
                    $quantity = mt_rand(1, 3);
                    $price = $product->price * $quantity;
                    $code = $product->code;
                    $total += $price;
                    $order->products()->create(
                        [
                            'name' => $product->name,
                            'total_price_gross' => $price,
                            'quantity' => $quantity,
                            'code' => $code,
                        ]
                    );
                }
                if ($order->payment === 'carte' && $order->state_id === 8) {
                    $order->payment_infos()->create(['payment_id' => (string) Str::uuid()]);
                }
                $order->total = $total;
                $order->save();
            });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Terrain;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Terrain MAB-001
        |--------------------------------------------------------------------------
        */

        $terrain = Terrain::updateOrCreate(
            ['reference' => 'MAB-001'],
            [
                'titre' => 'Abreby – La Baie des Princes',
                'slug' => 'terrain-abreby',
                'ville' => 'Jacqueville',
                'quartier' => 'Abreby',
                'surface' => 400,
                'prix' => 8000000,

                'description' => "Situé à Abreby, dans la zone de La Baie des Princes, également connue sous le nom de Nouvelle Baie des Milliardaires, ce terrain de 400 m² représente une opportunité pour concrétiser votre projet immobilier ou réaliser un investissement foncier à Jacqueville. Bénéficiant d'un document foncier ACD Global, cette parcelle est proposée à 8 000 000 FCFA, avec une possibilité de paiement échelonné pour faciliter votre acquisition.",

                // Image principale conservée pour ton ancien système
                'image' => 'terrains/JACQUE-VILLE1.jpeg',

                'video' => 'terrains/JACQUE-VILLE.mp4',

                'caracteristiques' => [
                    'Zone résidentielle',
                    'Accès facile',
                    'Documents disponibles',
                ],
            ]
        );

        // Galerie du terrain
        $terrain->images()->delete();

        $terrain->images()->createMany([
            [
                'image' => 'terrains/JACQUE-VILLE1.jpeg',
                'ordre' => 0,
            ],
            [
                'image' => 'terrains/JACQUE-VILLE2.jpeg',
                'ordre' => 1,
            ],
            [
                'image' => 'terrains/JACQUE-VILLE3.jpeg',
                'ordre' => 2,
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Terrain MAB-002
        |--------------------------------------------------------------------------
        */

        $terrain = Terrain::updateOrCreate(
            ['reference' => 'MAB-002'],
            [
                'titre' => 'Emplacement stratégique - Grand-Bassam',
                'slug' => 'terrain-grand-bassam',
                'ville' => 'Grand-Bassam',
                'quartier' => "Face au Lycée d'Excellence Dominique Ouattara",
                'surface' => 400,
                'prix' => 20000000,

                'description' => "Offrez-vous une opportunité foncière à Grand-Bassam, idéalement située face au Lycée d'Excellence Dominique Ouattara. Avec une superficie de 400 m² et un document ACD Global, cette parcelle convient à différents projets immobiliers, qu'il s'agisse d'une construction résidentielle ou d'un investissement à long terme. Proposée au prix de 20 000 000 FCFA, elle bénéficie également d'une formule de paiement échelonné. Pour les acquéreurs souhaitant régler comptant, un tarif préférentiel de 18 000 000 FCFA est disponible.",

                'image' => 'terrains/BASSAM1.jpg',

                'video' => 'terrains/BASSAM.mp4',

                'caracteristiques' => [
                    'Emplacement stratégique',
                    'Quartier résidentiel',
                    'Accès routier',
                ],
            ]
        );

        // Galerie du terrain
        $terrain->images()->delete();

        $terrain->images()->createMany([
            [
                'image' => 'terrains/BASSAM1.jpg',
                'ordre' => 0,
            ],
            [
                'image' => 'terrains/BASSAM2.jpeg',
                'ordre' => 1,
            ],
            [
                'image' => 'terrains/BASSAM3.jpeg',
                'ordre' => 2,
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Terrain MAB-003
        |--------------------------------------------------------------------------
        */

        $terrain = Terrain::updateOrCreate(
            ['reference' => 'MAB-003'],
            [
                'titre' => 'Terrain – Dabou',
                'slug' => 'terrain-dabou',
                'ville' => 'Dabou',
                'quartier' => 'Dabou',
                'surface' => 400,
                'prix' => 5000000,

                'description' => "Investissez à Dabou. Découvrez une opportunité immobilière à Dabou. Cette offre vous donne accès à une parcelle de 400 m², idéale pour concrétiser votre projet de construction ou réaliser un investissement foncier. Avec un prix de vente de 5 000 000 FCFA et un document ACD Global, cette parcelle bénéficie de conditions de paiement flexibles, adaptées à votre budget. Vous avez également la possibilité d'opter pour un paiement comptant au tarif préférentiel de 4 800 000 FCFA. Les conditions restent ouvertes à toute négociation.

Caractéristiques du terrain :
Localisation : Dabou
Superficie : 400 m²
Document : ACD Global
Prix initial : 5 000 000 FCFA
Prix cash : 4 800 000 FCFA",

                'image' => 'terrains/DABOU1.jpeg',

                'video' => 'terrains/DABOU.mp4',

                'caracteristiques' => [
                    "Zone en bordure d'eau",
                    'Accès facile',
                    'Documents disponibles',
                    'Proche des commodités',
                ],
            ]
        );

        // Galerie du terrain
        $terrain->images()->delete();

        $terrain->images()->createMany([
            [
                'image' => 'terrains/DABOU1.jpeg',
                'ordre' => 0,
            ],
            [
                'image' => 'terrains/DABOU2.jpeg',
                'ordre' => 1,
            ],
            [
                'image' => 'terrains/DABOU3.jpeg',
                'ordre' => 2,
            ],
        ]);
    }
}
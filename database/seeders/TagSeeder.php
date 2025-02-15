<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Animales' => "¿Has elegido este tag? Has hecho bien, los animales son adorables!",
            'Colegio' => "Se tratan aspectos relacionados con la formación académica, actividades y normas para el desarrollo del alumnado",
            'Ropa' => "Prendas de vestir para todas las ocasiones, estilos y temporadas.",
            'Transporte' => "Medios de movilidad que facilitan el desplazamiento de personas y mercancía",
            'Instrumentos' => "Herramientas y dispositivos diseñados para diversas actividades musicales",
            'Muebles' => "Para el hogar, la oficina y otros espacios, diseñados para brindar comodidad, funcionalidad y estilo"
        ];
        
        foreach ($tags as $name => $description) {
            Tag::create(compact('name', 'description'));
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $genres = [
         [
            'name' => 'Novela',
            'image' => 'storage/géneros/TcNEuGmhyTLpd98vyChF00Y7tXBPp8yVomZ2fHxt.webp',
            'description' => 'La novela es el género literario narrativo por excelencia. A través de la prosa, construye mundos, personajes y tramas de ficción que invitan al lector a explorar la condición humana en toda su complejidad. Abarca desde la aventura y el romance hasta el drama psicológico y la crítica social, adaptándose a cualquier época y contexto.'
         ],
         [
            'name' => 'Novela Contemporánea',
            'image' => 'storage/géneros/SQg51EiAXCyICfbjJ0hRCsyBNVK2wkhoPtOWuBXj.jpg',
            'description' => 'La novela contemporánea es un género que refleja la realidad y las inquietudes del mundo actual. Sus tramas transcurren en épocas recientes y abordan temáticas propias de la sociedad moderna: la identidad, las relaciones humanas, la soledad, los conflictos familiares o el impacto de la tecnología. Se caracteriza por una gran diversidad de estilos narrativos, desde el realismo más cotidiano hasta estructuras experimentales que rompen con la narrativa tradicional.'
         ],
         [
            'name' => 'Novela Histórica',
            'image' => 'storage/géneros/L4pT1OKU9rw9pR71bynxSqywNF6a6EWhpzN59TUu.webp',
            'description' => 'La novela histórica ambienta sus tramas en épocas pasadas, recreando con rigor y detalle los escenarios, costumbres y personajes de un período concreto de la historia. Combina hechos y figuras reales con personajes y situaciones de ficción, ofreciendo al lector una forma de acercarse al pasado de manera entretenida. Sus temas recurrentes son las guerras, las civilizaciones antiguas, las intrigas políticas y los grandes cambios sociales que han marcado el curso de la humanidad.'
         ],
         [
            'name' => 'Fantasía',
            'image' => 'storage/géneros/hXycO9aJk4ViA0cQYaTBUtfjKmMGNxhJQEyOyjba.webp',
            'description' => 'La fantasía es un género que construye mundos imaginarios regidos por sus propias leyes, donde la magia, las criaturas míticas y lo sobrenatural forman parte de la realidad. Sus tramas suelen girar en torno a grandes conflictos entre el bien y el mal, héroes que emprenden épicas travesías y civilizaciones con historias y mitologías propias. Es un género que invita al lector a evadirse por completo de la realidad y sumergirse en universos donde todo es posible.'
         ],
         [
            'name' => 'Misterio',
            'image' => 'storage/géneros/uQzQ2aes12JhhburQ5KCgtIEYqkrYcVNHxrY7X4i.webp',
            'description' => 'El misterio es un género que mantiene al lector en tensión desde la primera página hasta la última. Sus tramas giran en torno a crímenes, secretos y enigmas que el protagonista debe resolver desafiando sus límites. La atmósfera densa, los personajes ambiguos y los giros inesperados son sus señas de identidad, convirtiendo cada capítulo en una pieza más de un puzzle que solo se revela al final.'
         ],
         [
            'name' => 'Ciencia Ficción',
            'image' => 'storage/géneros/qZ5NflG9eEhsausFyUDhdEVFCAHXiVgjOkbXs4Ou.webp',
            'description' => 'La ciencia ficción explora los límites de la imaginación proyectando la humanidad hacia futuros posibles o alternativos. A través de la tecnología, la exploración espacial, la inteligencia artificial o los viajes en el tiempo, plantea preguntas profundas sobre el destino de la humanidad y las consecuencias del progreso científico. Es un género que no solo entretiene sino que anticipa y reflexiona sobre los grandes dilemas del porvenir.'
         ],
         [
            'name' => 'Filosofía',
            'image' => 'storage/géneros/ouDziGLyov3Ihq0CRBlSiA6IvtimlxExNxdxVK5e.webp',
            'description' => 'La filosofía es el arte de hacerse las preguntas más difíciles: qué somos, cómo debemos vivir, qué podemos conocer y cuál es el sentido de la existencia. Los libros de filosofía recorren siglos de pensamiento humano, desde los grandes maestros de la Antigüedad hasta los filósofos contemporáneos, ofreciendo herramientas para reflexionar con rigor y profundidad sobre la realidad y el lugar del ser humano en ella.'
         ],
         [
            'name' => 'Física',
            'image' => 'storage/géneros/3MyxIq7mwT1CGdfUjTnQWbHs15Bwu2e7N9MqMISB.webp',
            'description' => 'La física es la ciencia que estudia los principios fundamentales que rigen el universo, desde las partículas subatómicas hasta las estructuras más colosales del cosmos. Los libros de física abarcan desde introducciones divulgativas accesibles para cualquier lector curioso hasta tratados técnicos que profundizan en mecánica cuántica, relatividad, termodinámica y más. Una disciplina que nos ayuda a comprender cómo funciona todo cuanto nos rodea.'
         ],
         [
            'name' => 'Romance',
            'image' => 'storage/géneros/Jh8aG70XKTwRKGXqSHXP0GsjrxIylcz4zaauNipx.webp',
            'description' => 'El romance es un género centrado en las relaciones amorosas y los vínculos emocionales entre sus personajes. Sus tramas exploran el encuentro, la atracción, los obstáculos y el desarrollo de una historia de amor que mantiene al lector emocionalmente comprometido de principio a fin. Abarca desde romances apasionados y dramáticos hasta historias más ligeras y luminosas, pero siempre con el amor como hilo conductor. Un género que apela directamente a las emociones y que encuentra lectores en todas las épocas y culturas.'
         ]
      ];
      DB::table('genres')->insert($genres);
    }
}

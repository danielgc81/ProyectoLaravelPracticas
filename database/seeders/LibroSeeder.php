<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title'     => 'Cien años de soledad',
                'author'    => 'Gabriel García Márquez',
                'editorial' => 'Random House',
                'year'      => 1967,
                'synopsis'  => 'En el corazón de América Latina, el coronel José Arcadio Buendía funda Macondo, un pueblo aislado del mundo que crece y se transforma a lo largo de siete generaciones de su familia. A través de amores imposibles, guerras civiles interminables, plagas del olvido y lluvias de mariposas amarillas, García Márquez teje una épica donde lo sobrenatural convive con lo cotidiano. Personajes condenados a repetir sus errores, mujeres de belleza devastadora y hombres obsesionados por descifrar los manuscritos del gitano Melquíades conforman este universo donde el tiempo es circular y el destino, inevitable. Una obra cumbre de la literatura universal que redefine los límites entre la realidad y la fantasía.',
                'genre'     => 'Realismo mágico',
                'ISBN'      => '9788439745358',
                'image'     => 'https://imagessl8.casadellibro.com/a/l/s7/58/9788439745358.webp',
            ],
            [
                'title'     => 'El nombre de la rosa',
                'author'    => 'Umberto Eco',
                'editorial' => 'Lumen',
                'year'      => 1980,
                'synopsis'  => 'En el otoño de 1327, el fraile franciscano Guillermo de Baskerville llega junto a su joven novicio Adso de Melk a una poderosa abadía benedictina del norte de Italia para asistir a una delicada reunión teológica. Antes de que comience, un monje aparece muerto en circunstancias inexplicables, y pronto los cadáveres se van acumulando siguiendo una lógica que parece extraída del Apocalipsis. Guillermo, de mente brillante y método casi detectivesco, se adentra en el laberíntico scriptorium y en la biblioteca prohibida de la abadía buscando una verdad que muchos quieren ocultar a cualquier precio. Eco construye un apasionante thriller medieval donde la fe, el conocimiento, el poder de los libros y la intolerancia chocan en una conclusión inolvidable.',
                'genre'     => 'Novela histórico',
                'ISBN'      => '9788426403568',
                'image'     => 'https://imagessl8.casadellibro.com/a/l/s7/68/9788426403568.webp',
            ],
            [
                'title'     => '1984',
                'author'    => 'George Orwell',
                'editorial' => 'Minotauro',
                'year'      => 1949,
                'synopsis'  => 'En 1984, los ciudadanos de Londres ya no distinguen entre el aspecto privado y público de sus vidas. Empleando sus técnicas de vigilancia sobre la población, el Gran Hermano les ha arrebatado la intimidad. Winston Smith es un funcionario cuyo trabajo consiste en escribir y reescribir la historia para el Ministerio de la Verdad, una de las instituciones del estado totalitario que subyuga al ciudadano. Un día, Smith siente que ya no quiere formar parte de los engranajes del sistema opresivo',
                'genre'     => 'Distopía',
                'ISBN'      => ' 9788445010273',
                'image'     => 'https://imagessl3.casadellibro.com/a/l/s7/73/9788445010273.webp',
            ],
            [
                'title'     => 'Don Quijote de la Mancha',
                'author'    => 'Miguel de Cervantes',
                'editorial' => 'ALEAGUARA',
                'year'      => 1605,
                'synopsis'  => 'Alonso Quijano, un hidalgo manchego de mediana edad, enloquece tras leer incansablemente libros de caballerías y decide transformarse en el caballero andante Don Quijote de la Mancha. Acompañado de su fiel escudero Sancho Panza, un campesino ingenioso y pragmático, emprende tres salidas por los caminos de España en busca de aventuras y justicia. Confunde molinos de viento con gigantes, ventas con castillos y rebaños de ovejas con ejércitos enemigos. Entre la locura y la lucidez, Cervantes construye una profunda reflexión sobre la naturaleza humana, el idealismo, la amistad y la diferencia entre ilusión y realidad. Considerada la primera novela moderna de la literatura occidental.',
                'genre'     => 'Novela',
                'ISBN'      => '9788420479873',
                'image'     => 'https://imagessl3.casadellibro.com/a/l/s7/73/9788420479873.webp',
            ],
            [
                'title'     => 'Harry Potter y la piedra filosofal',
                'author'    => 'J.K. Rowling',
                'editorial' => 'Salamandra',
                'year'      => 1997,
                'synopsis'  => 'Harry Potter es un niño huérfano que vive miserable y olvidado en casa de sus tíos, los Dursley, una familia mezquina y sin imaginación que lo trata como a un criado y lo obliga a dormir en el diminuto armario que hay bajo las escaleras. Todo cambia el día en que Harry cumple once años y recibe una carta con un mensaje que transformará su vida para siempre: ha sido admitido en el Colegio Hogwarts de Magia y Hechicería. Allí descubre que es un mago famoso en el mundo mágico, que sus padres no murieron en un accidente de tráfico sino a manos del temible Lord Voldemort, y que él mismo sobrevivió milagrosamente a la maldición asesina. Entre clases de pociones, vuelos en escoba, partidos de quidditch y la amistad inquebrantable de Ron Weasley y Hermione Granger, Harry deberá enfrentarse a un misterio oculto en las entrañas de Hogwarts que amenaza con devolver al poder a las fuerzas más oscuras del mundo mágico.',
                'genre'     => 'Fantasía',
                'ISBN'      => '9788478884452',
                'image'     => 'https://imagessl2.casadellibro.com/a/l/s7/52/9788478884452.webp',
            ],
            [
                'title'     => 'La Península de las Casas Vacías',
                'author'    => 'David Uclés',
                'editorial' => 'Siruela',
                'year'      => 2024,
                'synopsis'  => 'He aquí la historia de la descomposición total de una familia, de la deshumanización de un pueblo, de la desintegración de un territorio y de una península de casas vacías.  La historia de un soldado que se raja la piel para dejar salir la ceniza acumulada, de un poeta que cose la sombra de una niña tras un bombardeo, y de un maestro que enseña a sus alumnos a hacerse los muertos; de un general que duerme junto a la mano cortada de una santa, de un niño ciego que recupera la vista durante un apagón, y de una campesina que pinta de negro todos los árboles de su huerto; de un fotógrafo extranjero que pisa una mina cerca de Brunete y no levanta el pie en cuarenta años, de un gernikarra que conduce hasta el centro de París una camioneta con los restos humeantes de un ataque aéreo, y de un perro herido cuya sangre teñirá la última franja de una bandera abandonada en Badajoz.  He aquí pues la historia total de la Guerra Civil española y de una Iberia agonizante donde lo fantástico apuntala la crudeza de lo real; donde los anónimos miembros de un extenso clan de olivareros de Jándula cruzan sus destinos con los de Alberti, Lorca y Unamuno; Rodoreda, Zambrano y Kent; Hemingway, Orwell y Bernanos; Picasso y Mallo; Azaña y Foxá; donde lo épico y lo costumbrista se entrelazan para tejer un portentoso tapiz, poético y grotesco, bello y delirante.',
                'genre'     => 'Novela Histórica',
                'ISBN'      => '9788419942319',
                'image'     => 'https://imagessl9.casadellibro.com/a/l/s7/19/9788419942319.webp',
            ],
            [
                'title'     => 'Los Juegos del Hambre',
                'author'    => 'Suzzane Collins',
                'editorial' => 'Molino',
                'year'      => 2008,
                'synopsis'  => 'Los Juegos del Hambre transcurren en Panem, una nación distópica dividida en doce distritos pobres controlados por un Capitolio opulento y cruel. Como castigo por una antigua rebelión, cada año dos jóvenes de cada distrito son seleccionados para luchar a muerte en una arena televisada. La protagonista es Katniss Everdeen, una chica del Distrito 12 que se ofrece voluntaria para sustituir a su hermana pequeña cuando esta es seleccionada. Junto a ella va Peeta Mellark, el hijo del panadero, quien declara públicamente estar enamorado de Katniss generando una estrategia mediática que los convierte en favoritos del público. Dentro de la arena, Katniss debe usar todas sus habilidades de cazadora para sobrevivir mientras navega entre alianzas peligrosas y sentimientos confusos hacia Peeta. Cuando al final solo quedan ellos dos, el Capitolio revoca la regla que permitía dos ganadores, obligándoles a enfrentarse. En un acto de rebeldía, Katniss propone que ambos coman bayas venenosas a la vez, forzando al Capitolio a aceptar dos ganadores para evitar quedarse sin ninguno. Este gesto aparentemente pequeño se convierte en la chispa que enciende la esperanza de la revolución en todos los distritos. La historia es una crítica feroz a los regímenes totalitarios, los medios de comunicación como herramienta de control y la desigualdad social extrema. Una saga que engancha desde la primera página y que va mucho más allá de una simple historia de supervivencia.',
                'genre'     => 'Ciencia Ficción',
                'ISBN'      => '9788427202122',
                'image'     => 'https://imagessl2.casadellibro.com/a/l/s7/22/9788427202122.webp',
            ],
            [
                'title'     => 'Así hablo Zaratustra',
                'author'    => 'Friedrich Nietzsche',
                'editorial' => 'Editorial Verbum',
                'year'      => 1896,
                'synopsis'  => 'Cuando Zaratustra cumple treinta años, decide abandonar su hogar y retirarse a la montaña, donde pasa una década en completa soledad reflexionando sobre la naturaleza humana y el sentido de la existencia. Al cabo de ese tiempo, su sabiduría se ha vuelto tan grande que siente la necesidad de compartirla con el mundo y desciende al valle para hablar a los hombres. Es entonces cuando proclama una de sus ideas más célebres y provocadoras: Dios ha muerto, y con él han muerto también los valores absolutos que durante siglos habían guiado a la humanidad. Ante ese vacío, Zaratustra propone el concepto del Superhombre, un ser humano que supera sus limitaciones, crea sus propios valores y abraza la vida sin miedo ni resentimiento. Sin embargo, los hombres comunes no están preparados para escuchar su mensaje y lo reciben con indiferencia o incomprensión, lo que le genera una profunda soledad y frustración. A lo largo del libro, Zaratustra habla sobre el eterno retorno, la idea de que todo lo que ha ocurrido se repetirá infinitamente, y que aceptar eso con alegría es la máxima afirmación de la vida. También critica duramente la moral tradicional, la religión y el conformismo, a los que considera enemigos del verdadero crecimiento humano.',
                'genre'     => 'Filosofía Comtemporanea',
                'ISBN'      => '9788413370200',
                'image'     => 'https://imagessl0.casadellibro.com/a/l/s7/00/9788413370200.webp',
            ],
            [
                'title'     => 'Agujeros Negros',
                'author'    => 'Stephen Hawking',
                'editorial' => 'Crítica',
                'year'      => 1988,
                'synopsis'  => 'Los agujeros negros son regiones del espacio donde la gravedad es tan extrema que ni la luz puede escapar de ellas. Hawking explica que se forman principalmente cuando una estrella masiva agota su combustible y colapsa sobre sí misma bajo su propia gravedad. El libro describe el horizonte de sucesos, que es el límite invisible a partir del cual nada puede regresar, y la singularidad, el punto central donde las leyes de la física dejan de funcionar. Uno de los conceptos más fascinantes que presenta es la radiación de Hawking, su propio descubrimiento, que demuestra que los agujeros negros no son completamente negros sino que emiten una pequeña cantidad de energía. Esto fue revolucionario porque nadie antes había conseguido unir la mecánica cuántica con la relatividad general de forma tan elegante. El libro también aborda la paradoja de la información, que plantea si los datos sobre la materia que cae en un agujero negro se pierden para siempre o se conservan de algún modo. Hawking defiende que la información no se destruye, aunque explicar cómo se conserva sigue siendo uno de los grandes misterios de la física. A lo largo del libro, Hawking consigue explicar conceptos tremendamente complejos de forma accesible para cualquier lector sin conocimientos científicos previos. Es una obra que cambia completamente la forma en que uno percibe el espacio, el tiempo y los límites del conocimiento humano. Sin duda, uno de los libros de divulgación científica más importantes y apasionantes jamás escritos.',
                'genre'     => 'Astronomía',
                'ISBN'      => '9788491998754',
                'image'     => 'https://imagessl4.casadellibro.com/a/l/s7/54/9788491998754.webp',
            ],
            [
                'title'     => 'La Sombra del Viento',
                'author'    => 'Carlos Ruiz Zafón',
                'editorial' => 'Planeta',
                'year'      => 2001,
                'synopsis'  => 'En la Barcelona de la posguerra, el joven Daniel Sempere es conducido por su padre al misterioso Cementerio de los Libros Olvidados, donde elige un ejemplar de una novela titulada La Sombra del Viento, escrita por Julián Carax. Fascinado por la obra, Daniel intenta descubrir quién fue su autor, pero tropieza con una sombra oscura que lleva décadas destruyendo todos los libros de Carax. Entre callejones con niebla, amores prohibidos, secretos de familia y la amenaza de un personaje sin rostro llamado Laín Coubert, Daniel se adentra en un laberinto de misterio donde pasado y presente se funden en una historia apasionante sobre la memoria, la traición y el poder redentor de la literatura.',
                'genre'     => 'Misterio',
                'ISBN'      => '9788408163350',
                'image'     => 'https://imagessl0.casadellibro.com/a/l/s7/50/9788408163350.webp',
            ],
        ];

        DB::table('libros')->insert($books);
    }
}

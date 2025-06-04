<?php

namespace Database\Seeders;

use App\Models\Academia;
use App\Models\Comentario;
use App\Models\CQueja;
use App\Models\Materia;
use App\Models\Profesor;
use App\Models\ProfesorMateria;
use App\Models\Queja;
use App\Models\ReporteCom;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Role::create(['name' => 'usuario']);
        Role::create(['name' => 'moderador']);
        Role::create(['name' => 'administrador']);

        $materias = [
            ['nombre' => 'Matemáticas'],
            ['nombre' => 'Fisica'],
            ['nombre' => 'Quimica'],
            ['nombre' => 'Biologia'],
            ['nombre' => 'Historia'],
            ['nombre' => 'Geografía'],
            ['nombre' => 'Sociología'],
            ['nombre' => 'Psicologia'],
            ['nombre' => 'Economia'],
            ['nombre' => 'Administracion de Empresas'],
            ['nombre' => 'Contabilidad'],
            ['nombre' => 'Derecho'],
            ['nombre' => 'Ingenieria de Software'],
            ['nombre' => 'Programacion'],
            ['nombre' => 'Diseño Grafico'],
            ['nombre' => 'Comunicación'],
            ['nombre' => 'Medicina'],
            ['nombre' => 'Marketing'],
            ['nombre' => 'Estadistica'],
            ['nombre' => 'Contabilidad'],
        ];

        $academias = [
            ['nombre' => 'Computacion'],
            ['nombre' => 'Ingenieria'],
            ['nombre' => 'Basicas'],
            ['nombre' => 'Laboratorio'],
            ['nombre' => 'Matematicas'],
            ['nombre' => 'Fisica'],
            ['nombre' => 'Economia'],
            ['nombre' => 'Culturales'],
            ['nombre' => 'Deportes'],
            ['nombre' => 'Ingles'],
            ['nombre' => 'Sistemas'],
        ];

        $c_quejas = [
          ['nombre' => 'Relaciones inapropiadas con Alumnos'],
          ['nombre' => 'Relaciones inapropiadas con Profesores'],
          ['nombre' => 'Sin plan claro de estudios'],
          ['nombre' => 'Informacion confusa/contradictoria'],
          ['nombre' => 'Trato grosero/sarcastico'],
          ['nombre' => 'Criterios de Evaluacion confusos'],
          ['nombre' => 'Cancelacion de clases sin previo aviso'],
          ['nombre' => 'Discriminacion o Favoritismo'], 
          ['nombre' => 'Ignorancia de alumnos'],
          ['nombre' => 'Sin libertad de opinion'],
          ['nombre' => 'Ridiculizacion de alumnos'],
          ['nombre' => 'Irrespetuoso con la diversidad']
        ];

        //Catalogos
        foreach($materias as $materia){
            Materia::create($materia);
        }

        foreach($c_quejas as $c_queja){
            CQueja::create($c_queja);
        }
        
        foreach($academias as $academia){
            Academia::create($academia);
        };

        //Random Values
        User::factory(200)->create();
        
        Profesor::factory(200)->create();
        
        ProfesorMateria::factory(400)->create();
        
        Queja::factory(200)->create();
        
        Comentario::factory(800)->create();

        ReporteCom::factory(10)->create();
    }
}

<?php


// ADMIN GENERAL USERS

Breadcrumbs::register('Administración', function($breadcrumbs) {
    $breadcrumbs->push('Administración', action('Admin\DashboardController@index'));
});

Breadcrumbs::register('Usuarios', function($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Usuarios', action('Admin\UsersController@index'));
});


Breadcrumbs::register('Agregar', function($breadcrumbs) {
    $breadcrumbs->parent('Usuarios');
    $breadcrumbs->push('Agregar', action('Admin\UsersController@addUser'));
});

Breadcrumbs::register('Editar Usuarios', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Usuarios');
    $breadcrumbs->push('Editar Usuarios', action('Admin\UsersController@editUser',$uuid));
});

Breadcrumbs::register('Editar Usuarios', function($breadcrumbs) {
    $breadcrumbs->parent('Usuarios');
    $breadcrumbs->push('Editar Usuarios', action('Admin\UsersController@updateUser'));
});

Breadcrumbs::register('Eliminar', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Usuarios');
    $breadcrumbs->push('Eliminar', action('Admin\UsersController@removeUser',$uuid));
});

// ADMIN GENERAL GRADES

Breadcrumbs::register('Grados', function($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Grados', action('Admin\GradesController@index'));
});

Breadcrumbs::register('Agregar Grados', function($breadcrumbs) {
    $breadcrumbs->parent('Grados');
    $breadcrumbs->push('Agregar Grados', action('Admin\GradesController@addGrade'));
});

Breadcrumbs::register('Eliminar Grados', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Grados');
    $breadcrumbs->push('Eliminar Grados', action('Admin\GradesController@remove',$uuid));
});

Breadcrumbs::register('Editar Grados', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Grados');
    $breadcrumbs->push('Editar Grados', action('Admin\GradesController@edit',$uuid));
});

Breadcrumbs::register('Editar Grados', function($breadcrumbs) {
    $breadcrumbs->parent('Grados');
    $breadcrumbs->push('Editar Grados', action('Admin\GradesController@update'));
});

Breadcrumbs::register('Grados - Materias', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Grados');
    $breadcrumbs->push('Grados - Materias', action('Admin\GradesController@courses', $uuid));
});

// ADMIN GENERAL COURSES

Breadcrumbs::register('Materias', function ($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Materias', action('Admin\CoursesController@index'));
});

Breadcrumbs::register('Agregar Materias', function($breadcrumbs) {
    $breadcrumbs->parent('Materias');
    $breadcrumbs->push('Agregar Materias', action('Admin\CoursesController@add'));
});

Breadcrumbs::register('Eliminar Materias', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Materias');
    $breadcrumbs->push('Eliminar Materias', action('Admin\CoursesController@remove', $uuid));
});

Breadcrumbs::register('Editar Materias', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Materias');
    $breadcrumbs->push('Editar Materias', action('Admin\CoursesController@edit', $uuid));
});

Breadcrumbs::register('Editar Materias', function($breadcrumbs) {
    $breadcrumbs->parent('Materias');
    $breadcrumbs->push('Editar Materias', action('Admin\CoursesController@update'));
});

// ADMIN GENERAL UNITS

Breadcrumbs::register('Unidades', function ($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Unidades', action('Admin\UnitController@index'));
});

Breadcrumbs::register('Agregar Unidad', function($breadcrumbs) {
    $breadcrumbs->parent('Unidades');
    $breadcrumbs->push('Agregar Unidad', action('Admin\UnitController@add'));
});

Breadcrumbs::register('Eliminar Unidad', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Unidades');
    $breadcrumbs->push('Eliminar Unidad', action('Admin\UnitController@remove', $uuid));
});

Breadcrumbs::register('Editar Unidad', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Unidades');
    $breadcrumbs->push('Editar Unidad', action('Admin\UnitController@edit', $uuid));
});

Breadcrumbs::register('Editar Unidad', function($breadcrumbs) {
    $breadcrumbs->parent('Unidades');
    $breadcrumbs->push('Editar Unidad', action('Admin\UnitController@update'));
});

// ADMIN GENERAL EVENTS

Breadcrumbs::register('Events', function ($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Eventos', action('Admin\EventsController@index'));
});

Breadcrumbs::register('Agregar Evento', function($breadcrumbs) {
    $breadcrumbs->parent('Events');
    $breadcrumbs->push('Agregar Evento', action('Admin\EventsController@add'));
});

Breadcrumbs::register('Eliminar Evento', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Events');
    $breadcrumbs->push('Eliminar Evento', action('Admin\EventsController@remove', $uuid));
});

Breadcrumbs::register('Editar Evento', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Events');
    $breadcrumbs->push('Editar Evento', action('Admin\EventsController@edit', $uuid));
});

Breadcrumbs::register('Editar Evento', function($breadcrumbs) {
    $breadcrumbs->parent('Events');
    $breadcrumbs->push('Editar Evento', action('Admin\EventsController@update'));
});

// ADMIN GENERAL HOMEWORKS

Breadcrumbs::register('Tareas', function ($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Tareas', action('Admin\HomeworksController@index'));
});

Breadcrumbs::register('Agregar Tarea', function($breadcrumbs) {
    $breadcrumbs->parent('Tareas');
    $breadcrumbs->push('Agregar Tarea', action('Admin\HomeworksController@add'));
});
Breadcrumbs::register('Obtener Tarea', function($breadcrumbs) {
    $breadcrumbs->parent('Tareas');
    $breadcrumbs->push('Obtener Tarea', action('Admin\HomeworksController@getAdd'));
});

Breadcrumbs::register('Eliminar Tarea', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Tareas');
    $breadcrumbs->push('Eliminar Tarea', action('Admin\HomeworksController@remove', $uuid));
});

Breadcrumbs::register('Editar Tarea', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Tareas');
    $breadcrumbs->push('Editar Tarea', action('Admin\HomeworksController@edit', $uuid));
});

Breadcrumbs::register('Editar Tarea', function($breadcrumbs) {
    $breadcrumbs->parent('Tareas');
    $breadcrumbs->push('Editar Tarea', action('Admin\HomeworksController@update'));
});

// ADMIN CONTENTS

Breadcrumbs::register('Contenidos', function($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Contenidos', action('Admin\ContentsController@index'));
});

Breadcrumbs::register('Agregar Contenido', function($breadcrumbs) {
    $breadcrumbs->parent('Contenidos');
    $breadcrumbs->push('Agregar Contenido', action('Admin\ContentsController@add'));
});

Breadcrumbs::register('Agregar Contenido', function($breadcrumbs) {
    $breadcrumbs->parent('Contenidos');
    $breadcrumbs->push('Agregar Contenido', action('Admin\ContentsController@create'));
});

Breadcrumbs::register('Eliminar Contenido', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Contenidos');
    $breadcrumbs->push('Eliminar Contenido', action('Admin\ContentsController@remove', $uuid));
});

Breadcrumbs::register('Editar Contenido', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Contenidos');
    $breadcrumbs->push('Editar Contenido', action('Admin\ContentsController@update', $uuid));
});

Breadcrumbs::register('Editar Contenido', function($breadcrumbs,$uuid) {
    $breadcrumbs->parent('Contenidos');
    $breadcrumbs->push('Editar Contenido', action('Admin\ContentsController@edit', $uuid));
});

Breadcrumbs::register('Editar Contenido', function($breadcrumbs) {
    $breadcrumbs->parent('Contenidos');
    $breadcrumbs->push('Editar Contenido', action('Admin\ContentsController@update'));
});

// ADMIN GENERAL SCORES

Breadcrumbs::register('Notas', function ($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Notas', action('Admin\ScoresController@index'));
});

Breadcrumbs::register('Agregar Notas', function($breadcrumbs) {
    $breadcrumbs->parent('Notas');
    $breadcrumbs->push('Agregar Notas', action('Admin\ScoresController@add'));
});

Breadcrumbs::register('Consultar Alumnos', function($breadcrumbs) {
    $breadcrumbs->parent('Notas');
    $breadcrumbs->push('Consultar Alumnos', action('Admin\ScoresController@getStudents'));
});

Breadcrumbs::register('Eliminar Notas', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Tareas');
    $breadcrumbs->push('Eliminar Notas', action('Admin\ScoresController@remove', $uuid));
});

Breadcrumbs::register('Editar Notas', function($breadcrumbs, $uuid) {
    $breadcrumbs->parent('Notas');
    $breadcrumbs->push('Editar Notas', action('Admin\ScoresController@edit', $uuid));
});

Breadcrumbs::register('Editar Notas', function($breadcrumbs) {
    $breadcrumbs->parent('Notas');
    $breadcrumbs->push('Editar Notas', action('Admin\ScoresController@update'));
});

// ADMIN LOG

Breadcrumbs::register('Log', function($breadcrumbs) {
    $breadcrumbs->parent('Administración');
    $breadcrumbs->push('Log', action('Admin\SystemController@log'));
});

Breadcrumbs::register('Descripción', function($breadcrumbs,$id) {
    $breadcrumbs->parent('Log');
    $breadcrumbs->push('Descripción', action('Admin\SystemController@LogDescription',$id));
});


// DEFAULT
Breadcrumbs::register('Default', function($breadcrumbs) {
    $breadcrumbs->push('Default');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserControlller,
    LoginController,
    DiaryController,
    ProjectController,
    ReminderController
};
use App\Models\DiaryModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class, 'checkSession'])->name('checkSession');//checkSession 
Route::post('/login', [LoginController::class, 'loading'] )->name('login.loading'); // validar e faz login
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.logout'); // sai e destroi as sessions
Route::get('/recover/password',[LoginController::class, 'recover_password'])->name('recoverPassword.recover_password'); // redirecionar para pag de recuperação de senha
Route::post('recover/code',[LoginController::class, 'generate_recover_password'])->name('recoverCode.generate_recover_password'); // valida e manda codigo de recuperação de senha para o email


Route::get('/home',[UserControlller::class, 'index'])->name('home.index'); // entrar na pagina home
Route::get('/user/create',[UserControlller::class, 'create'])->name('user.create'); // vai para págima de create de users
Route::post('/user',[UserControlller::class, 'store'])->name('user.store'); // armazena dados de novo user
Route::get('/user/{id}',[UserControlller::class, 'show'])->name('settings.show'); // exibe infor... de configurações de user
Route::delete('/user/{id}',[UserControlller::class, 'destroy'])->name('user.destroy'); // apagar conta de users
Route::put('/name/{id}', [UserControlller::class, 'update_name'])->name('name.update_name'); // atualizar as infor(s) de name
Route::put('/email/contact/{id}', [UserControlller::class, 'update_email_contact'])->name('email-contact.update_email_contact'); // atualizar as infor(s) de email contact
Route::put('/email/{id}', [UserControlller::class, 'update_email'])->name('email.update_email'); // atualizar as infor(s) de email login
Route::put('/password/{id}', [UserControlller::class, 'update_password'])->name('password.update_password'); // atualizar as infor(s) de password de login


Route::get('/document-diary/create', [DiaryController::class, 'create'])->name('diary.create'); // redireciona para rota de document
Route::post('/diary', [DiaryController::class, 'store'])->name('diary.store'); // grava diario de bordo
Route::get('/historic-diary/{id}', [DiaryController::class, 'historicDiary'])->name('historic_diary.historicDiary'); // exibe meu histórico
Route::get('diary/{diary_id}',[DiaryController::class, 'show'])->name('diary.show'); // exibe o diary selecionado
Route::get('/diary/pdf/{diary_id}',[DiaryController::class, 'generationPDF'])->name('diary-pdf.generationPDF');


Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create'); // redireciona para rota de criação de projeto
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show'); // redireciona para rota de exibir projetos em abertos
Route::post('/project', [ProjectController::class, 'store'])->name('project.store'); // grava novo projeto
Route::delete('/projetc/{id}',[ProjectController::class, 'destroy'])->name('project.destroy'); // apagar projeto
Route::get('/projetc/{project_id}/edit',[ProjectController::class, 'edit'])->name('project.edit'); // view editar projeto
Route::put('/projetc/{id}',[ProjectController::class, 'update'])->name('project.update'); // editar projeto

Route::delete('/reminder/{id}',[ReminderController::class, 'destroy'])->name('reminder.destroy');
Route::post('/reminder',[ReminderController::class, 'store'])->name('reminder.store'); // criar um lembrete


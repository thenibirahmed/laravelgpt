<?php

use App\Http\Livewire\ChatGpt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;

Route::get('/', ChatGpt::class);


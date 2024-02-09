<?php

use App\Models\Dipendente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $dipendente = new Dipendente();
        $dipendente->name = "Afef";
        $dipendente->surname = "Hassani";
        $dipendente->email = "afef.hassani@fiven.eu";
        $dipendente->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $dipendenti = Dipendente::all();
        foreach ($dipendenti as $dipendente) {
            $dipendente->delete();
        }
    }
};

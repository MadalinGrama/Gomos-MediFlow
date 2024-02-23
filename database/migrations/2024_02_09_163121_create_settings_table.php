<?php

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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->text('home_banner')->nullable(); // Poți stoca aici calea către imagine sau numele fișierului pentru bannerul de pe pagina principală
            $table->string('logo')->nullable(); // Poți stoca aici calea către imagine sau numele fișierului      
            $table->string('header_color')->nullable();
            $table->string('footer_color')->nullable();
            $table->json('socials_links')->nullable(); // Link către canalul de YouTube
            $table->json('footer_links')->nullable(); // Poți stoca aici linkurile de footer sub formă de JSON
            $table->string('address')->nullable(); // Adresa companiei
            $table->string('email')->nullable(); // Adresa de email
            $table->string('phone')->nullable(); // Numărul de telefon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

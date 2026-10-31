<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title_line_1')->nullable();
            $table->string('hero_title_line_2')->nullable();
            $table->text('hero_body')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('about_eyebrow')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_body')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_image_alt')->nullable();
            $table->string('programs_eyebrow')->nullable();
            $table->string('programs_title')->nullable();
            $table->text('programs_intro')->nullable();
            $table->string('impact_eyebrow')->nullable();
            $table->string('impact_title')->nullable();
            $table->text('impact_body')->nullable();
            $table->string('impact_image')->nullable();
            $table->string('impact_callout_line_1')->nullable();
            $table->string('impact_callout_line_2')->nullable();
            $table->string('projects_eyebrow')->nullable();
            $table->string('projects_title')->nullable();
            $table->text('projects_intro')->nullable();
            $table->string('donate_eyebrow')->nullable();
            $table->string('donate_title')->nullable();
            $table->text('donate_body')->nullable();
            $table->string('donate_image')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_body')->nullable();
            $table->string('cta_image')->nullable();
            $table->string('contact_website')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_location')->nullable();
            $table->string('contact_location_note')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('footer_tagline')->nullable();
            $table->string('footer_mission')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

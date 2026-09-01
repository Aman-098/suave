<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();

            // service | area | wedding | route | directions
            $table->string('type', 20)->index();
            $table->string('slug', 160);
            $table->string('url_path', 191)->unique();

            // SEO head
            $table->string('h1', 200);
            $table->string('meta_title', 200);
            $table->string('meta_description', 320);
            $table->string('meta_keywords', 320)->nullable();
            $table->string('og_image', 255)->nullable();

            // AEO / GEO body
            $table->text('answer_block');                 // 40-60 word direct answer
            $table->longText('intro')->nullable();
            $table->json('sections')->nullable();         // [{"h2":"...","html":"..."}]
            $table->json('comparison')->nullable();       // {"caption":"","headers":[],"rows":[[]]}
            $table->json('faqs')->nullable();             // [{"q":"","a":""}]
            $table->json('sources')->nullable();          // [{"label":"","url":"","publisher":""}]

            // E-E-A-T byline
            $table->string('reviewer_name', 120)->nullable();
            $table->string('reviewer_title', 160)->nullable();
            $table->date('reviewed_at')->nullable();

            // area / wedding fields
            $table->string('area_name', 120)->nullable();
            $table->string('region', 120)->nullable();
            $table->string('postcodes', 191)->nullable();
            $table->json('landmarks')->nullable();
            $table->string('cluster', 10)->nullable();    // C1..C5

            // route fields
            $table->string('route_from', 120)->nullable();
            $table->string('route_to', 120)->nullable();
            $table->decimal('distance_miles', 6, 1)->nullable();
            $table->unsignedSmallInteger('duration_min')->nullable();
            $table->unsignedSmallInteger('duration_max')->nullable();
            $table->string('price_from', 40)->nullable();

            // interlinking + control
            $table->string('hub_slug', 160)->nullable();  // parent service hub slug
            $table->json('fleet_slugs')->nullable();      // existing /fleet/{slug} to link down to
            $table->json('related_paths')->nullable();    // manual extra internal links
            $table->unsignedSmallInteger('sort')->default(0);
            $table->boolean('is_published')->default(false);
            $table->boolean('noindex')->default(false);

            $table->timestamps();
            $table->index(['type', 'slug']);
            $table->index(['type', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_pages');
    }
};

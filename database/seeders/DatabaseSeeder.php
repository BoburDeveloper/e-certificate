<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            ini_set('memory_limit', '-1'); // Adjust if needed for large files
            DB::unprepared(file_get_contents(__DIR__ . '/source/dump.sql'));
        }
    }
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDO;

class RestoreLegacyDataSeeder extends Seeder
{
    public function run(): void
    {
        $src = new PDO('mysql:host=127.0.0.1;port=3306;dbname=kanalnuklir', 'root', '');
        $src->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // 1. Users
        $this->command->info('Memulihkan users...');
        $users = $src->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $u) {
            DB::table('users')->updateOrInsert(
                ['id' => $u['id']],
                [
                    'name' => $u['name'],
                    'email' => $u['email'],
                    'email_verified_at' => $u['email_verified_at'] ?? null,
                    'password' => $u['password'],
                    'remember_token' => $u['remember_token'] ?? null,
                    'created_at' => $u['created_at'],
                    'updated_at' => $u['updated_at'],
                ]
            );
        }

        // 2. Categories
        $this->command->info('Memulihkan categories...');
        DB::table('categories')->truncate();
        $cats = $src->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cats as $c) {
            DB::table('categories')->insert([
                'id' => $c['id'],
                'name' => $c['name'],
                'parent_id' => $c['parent_id'],
                'slug' => $c['slug'],
                'created_at' => $c['created_at'],
                'updated_at' => $c['updated_at'],
            ]);
        }

        // 3. Subjects
        $this->command->info('Memulihkan subjects...');
        DB::table('subjects')->truncate();
        $subs = $src->query('SELECT * FROM subjects')->fetchAll(PDO::FETCH_ASSOC);
        $usedSubjectSlugs = [];
        foreach ($subs as $s) {
            $slug = $s['slug'];
            if (in_array($slug, $usedSubjectSlugs)) {
                $slug = $slug . '-' . $s['id'];
            }
            $usedSubjectSlugs[] = $slug;

            DB::table('subjects')->insert([
                'id' => $s['id'],
                'name' => trim($s['name']),
                'slug' => $slug,
                'created_at' => $s['created_at'],
                'updated_at' => $s['updated_at'],
            ]);
        }

        // 4. People
        $this->command->info('Memulihkan people (21 dosen/pakar)...');
        DB::table('people')->truncate();
        $people = $src->query('SELECT * FROM people')->fetchAll(PDO::FETCH_ASSOC);
        $usedPeopleSlugs = [];
        foreach ($people as $p) {
            $slug = $p['slug'];
            if (in_array($slug, $usedPeopleSlugs)) {
                $slug = $slug . '-' . $p['id'];
            }
            $usedPeopleSlugs[] = $slug;

            $email = $p['email'] ?: (Str::slug($p['name']) . '@fi.itb.ac.id');
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $p['name'],
                    'password' => bcrypt('password123'),
                ]
            );

            DB::table('people')->insert([
                'id' => $p['id'],
                'prename' => $p['prename'],
                'name' => $p['name'],
                'slug' => $slug,
                'postname' => $p['postname'],
                'sinta' => $p['sinta'],
                's1' => $p['s1'],
                's2' => $p['s2'],
                's3' => $p['s3'],
                'email' => $p['email'],
                'jabatan' => $p['jabatan'],
                'fungsional' => $p['fungsional'],
                'project' => $p['project'],
                'publication' => $p['publication'],
                'hki' => $p['hki'],
                'foto' => $p['foto'],
                'status' => $p['status'],
                'user_id' => $user->id,
                'created_at' => $p['created_at'],
                'updated_at' => $p['updated_at'],
            ]);
        }

        // 5. Subject People (dari sub_people)
        $this->command->info('Memulihkan subject_people (116 relasi keahlian)...');
        DB::table('subject_people')->truncate();
        $subPeople = $src->query('SELECT * FROM sub_people')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($subPeople as $sp) {
            DB::table('subject_people')->insert([
                'id' => $sp['id'],
                'subject_id' => $sp['subject_id'],
                'person_id' => $sp['person_id'],
                'created_at' => $sp['created_at'],
                'updated_at' => $sp['updated_at'],
            ]);
        }

        // 6. Posts
        $this->command->info('Memulihkan posts...');
        DB::table('posts')->truncate();
        $posts = $src->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($posts as $po) {
            DB::table('posts')->insert([
                'id' => $po['id'],
                'title' => $po['title'],
                'slug' => $po['slug'],
                'excerpt' => $po['excerpt'],
                'body' => $po['body'],
                'image' => $po['image'],
                'status' => $po['status'],
                'published_at' => $po['published_at'],
                'category_id' => $po['category_id'],
                'user_id' => $po['user_id'],
                'created_at' => $po['created_at'],
                'updated_at' => $po['updated_at'],
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $this->command->info('Restorasi data dari database kanalnuklir sukses 100%!');
    }
}

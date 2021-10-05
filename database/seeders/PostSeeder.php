<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        $author2 = User::create([
            'name' => 'jane Doe',
            'email' => 'jane@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
        $category1 = Category::create([
            'name' => 'News',
            'slug'=>Str::slug(Str::lower('News'),'-')
        ]);
        $category2 = Category::create([
            'name' => 'Updates',
            'slug'=>Str::slug(Str::lower('Updates'),'-')
        ]);
        $category3 = Category::create([
            'name' => 'Design',
            'slug'=>Str::slug(Str::lower('Design'),'-')
        ]);
        $category4 = Category::create([
            'name' => 'Marketing',
            'slug'=>Str::slug(Str::lower('Marketing'),'-')
        ]);
        $category5 = Category::create([
            'name' => 'Partnership',
            'slug'=>Str::slug(Str::lower('Partnership'),'-')
        ]);
        $category6 = Category::create([
            'name' => 'Product',
            'slug'=>Str::slug(Str::lower('Product'),'-')
        ]);
        $category7 = Category::create([
            'name' => 'Hiring',
            'slug'=>Str::slug(Str::lower('Hiring'),'-')
        ]);
        $category8 = Category::create([
            'name' => 'Offers',
            'slug'=>Str::slug(Str::lower('Offers'),'-')
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id' => $category1->id,
            'image' => '1.jpg',
            'user_id' => $author1->id,
            'slug' => Str::slug(Str::lower('We relocated our office to a new designed garage'),'-')
        ]);
        $post2 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id' => $category4->id,
            'image' => '2.jpg',
            'user_id' => $author1->id,
            'slug' => Str::slug(Str::lower('Congratulate and thank to Maryam for joining our team'),'-')
        ]);
        $post3 = Post::create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id' => $category2->id,
            'image' => '3.jpg',
            'user_id' => $author2->id,
            'slug' => Str::slug(Str::lower('New published books to read by a product designer'),'-')
        ]);
        $post4 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id' => $category3->id,
            'image' => '4.jpg',
            'user_id' => $author2->id,
            'slug' => Str::slug(Str::lower('Best practices for minimalist design with example'),'-')
        ]);
        $post5 = Post::create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id' => $category6->id,
            'image' => '5.jpg',
            'user_id' => 1,            
            'slug' => Str::slug(Str::lower('This is why it\'s time to ditch dress codes at work'),'-')
        ]);
        $post6 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id' => $category8->id,
            'image' => '6.jpg',
            'user_id' => 1,
            'slug' => Str::slug(Str::lower('Top 5 brilliant content marketing strategies'),'-')
        ]);


        $tag1 = Tag::create([
            'name' => 'Record',
            'slug'=>Str::slug(Str::lower('Record'),'-')
        ]);
        $tag2 = Tag::create([
            'name' => 'Progress',
            'slug'=>Str::slug(Str::lower('Progress'),'-')
        ]);
        $tag3 = Tag::create([
            'name' => 'Customers',
            'slug'=>Str::slug(Str::lower('Customers'),'-')
        ]);
        $tag4 = Tag::create([
            'name' => 'Freebie',
            'slug'=>Str::slug(Str::lower('Freebie'),'-')
        ]);
        $tag5 = Tag::create([
            'name' => 'Offer',
            'slug'=>Str::slug(Str::lower('Offer'),'-')
        ]);
        $tag6 = Tag::create([
            'name' => 'Screenshot',
            'slug'=>Str::slug(Str::lower('Screenshot'),'-')
        ]);
        $tag7 = Tag::create([
            'name' => 'Milestone',
            'slug'=>Str::slug(Str::lower('Milestone'),'-')
        ]);
        $tag8 = Tag::create([
            'name' => 'Version',
            'slug'=>Str::slug(Str::lower('Version'),'-')
        ]);
        $tag9 = Tag::create([
            'name' => 'Design',
            'slug'=>Str::slug(Str::lower('Design'),'-')
        ]);
        $tag10 = Tag::create([
            'name' => 'Job',
            'slug'=>Str::slug(Str::lower('Job'),'-')
        ]);


        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag3->id, $tag4->id]);
        $post3->tags()->attach([$tag5->id, $tag6->id]);
        $post4->tags()->attach([$tag7->id, $tag8->id]);
        $post5->tags()->attach([$tag9->id, $tag10->id]);
        $post6->tags()->attach([$tag1->id, $tag5->id]);
    }
}

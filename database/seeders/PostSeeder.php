<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Updates'
        ]);
        $category3 = Category::create([
            'name' => 'Design'
        ]);
        $category4 = Category::create([
            'name' => 'Marketing'
        ]);
        $category5 = Category::create([
            'name' => 'Partnership'
        ]);
        $category6 = Category::create([
            'name' => 'Product'
        ]);
        $category7 = Category::create([
            'name' => 'Hiring'
        ]);
        $category8 = Category::create([
            'name' => 'Offers'
        ]);

        $post1 = Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id'=>$category1->id,
            'image'=>'1.jpg'
        ]);
        $post2 = Post::create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id'=>$category4->id,
            'image'=>'2.jpg'
        ]);
        $post3 = Post::create([
            'title'=>'New published books to read by a product designer',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id'=>$category2->id,
            'image'=>'3.jpg'
        ]);
        $post4 = Post::create([
            'title'=>'Best practices for minimalist design with example',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id'=>$category3->id,
            'image'=>'4.jpg'
        ]);
        $post5 = Post::create([
            'title'=>'This is why it\'s time to ditch dress codes at work',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id'=>$category6->id,
            'image'=>'5.jpg'
        ]);
        $post6 = Post::create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'category_id'=>$category8->id,
            'image'=>'6.jpg'
        ]);


        $tag1 = Tag::create([
            'name'=>'Record'
        ]);
        $tag2 = Tag::create([
            'name'=>'Progress'
        ]);
        $tag3 = Tag::create([
            'name'=>'Customers'
        ]);
        $tag4 = Tag::create([
            'name'=>'Freebie'
        ]);
        $tag5 = Tag::create([
            'name'=>'Offer'
        ]);
        $tag6 = Tag::create([
            'name'=>'Screenshot'
        ]);
        $tag7 = Tag::create([
            'name'=>'Milestone'
        ]);
        $tag8 = Tag::create([
            'name'=>'Version'
        ]);
        $tag9 = Tag::create([
            'name'=>'Design'
        ]);
        $tag10 = Tag::create([
            'name'=>'Job'
        ]);
       

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag3->id,$tag4->id]);
        $post3->tags()->attach([$tag5->id,$tag6->id]);
        $post4->tags()->attach([$tag7->id,$tag8->id]);
        $post5->tags()->attach([$tag9->id,$tag10->id]);
        $post6->tags()->attach([$tag1->id,$tag5->id]);
    }
}
          
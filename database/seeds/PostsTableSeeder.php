<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1= User::create([
            'name'=>'Kanak',
            'email'=>'kanakgoel36gmail.com',
            'password'=>Hash::make('password',)
        ]);

        $author2= User::create([
            'name'=>'Kanak',
            'email'=>'kanakgoel37gmail.com',
            'password'=>Hash::make('password',)
        ]);

        $category1=Category::create([
            'name'=>'NEWS',
        ]);
        $category2=Category::create([
            'name'=>'MARKETING',
        ]);
        $category3=Category::create([
            'name'=>'PARTNERSHIP',
        ]);
        
        $post1=Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'lsdfowenjf',
            'content'=>'lfmlerk',
            'category_id'=>$category1->id,
            'image'=>'storage/posts/1.jpg',
            'user_id'=>$author1->id,

        ]);
        // we can write"Post::create" in this case we have to pass the author id OR "$author2->posts()->create" in this case no need to pass author id
        $post2=$author2->posts()->create([
            'title'=>'ljdkjodjodjfo',
            'description'=>'lsdfowenjf',
            'content'=>'lfmlerk',
            'category_id'=>$category2->id,
            'image'=>'storage/posts/2.jpg',
        ]);
        $post3=$author2->posts()->create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>'lsdfowenjf',
            'content'=>'lfmlerk',
            'category_id'=>$category3->id,
            'image'=>'storage/posts/3.jpg',
        ]);
        $post4=$author1->posts()->create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'lsdfowenjf',
            'content'=>'lfmlerk',
            'category_id'=>$category2->id,
            'image'=>'storage/posts/4.jpg',
        ]);
        $tag1=Tag::create([
            'name'=>'job',
        ]);
        $tag2=Tag::create([
            'name'=>'customers',
        ]);
        $tag3=Tag::create([
            'name'=>'RECORD',
        ]);
        
        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id]);

        
        
    }
}

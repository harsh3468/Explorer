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
            'name'=>'ARRAY',
        ]);
        $category2=Category::create([
            'name'=>'TREE',
        ]);
        $category3=Category::create([
            'name'=>'GRAPH',
        ]);
        $category4=Category::create([
            'name'=>'OPERATING SYSTEM',
        ]);
        
        $post1=Post::create([
            'title'=>'Arrays in C/C++',
            'description'=>'An array is a collection of items stored at contiguous memory locations.',
            'content'=>'Why do we need arrays?
            We can use normal variables (v1, v2, v3, ..) when we have a small number of objects, but if we want to store a large number of instances, it becomes difficult to manage them with normal variables. The idea of an array is to represent many instances in one variable.
            Array declaration in C/C++:
            1. Array declaration by specifying size
            // Array declaration by initializing elements 
            int arr[] = { 10, 20, 30, 40 } 
            
            // Compiler creates an array of size 4. 
            // above is same as "int arr[4] = {10, 20, 30, 40}" 
            
            ',
            'category_id'=>$category1->id,
            'image'=>'storage/posts/array.png',
            'user_id'=>$author1->id,

        ]);
        // we can write"Post::create" in this case we have to pass the author id OR "$author2->posts()->create" in this case no need to pass author id
        $post2=$author2->posts()->create([
            'title'=>'Binary Tree Data Structure',
            'description'=>'A tree whose elements have at most 2 children is called a binary tree. Since each element in a binary tree can have only 2 children, we typically name them the left and right child.',
            'content'=>'1) The maximum number of nodes at level ‘l’ of a binary tree is 2l-1.
            Here level is number of nodes on path from root to the node (including root and node). Level of root is 1.
            This can be proved by induction.
            For root, l = 1, number of nodes = 21-1 = 1
            Assume that maximum number of nodes on level l is 2l-1
            Since in Binary tree every node has at most 2 children, next level would have twice nodes, i.e. 2 * 2l-1
            
             
            2) Maximum number of nodes in a binary tree of height ‘h’ is 2h – 1.
            Here height of a tree is maximum number of nodes on root to leaf path. Height of a tree with single node is considered as 1.
            This result can be derived from point 2 above. A tree has maximum nodes if all levels have maximum nodes. So maximum number of nodes in a binary tree of height h is 1 + 2 + 4 + .. + 2h-1. This is a simple geometric series with h terms and sum of this series is 2h – 1.
            In some books, height of the root is considered as 0. In this convention, the above formula becomes 2h+1 – 1
            
            
            
             
            
             
            3) In a Binary Tree with N nodes, minimum possible height or minimum number of levels is  ? Log2(N+1) ?  
            This can be directly derived from point 2 above. If we consider the convention where height of a leaf node is considered as 0, then above formula for minimum possible height becomes   ? Log2(N+1) ? – 1
            
             
            4) A Binary Tree with L leaves has at least   ? Log2L ? + 1   levels
            A Binary tree has maximum number of leaves (and minimum number of levels) when all levels are fully filled. Let all leaves be at level l, then below is true for number of leaves L.',
            'category_id'=>$category2->id,
            'image'=>'storage/posts/tree.png',
        ]);
        $post3=$author2->posts()->create([
            'title'=>'Graph Data Structure And Algorithms',
            'description'=>'A Graph is a non-linear data structure consisting of nodes and edges. The nodes are sometimes also referred to as vertices and the edges are lines or arcs that connect any two nodes in the graph.',
            'content'=>'Graphs are used to solve many real-life problems. Graphs are used to represent networks. The networks may include paths in a city or telephone network or circuit network. Graphs are also used in social networks like linkedIn, Facebook. For example, in Facebook, each person is represented with a vertex(or node). Each node is a structure and contains information like person id, name, gender, locale etc.',
            'category_id'=>$category3->id,
            'image'=>'storage/posts/graph.png',
        ]);
        $post4=$author1->posts()->create([
            'title'=>'Banker’s Algorithm',
            'description'=>'The banker’s algorithm is a resource allocation and deadlock avoidance algorithm that tests for safety',
            'content'=>'The banker’s algorithm is a resource allocation and deadlock avoidance algorithm that tests for safety by simulating the allocation for predetermined maximum possible amounts of all resources,
             then makes an “s-state” check to test for possible activities, before deciding whether allocation should be allowed to continue.

            Following Data structures are used to implement the Banker’s Algorithm:
            
            Let ‘n’ be the number of processes in the system and ‘m’ be the number of resources types.
            
            Available : 
            
            It is a 1-d array of size ‘m’ indicating the number of available resources of each type.
            Available[ j ] = k means there are ‘k’ instances of resource type Rj
            Max :
            
            It is a 2-d array of size ‘n*m’ that defines the maximum demand of each process in a system.
            Max[ i, j ] = k means process Pi may request at most ‘k’ instances of resource type Rj.
            Allocation :
            
            It is a 2-d array of size ‘n*m’ that defines the number of resources of each type currently allocated to each process.
            Allocation[ i, j ] = k means process Pi is currently allocated ‘k’ instances of resource type Rj
            Need :
            
             It is a 2-d array of size ‘n*m’ that indicates the remaining resource need of each process.
            Need [ i,   j ] = k means process Pi currently need ‘k’ instances of resource type Rj
            for its execution.
            
            Need [ i,   j ] = Max [ i,   j ] – Allocation [ i,   j ]
            
            
             
            
            Allocationi specifies the resources currently allocated to process Pi and Needi specifies the additional resources that process Pi may still request to complete its task.
            
            Banker’s algorithm consists of Safety algorithm and Resource request algorithm
            
            ',
            'category_id'=>$category4->id,
            'image'=>'storage/posts/banker.png',
        ]);
        $tag1=Tag::create([
            'name'=>'Microsoft',
            'details'=>'Bill Gates'
        ]);
        $tag2=Tag::create([
            'name'=>'Google',
            'details'=>'Sundar Pichai'
        ]);
        $tag3=Tag::create([
            'name'=>'Directi',
            'details'=>'Codechef'
        ]);
        
        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id]);
        $post4->tags()->attach([$tag1->id,$tag3->id,$tag2->id]);

    }
}

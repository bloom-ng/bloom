<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;
use Wink\WinkTag;

class BlogController extends Controller
{
    
    public function index(){

        $posts = WinkPost::with('tags')
                    ->live()
                    ->orderBy('publish_date','DESC')
                    ->paginate(15);
        
        
        return view('blog.index',['posts'=>$posts, 'tags'=>WinkTag::all()]);
    }

    public function search(Request $request){
        $q= $request->input('post-search')===null?'':$request->input('post-search');
        $posts = WinkPost::with('tags')
                    ->where('title','LIKE','%'.$q.'%')
                    ->live()
                    ->orderBy('publish_date','DESC')
                    ->paginate(15);
        

        return view('post-search',['posts'=>$posts, 'tags'=>WinkTag::all(), 'query'=>$q,]);
    }

    

    public function show($slug){

        $post = WinkPost::with('tags')
                    ->live()
                    ->whereSlug($slug)
                    ->first();
        
        if(is_null($post)){ return redirect('/');}

        $author = $post->author;

       // $related_posts = $this->getRelatedPostsByTag($post->tags()->first());
        $next_post = $this->getNextPost($post);
        $previous_post = $this->getPreviousPost($post);
        
        
        return view('blog.post.index',['post' => $post, 
                                  'tags'=>WinkTag::all(), 
                                  'author'=>$author,
                                  //'related_posts'=>$related_posts,
                                  'next_post' => $next_post,
                                  'previous_post' => $previous_post]);
    }

    public function tagPost($slug){
       $posts = WinkTag::where('slug',$slug)
                        ->first()
                        ->posts()->with('tags')
                        ->live()
                        ->orderBy('publish_date','DESC')
                        ->paginate(15);

        $tag = WinkTag::where('slug',$slug)->first();
        
      return view('filtered-posts',['posts'=>$posts, 'tags'=>WinkTag::all(), 'tag'=>$tag]);  
        
    }

    public function getRelatedPostsByTag($tag){
        /*
        *   Requires post with tags relations 
        *   and return related post
        */
        
        $posts = WinkTag::where('slug',$tag->slug)
                        ->first()
                        ->posts()->with('tags')
                        ->live()
                        ->orderBy('publish_date','DESC')
                        ->take(8)
                        ->get()->shuffle();
        return $posts;
    }

    public function getNextPost($post){

        $next_post = WinkPost::where('publish_date', '>', $post->publish_date)
                                ->orderBy('publish_date','ASC')
                                ->first();
              return $next_post;              

    }

    public function getPreviousPost($post){

        $previous_post = WinkPost::where('publish_date', '<', $post->publish_date)
                                        ->orderBy('publish_date','DESC')
                                        ->first();
              return $previous_post;              

    }
    
}

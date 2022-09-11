<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Models\BusinessModel;
use App\Models\ReviewModel;
use Serpapi\GoogleSearchResultsPhp;
use Monkeylearn\Client;

class Dashboard extends BaseController
{
    function __construct()
    {
        //$this->session = \Config\Services::session();
        //$this->session->start();
        helper(['url', 'form']);
        $this->session = session();
        $this->userName = $this->session->get('name');
        $this->user_id = $this->session->get('user_id');
    }
    
    public function index()
    {
        
        $model = new BusinessModel();
        $business = $model->where('user_id', $this->user_id)->first();

        if(empty($business)){
            $profile = 0;
        }else{
            $profile = 1;
            $model2 = new ReviewModel();
            $reviews = $model2->where('business_id', $business['profile_id'])->findAll();
            $data['reviews']=$reviews;
        }

        $data['profile'] = $profile;
        $data['business'] = $business;
        $data['userName'] = $this->userName;
        return view('dashboard', $data);
    
    }


    public function myprofile()
    {
      $data['userName'] = $this->userName;
      return view('myprofile' , $data);
    }

    public function accountsettings()
    {
      $data['userName'] = $this->userName;
      return view('accountsettings' , $data);
    }


    public function save_business()
    {
        $session = session();
        $bmodel = new BusinessModel();
        $newBusiness = [                    
            'user_id' => $session->get('user_id'), 
            'provider' => "g",
            'business_id' => $this->request->getVar('place_id'),
            'created_at' => time()
        ];
        $bmodel->save( $newBusiness );
        $b_id = $bmodel->getInsertID();

        $query = [
            "engine" => "google_maps",
            "q" => $this->request->getVar('business_name'),
            "ll" => '@' . $this->request->getVar('latitude') . ',' . $this->request->getVar('longitude') . ',15.1z',
            "type" => "search",
        ];
        $search = new \GoogleSearchResults('8ab0a2d9c6a5e29f394abb49a97b445317233708e057dad0ea3e984b16327c51');
        $result = $search->get_json($query);
        $local_results = $result->place_results;
        $data_id = $local_results->data_id;

        $bmodel->update(['profile_id'=> $b_id], ['data_id' => $data_id]);
        $query2 = [
            "engine" => "google_maps_reviews",
            "data_id" => $data_id,
        ];
        $result = $search->get_json($query2);
        $reviews = $result->reviews;
        $n = 0;
        $newReviews = array();
        $rText = array();
        foreach($reviews as $review){
            $newReviews[$n] = [
                'business_id' => $b_id,
                'review_text' => $review->snippet,
                'review_rating' => $review->rating,
                'review_date' => 0,
                'review_status' => "P",
                'author_name' => $review->user->name,
                'reply' => "",
                'sentiment' => ""
            ];
            $rText[$n] = $review->snippet;
            $n++;
        }
        $ml = new \MonkeyLearn\Client('c4c2ca8f2b27bdbe1f3a96a0e3f20106824fc126');
        $model_id = 'cl_Jx8qzYJh';
        $res = $ml->classifiers->classify($model_id, $rText);
        $n = 0;
        foreach($res->result as $resx){
            $ana = $resx['classifications'][0]['tag_name'];
            $newReviews[$n]['sentiment'] = $ana;
            $n++;
        }
        $rmodel = new ReviewModel();
        $rmodel->insertBatch($newReviews);

        return redirect()->to('dashboard');
    }

    public function cron()
    {
        $bmodel = new BusinessModel();
        $rmodel = new ReviewModel();
        $list = $bmodel->findAll();
        if(!empty($list)){
            $search = new \GoogleSearchResults('8ab0a2d9c6a5e29f394abb49a97b445317233708e057dad0ea3e984b16327c51');
            foreach($list as $business){
                $reviews = [];
                $query = [
                    "engine" => "google_maps_reviews",
                    "data_id" => $business['data_id'],
                ];
                $result = $search->get_json($query);
                $reviews = $result->reviews;
                if(!empty($reviews)){
                    $newReviews = [];
                    $rText = [];
                    $n = 0;
                    foreach($reviews as $review){
                        $exist = $rmodel->where('author_name', $review->user->name)
                                        ->where('business_id', $business['profile_id'])
                                        ->first();
                        if(empty($exist)){
                            $newReviews[$n] = [
                                'business_id' => $business['profile_id'],
                                'review_text' => $review->snippet,
                                'review_rating' => $review->rating,
                                'review_date' => 0,
                                'review_status' => "P",
                                'author_name' => $review->user->name,
                                'reply' => "",
                                'sentiment' => ""
                            ];
                            $rText[$n] = $review->snippet;
                            $n++;
                        }
                    }
                    $ml = new \MonkeyLearn\Client('c4c2ca8f2b27bdbe1f3a96a0e3f20106824fc126');
                    $model_id = 'cl_Jx8qzYJh';
                    $res = $ml->classifiers->classify($model_id, $rText);
                    $n = 0;
                    foreach($res->result as $resx){
                        $ana = $resx['classifications'][0]['tag_name'];
                        $newReviews[$n]['sentiment'] = $ana;
                        $n++;
                    }
                    $rmodel->insertBatch($newReviews);

                    
                }
            }
        }

    }

    public function send_reply()
    {
        $session = session();
        $model = new ReviewModel();
            $newReply = [   
                'review_id' => $this->request->getVar('review_id'),
                'reply' => $this->request->getVar('reply')
              
            ];
            $model->save( $newReply );

            return redirect()->to('dashboard');

    }

    private function getTimestamp($time){
        $dtime = DateTime::createFromFormat("d/m G:i", $time);
        $timestamp = $dtime->getTimestamp();
        return $timestamp;
    }

}


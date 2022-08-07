<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Models\BusinessModel;
use App\Models\ReviewModel;
use Serpapi\GoogleSearchResultsPhp;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $userName = $session->get('name');
        
        $data['userName'] = $userName;
        $user_id = $session->get('user_id');
        $model = new BusinessModel();
            $business = $model->where('user_id', $user_id)->first();

        if(empty($business)){
            $profile = 0;
        }else{
            $profile = 1;
            $model2 = new ReviewModel();
            $reviews = $model2->where('business_id', 1)->findAll();
            $data['reviews']=$reviews;
        }

        $data['profile'] = $profile;
        $data['business'] = $business;

        return view('dashboard', $data);
    
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

             //$b_id = $newBusiness->getInsertID();
             $b_id = 1;


            
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

              $query2 = [
                "engine" => "google_maps_reviews",
                "data_id" => $data_id,
              ];
              
              //$search = new GoogleSearch('8ab0a2d9c6a5e29f394abb49a97b445317233708e057dad0ea3e984b16327c51');
              $result = $search->get_json($query2);
              $reviews = $result->reviews;
              
              foreach($reviews as $review){
                $rmodel = new ReviewModel();
                $newReview = [
                    'business_id' => $b_id,
                    'review_text' => $review->snippet,
                    'review_rating' => $review->rating,
                    'review_date' => 0,
                    'review_status' => "P",
                    'author_name' => $review->user->name,
                    'reply' => ""
                ];
                $rmodel->save( $newReview);
            }
            return redirect()->to('dashboard');
              
            
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



}


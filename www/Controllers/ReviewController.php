<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Review;

class ReviewController
{
    public function showAllReviews(): void
    {
        $reviews = Review::getAllReviews();
        $view = new View("Main/reviews", "front");
        $view->assign("reviews", $reviews);
    }

    public function createReview($userId, $content): void
    {
        $newReview = new Review();
        $newReview->setContent($content);
        $newReview->setUserId($userId);
        $newReview->setApproved(0); // Par défaut, la critique n'est pas approuvée lors de sa création
        $newReview->setCreated(date("Y-m-d H:i:s"));
        $newReview->save();
            
        redirect('/review');
    }

    public function updateReview($id, $content): void
    {
        $review = Review::populate($id); // Récupérer la critique à modifier
        $review->setContent($content); // Mettre à jour le contenu
        $review->setUpdated(date("Y-m-d H:i:s")); // Mettre à jour la date de modification
        
        $review->save();
        
        redirect('/review');
    }


    public function deleteReview($id): void
    {
        Review::deleteReview($id);
        redirect('/review');
    }

    public function showApprovedReview(): void
    {
        $review = new Review();
        $review = $review->getAllBy(['approved' => 1]);
        $view = new View("Main/review", "front");
        $view->assign("review", $review);
    }

    public function showUnapprovedReviews(): void
    {
        $review = new Review();
        $review = $review->getAllBy(['approved' => 0]);
        $view = new View("Main/unapproved_reviews", "back");
        $view->assign("unapprovedReviews", $unapprovedReviews);
    }

    // Dans votre contrôleur ReviewController.php
    public function showAddReviewForm(): void
    {
        $view = new View("Main/addreview", "front");
    }


    // Autres actions pour répondre à un avis, etc.
}

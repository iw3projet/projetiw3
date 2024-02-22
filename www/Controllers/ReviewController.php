<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Verificator;
use App\Models\Review;
use App\Models\User;
use App\Forms\AddReview;
use App\Forms\UpdateReview;
use App\Forms\ManageReview;

class ReviewController
{
    public function showAllReviews(): void
    {
        $reviews = Review::getAllReviews();
        $view = new View("Main/reviews", "front");
        $view->assign("reviews", $reviews);
    }

    public function createReview(): void
    {
        $form = new AddReview();
        $configForm = $form->getConfig();
        $errors = [];
        
        
       
        if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
            $user = new User();
            $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);

            if ($_SESSION["auth_user"]["email"]) {

                if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
                    $verificator = new Verificator();
                    if($verificator->checkForm($configForm, $_REQUEST, $errors))
                    {
                        
                        $review = new Review();
                        $review->setUserId($user_data["id"]);

                        $review->setContent($_REQUEST["content"]);

                        $review->setApproved(0);
                        $review->save();

                        header('Location:/review');
                    }
                }
                
            } else {
                $error = "Vous devez être connecté pour poster une critique.";

            
            }
        } else {
            header('Location:/login');
        }
        $view = new View("Review/addreview", "front");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }


    public function updateReview(): void
    {
        $form = new UpdateReview();
        $configForm = $form->getConfig();
        
        $all_review = new Review();
        
    
        if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
            $user = new User();
            $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);
            $all_review = $all_review->getAllBy(['id' => $user_data["id"]]);
            if ($user_data) {
                $verificator = new Verificator();
                $reviewData = null; 
                
                if ($verificator->checkForm($configForm, $_REQUEST, $errors, 1)) { 
                    $review = new Review();
    
                    $review->setId($_REQUEST["id"]);

                    $review->setContent($_REQUEST["content"]);

                    $review->setApproved(0);
    
                    $review->save();
    
                    header('Location: /myreview');
                    exit; 
                    
                }
    
            } else {
                header('Location: /404');
            }
        } else { 
            header('Location: /login');
            exit;
        }
    
    
        $view = new View("Review/myreview", "front");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
        $view->assign("review", $all_review);
    }

    public function showApprovedReview(): void
    {
        $review = new Review();
        $review = $review->getAllBy(['approved' => 1]);
        $view = new View("Review/approve", "front");
        $view->assign("review", $review);
    }


    public function manageReview(): void
{
    $Allreview = new Review();
    $Allreview = $Allreview->getAllBy(['approved' => 0]);

    if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
        $user = new User();
        $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);

        if ($user_data) {
                    $review = new Review();
                    
                    if(isset($_REQUEST['action'])) {
                        if($_REQUEST['action'] == 'approve') {
                            $review->setId($_REQUEST['id']);
                            $review->setApproved(1);
                            $review->save();
                            header('Location: /unreview');

                        } elseif($_REQUEST['action'] == 'delete') {
                            $review->deleteById($_REQUEST['id']);
                            header('Location: /unreview');
                        } else {
                            $errors[] = "Action non valide.";
                            header('Location: /review');
                            exit;
                        }
                    }
                //}
            
        } else {
            header('Location: /404');
            exit;
        }
    } else {
        header('Location: /login');
        exit;
    }

    $view = new View("Review/manage", "back");
    $view->assign("review", $Allreview);
}

    // Autres actions pour répondre à un avis, etc.
}

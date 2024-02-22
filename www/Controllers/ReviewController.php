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
        
        
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
            // Récupérer l'utilisateur par son email depuis la session
            $user = new User();
            $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);

            // Vérifier si l'utilisateur existe
            if ($_SESSION["auth_user"]["email"]) {

                if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
                    $verificator = new Verificator();
                    //Est-ce que les données sont OK
                    if($verificator->checkForm($configForm, $_REQUEST, $errors))
                    {
                        
                        // Créer une nouvelle instance de Review
                        $review = new Review();
                        //var_dump($user_data);
                        // Définir l'ID de l'utilisateur pour la review
                        $review->setUserId($user_data["id"]);

                        // Définir le contenu de la review
                        $review->setContent($_REQUEST["content"]);

                        $review->setApproved(0);

                        // Enregistrer la review en base de données
                        $review->save();

                        // Rediriger vers la page des reviews
                        header('Location:/review');
                    }
                }
                
            } else {
                // Définir un message d'erreur
                $error = "Vous devez être connecté pour poster une critique.";

                // Afficher la vue avec le message d'erreur
                $this->showAddReviewForm($error);
            }
        } else {
            // Rediriger vers la page de connexion
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
        $errors = []; // Initialisation de la variable $errors
        var_dump($_SESSION);
        
        $all_review = new Review();
        
    
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
            // Récupérer l'utilisateur par son email depuis la session
            $user = new User();
            $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);
            $all_review = $all_review->getAllBy(['id' => $user_data["id"]]);
            // Vérifier si l'utilisateur existe
            if ($user_data) {
                // Vérifier si les données du formulaire sont valides
                $verificator = new Verificator();
                $reviewData = null; 
                
                if ($verificator->checkForm($configForm, $_REQUEST, $errors, 1)) { 
                    // Récupérer la critique à mettre à jour
                    var_dump($_REQUEST);
                    $review = new Review();
    
                    $review->setId($_REQUEST["id"]);

                    // Mettre à jour le contenu de la critique
                    $review->setContent($_REQUEST["content"]);

                    $review->setApproved(0);
    
                    // Enregistrer la critique mise à jour en base de données
                    $review->save();
    
                    // Rediriger vers la page des critiques approuvées ou une autre page appropriée
                    header('Location: /myreview');
                    exit; // Assurez-vous de terminer le script après la redirection
                    
                }
    
            } else {
                // L'utilisateur n'est pas trouvé dans la base de données
                // Vous pouvez rediriger vers une page d'erreur ou afficher un message d'erreur approprié
                // header('Location: /error-page');
                // exit;
            }
        } else {
            // L'utilisateur n'est pas connecté
            // Vous pouvez rediriger vers la page de connexion ou afficher un message d'erreur approprié
            header('Location: /login');
            // exit;
        }
    
    
        // Afficher la vue avec le formulaire de modification et les éventuelles erreurs
        $view = new View("Review/myreview", "front");
        //$view->assign("review", $reviewData);
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
    $form = new ManageReview();
    $configForm = $form->getConfig();
    $errors = []; // Initialisation de la variable $errors
    $Allreview = new Review();
    $Allreview = $Allreview->getAllBy(['approved' => 0]);
    //var_dump($Allreview);

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
        // Récupérer l'utilisateur par son email depuis la session
        $user = new User();
        $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);

        // Vérifier si l'utilisateur existe
        if ($user_data) {
            // Vérifier si la requête est de type POST
            
                // Vérifier si les données du formulaire sont valides
                $verificator = new Verificator();
                //if ($verificator->checkForm($configForm, $_REQUEST, $errors, 1)) {
                    // Récupérer l'action sélectionnée
 

                    // Récupérer l'ID de la critique à gérer
        

                    // Créer une instance de la critique
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
                            // Rediriger vers la page appropriée après avoir effectué l'action
                            header('Location: /review');
                            exit;
                        }
                    }
                //}
            
        } else {
            // L'utilisateur n'est pas trouvé dans la base de données
            // Vous pouvez rediriger vers une page d'erreur ou afficher un message d'erreur approprié
            // header('Location: /error-page');
            // exit;
        }
    } else {
        // L'utilisateur n'est pas connecté
        // Vous pouvez rediriger vers la page de connexion ou afficher un message d'erreur approprié
        header('Location: /login');
        // exit;
    }

    // Afficher la vue avec le formulaire de gestion et les éventuelles erreurs
    $view = new View("Review/manage", "back");
    $view->assign("review", $Allreview);
    $view->assign("form", $configForm);
    $view->assign("formErrors", $errors);
}

    // Autres actions pour répondre à un avis, etc.
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/profile', name: 'app_admin_profile')]
    public function profile(): Response
    {
        // Example: get the current user and pass to template
        $admin = $this->getUser();

        return $this->render('admin/profile.html.twig', [
            'admin' => $admin,
        ]);
    }

    #[Route('/logout-others', name: 'app_admin_logout_others')]
    public function logoutOthers(): Response
    {
        // Here you would implement logic to invalidate other sessions for the current user.
        // For now, just show a flash message and redirect back to the profile.

        $this->addFlash('success', 'You have been logged out from other devices.');
        return $this->redirectToRoute('app_admin_profile');
    }

    #[Route('/preferences', name: 'app_admin_preferences', methods: ['POST'])]
    public function preferences(Request $request): Response
    {
        // Here you would handle saving preferences from the form.
        // For now, just show a flash message and redirect back to the profile.

        $this->addFlash('success', 'Preferences saved successfully.');
        return $this->redirectToRoute('app_admin_profile');
    }

    #[Route('/deactivate', name: 'app_admin_deactivate')]
    public function deactivate(): Response
    {
        // Here you would implement logic to deactivate the admin account.
        // For now, just show a flash message and redirect back to the profile.

        $this->addFlash('success', 'Your account has been deactivated.');
        return $this->redirectToRoute('app_admin_profile');
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        // Render a basic dashboard view. You can customize this later.
        return $this->render('admin/dashboard.html.twig');
    }
}

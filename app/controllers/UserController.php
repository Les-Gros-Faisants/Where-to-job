<?php
class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showProfile($id = NULL)
    {
        $user = User::find($id);
          if ($id)
            return View::make('user.profile')->withUser($user);
          else
            return View::make('home');
    }
}
?>

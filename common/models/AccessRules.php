<?php 
namespace common\models;


class AccessRules extends \yii\filters\AccessRule
{

    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $ROLE) {
            if ($ROLE === '?') {

                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($ROLE === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            } elseif (!$user->getIsGuest() && (int)$ROLE === $user->identity->ROLE) {
               return true;
            }
        }

        return false;
    }
}
?>
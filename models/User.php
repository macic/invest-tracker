<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\web\IdentityInterface;

/**
    * @property int $id
    * @property string $username
    * @property string $email
    * @property string $password
    * @property string $auth_key
    * @property string $access_token
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    /**
     * {@inheritdoc}
     */
    public static function findEmail($email)
    {
        return self::findOne($email);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token'=>$token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|ActiveRecord|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username'=>$username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getDisplayName()
    {
        if (Yii::$app->user->isGuest) {
            return null;
        }
        return $this->username;

    }
}

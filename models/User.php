<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\helpers\Html;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $nickname
 * @property string $passwordHash
 * @property string $authKey
 * @property int $roleId
 * @property string $fullName
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'nickname', 'password', 'fullName'], 'required'],
            [['roleId'], 'integer'],
            [['login', 'nickname', 'password', 'authKey', 'fullName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'nickname' => 'Псевдоним',
            'password' => 'Пароль',
            'authKey' => 'Auth Key',
            'roleId' => 'Role ID',
            'fullName' => 'ФИО',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByLogin($login)
    {
        return static::findOne(['login' => $login]);
       
    }

   
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwordHash);
    }

    public function beforeSave($insert)
{
    if (!parent::beforeSave($insert)) {
        return false;
    }

    if ($insert) {
        $this->roleId = 0;
        $this->authKey = Yii::$app->security->generateRandomString();
        $this->passwordHash = Yii::$app->security->generatePasswordHash($this->password);
    }
    return true;

}

public static function getNicknameById($id)
    {
        return Html::encode(self::findOne(['id' => $id])->nickname);
    }
    public static function getRoleById($id)
    {
        return Html::encode(self::findOne(['id' => $id])->roleId);
    }

    public static function getInfoById($id)
    {
          
        $user = User::find()
        ->where(['id' => $id])
        ->one();
        return $user;
    }
}
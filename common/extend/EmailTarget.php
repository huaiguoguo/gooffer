<?php
/**
 * Created by PhpStorm.
 * Author: 火柴<290559038@qq.com>
 * Date: 2017/10/18
 * Time: 16:22
 */

namespace common\extend;

use yii;
use yii\web\Request;
use \yii\log\EmailTarget as EEmailTarget;

class EmailTarget extends EEmailTarget {
    public function getMessagePrefix($message)
    {
        if ($this->prefix !== null) {
            return call_user_func($this->prefix, $message);
        }

        if (Yii::$app === null) {
            return '';
        }

        $request = Yii::$app->getRequest();
        $ip = $request instanceof Request ? $request->getUserIP() : '-';

        /* @var $user \yii\web\User */
        $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
        if ($user && ($identity = $user->getIdentity(false))) {
            $userID = $identity->getId();
        } else {
            $userID = '未登录';
        }

        /* @var $session \yii\web\Session */
        $session = Yii::$app->has('session', true) ? Yii::$app->get('session') : null;
        $sessionID = $session && $session->getIsActive() ? $session->getId() : '-';

        $controller = Yii::$app->controller->id;
        $action     = Yii::$app->controller->action->id;

        return "[$ip][user:$userID][session:$sessionID][$controller/$action]";
//        return "[$ip][$userID][$sessionID]";
    }
}
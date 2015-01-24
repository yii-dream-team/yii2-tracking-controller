<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace yiidreamteam\behaviors;

/**
 * Class TrackingController
 *
 * @property string $queryParam
 * @property string $sessionParam
 * @property string $trackingParam
 */
class TrackingController extends \yii\base\Behavior
{

    public $queryParam;
    public $sessionParam;

    public function events()
    {
        return [
            \yii\web\Controller::EVENT_BEFORE_ACTION => 'updateTrackingParam',
        ];
    }

    /**
     * @return string|null
     */
    public function getTrackingParam($defaultValue = null)
    {
        return \Yii::$app->session->get($this->sessionVar, $defaultValue);
    }

    /**
     * @return string|null
     */
    public function updateTrackingParam()
    {
        if ($value = \Yii::$app->request->get($this->queryVar))
            \Yii::$app->session->set($this->sessionVar, $value);
    }
}

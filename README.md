# Yii2 tracking controller behavior #

Yii2 controller behavior that captures tracking params from the query.
Captured parameters are stored in session and you can access them any time.
 
## Installation ##

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

    php composer.phar require --prefer-dist yii-dream-team/yii2-tracking-controller "*"

or add

    "yii-dream-team/yii2-tracking-controller": "*"

to the `require` section of your composer.json. 
 
### Usage as controller behavior ###
Attach the behavior to your controller class:

    public function behaviors()
    {
        return [
            'utm_campaign' => [
                'class' => '\yiidreamteam\behaviors\TrackingController',
                'queryParam' => 'utm_campaign',
                'sessionParam' => 'utm_campaign',
            ],
			'utm_source' => [
                'class' => '\yiidreamteam\behaviors\TrackingController',
                'queryParam' => 'utm_source',
                'sessionParam' => 'utm_source',
            ],
        ];
    }

Single param tracking:

    $utmCampaign = $this->trackingParam;

Or

    $utmCampaign = $this->getTrackingParam('unknown_campaign');

Tracking multiple parameters:

    $utmSource = $this->behaviors['utm_source']->trackingParam;
    $utmCampaign = $this->behaviors['utm_campaign']->trackingParam;

Or:

    $utmSource = $this->behaviors['utm_source']->getTrackingParam('unknown_source');
    $utmCampaign = $this->behaviors['utm_campaign']->getTrackingParam('unknown_campaign');
    
## Licence ##

MIT
    
## Links ##

* http://yiidreamteam.com/yii2/tracking-controller

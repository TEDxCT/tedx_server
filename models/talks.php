<?php
/**
 * Created by PhpStorm.
 * User: andrewpettey
 * Date: 2014/04/30
 * Time: 20:23
 */

namespace models;


class talks {
    public $id;
    public $dateCreated;
    public $dateModified;
    public $isActive;
    public $name;
    public $descriptionHTML;
    public $imageURL;
    public $videoURL;
    public $orderInSession;
    public $sessionId;
    public $speakerId;
    public $speaker;
} 
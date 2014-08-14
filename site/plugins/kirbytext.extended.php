<?php 
class kirbytextExtended extends kirbytext {

    function __construct($text, $markdown=true) {

        parent::__construct($text, $markdown);

        // define custom tags
        $this->addTags('soundcloud'); 
    }


    function soundcloud($params) {

            $soundcloud_url = $params['soundcloud'];

                $s =    '<div class="soundcloud">' .
                    '<iframe width="100%" height="450" scrolling="no" frameborder="no" ' . 
                        'src="' . $soundcloud_url . '"></iframe>' .
                    '</div>'; 

               return $s;
    }
}
?>
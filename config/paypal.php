<?php

return [
/*C,AR*/
    /*Sadnbox*/
    //'client_id' => 'ATB5Hr_0FDzssMisoM6_J5nwlGT9FryUeTT0oREro8dk-PLRDDma4HxyngLMWMpwtdhG7NqisxJ9rG7U',
    //'secret' => 'EIA8ZainQECicDxnw4vGDrGJZqDrynYcXJvGAYBzDieXvBsZIvth9rwtI0YT_-_wAnORmyAmDlELBAUC',
    /*Live*/
    //'client_id' => 'AYzoe89xn9H3f9lJwWg3DcNPTBCOfMKAzy-HePE6MQPqRzWtSNJ9UDPd8FSaE7jw28gjQK_f6n9WxwTA',
    //'secret' => 'ELVfSnhzfR_0OlX1fL_NIERrhXuL-CGUXe1HKwwdDHys4Y6J7URZ1XEBPIFc_8sizhdxWaqjVMB8Nttl',


    //Sandbox Adri
        /*
    'client_id' => 'ASgcrx1d8L-bbm8b6BGfvJxsWbCQDJR-GywrLjERcUKtgXR_oDQfyaY3SdiEp_0nNQIXnf9LY1WP1bX7',
    'secret' => 'EGndTzI0W8xElP7gEVvS4B-5YUSL8KRerBl_0C8TJEDcaYhq2Lx92qxAWsSrSrbMYpAmg3nEJ9y2o4Lf',
    */

//Live Adri
    'client_id' => 'AYhHR03osc1HfFURhrsOvzBxlOBdA1XDZTDnDyScOf3_TkUMaoNqea4_G6FsiXe70IP-iaDjEgGt2AZP',
    'secret' => 'EERwicE5QazltxGRo_xguQmNCzV2sne0j1UA5a0uU5AP874MgekcB1-hl_WwEN-lbeZMeFsY0IiqGaFX',


    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */

        //'mode' => 'sandbox',
        'mode' => 'live',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'DEBUG',
        //'log.LogLevel' => 'FINE',
    ),

];
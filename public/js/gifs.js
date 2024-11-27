    const key = 'AIzaSyBITAMk_0Yrvc2HBorP93v-qmQPao83RT4';


    // url Async requesting function
    function httpGetAsync(theUrl, callback)
    {
        // create the request object
        var xmlHttp = new XMLHttpRequest();

        // set the state change callback to capture when the response comes in
        xmlHttp.onreadystatechange = function()
        {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {
                callback(xmlHttp.responseText);
            }
        }

        // open as a GET call, pass in the url and set async = True
        xmlHttp.open("GET", theUrl, true);

        // call send with no params as they were passed in on the url string
        xmlHttp.send(null);

        return;
    }

    // callback for share event
    function tenorCallback_share(responsetext)
    {
        // no action is needed in the share callback
    }


    // function to call the register share endpoint
    function send_share(search_term,shared_gifs_id)
    {
        // set the apikey and limit
        var apikey = key;
        var clientkey = "my_test_app";

        var share_url = "https://tenor.googleapis.com/v2/registershare?id=" + shared_gifs_id + "&key=" + apikey + "&client_key=" + clientkey + "&q=" + search_term;

        httpGetAsync(share_url,tenorCallback_share);
    }

    // // SUPPORT FUNCTIONS ABOVE
    // // MAIN BELOW

    // // grab search term from cookies or some other storage
    // search_term = "excited";

    // // GIF id from the shared gif
    // // shared_gifs_id = gif_json_response_object_from_search["results"][0]["id"]
    // shared_gifs_id = "16989471141791455574"; // example

    // // send the share notifcation back to Tenor
    // send_share(search_term,shared_gifs_id);

    // alert("share sent!");

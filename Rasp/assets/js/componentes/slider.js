const slider =  {

   

    url: 'http://localhost:8080/api/screen',

    init: function() {
        console.log('slider charged');

        slider.slider();
        setInterval(slider.slider, 86400000);
    },

    slider: function() {
        console.log('slider start');
        const conf = {
            method: "GET",
            mode: 'cors',
            cache: 'no-cache',
            header: {'Access-Control-Allow-Origin': '*'},
            crossDomain: true
        }
        fetch(slider.url, conf)
        .then(function(response){
            console.log(response.json)
            return response.json();
        }).then(function(reception){
            if(reception.status == 204) {
                console.log(reception.screens);
            } else {
                for( const screen of reception ) {
                    console.log(reception);
                }
            }

         
        })
    }

}
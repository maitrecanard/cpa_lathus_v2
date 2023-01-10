const slider =  {

    init: function() {
        console.log('slider charged');
        slider.slider();
        setInterval(slider.slider, 86400000);
    },

    slider: function() {
        console.log('slider start')
    }

}
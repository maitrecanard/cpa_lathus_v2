const app = {

    httpHeaders: new Headers(),

    init: function() {

        loader.init();
        slider.init();
        app.httpHeaders.append("Content-Type", "application/json");
    }
}

app.init();